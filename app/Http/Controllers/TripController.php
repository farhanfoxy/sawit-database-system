<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Models\Attachment;
use App\Models\AuditLog;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    public function index(Request $request)
    {
        $trips = Trip::query()
            ->with('creator')
            ->when($request->filled('status'), fn ($q) => $q->where('payment_status', $request->status))
            ->when($request->filled('from'), fn ($q) => $q->whereDate('transaction_date', '>=', $request->from))
            ->when($request->filled('to'), fn ($q) => $q->whereDate('transaction_date', '<=', $request->to))
            ->latest('transaction_date')->latest()->paginate(20)->withQueryString();

        return view('trips.index', compact('trips'));
    }

    public function create()
    {
        abort_if(auth()->user()->isOwner(), 403);
        return view('trips.create');
    }

    public function store(StoreTripRequest $request)
    {
        $trip = DB::transaction(function () use ($request) {
            $data = $this->normalizedData($request);
            $data['trip_number'] = $this->nextTripNumber($data['transaction_date']);
            $data['created_by'] = auth()->id();
            $data['finalized_at'] = $data['payment_status'] === 'paid' ? now() : null;

            $trip = Trip::create($data);
            $this->storeAttachments($request, $trip);
            $this->audit('created', $trip, null, $trip->getAttributes(), 'Transaksi dibuat.');
            return $trip;
        });

        return redirect()->route('trips.show', $trip)->with('success', 'Trip berhasil disimpan.');
    }

    public function show(Trip $trip)
    {
        $trip->load(['creator', 'attachments.uploader']);
        return view('trips.show', compact('trip'));
    }

    public function edit(Trip $trip)
    {
        abort_if(auth()->user()->isOwner(), 403);
        return view('trips.create', compact('trip'));
    }

    public function update(UpdateTripRequest $request, Trip $trip)
    {
        DB::transaction(function () use ($request, $trip) {
            $old = $trip->getAttributes();
            $data = $this->normalizedData($request);
            $data['finalized_at'] = $data['payment_status'] === 'paid' ? ($trip->finalized_at ?? now()) : null;
            $trip->update($data);
            $this->storeAttachments($request, $trip);
            $this->audit('updated', $trip, $old, $trip->fresh()->getAttributes(), $request->change_reason);
        });

        return redirect()->route('trips.show', $trip)->with('success', 'Perubahan tersimpan dan dicatat di audit log.');
    }

    public function cancel(Request $request, Trip $trip)
    {
        abort_if(auth()->user()->isOwner(), 403);
        $request->validate(['reason' => ['required','string','min:5','max:500']]);
        $old = $trip->getAttributes();
        $trip->update(['payment_status' => 'cancelled']);
        $this->audit('cancelled', $trip, $old, $trip->fresh()->getAttributes(), $request->reason);
        return back()->with('success', 'Trip dibatalkan tanpa menghapus histori.');
    }

    public function downloadAttachment(Trip $trip, Attachment $attachment)
    {
        abort_unless($attachment->trip_id === $trip->id, 404);
        abort_unless(Storage::disk('local')->exists($attachment->file_path), 404);
        return Storage::disk('local')->download($attachment->file_path, $attachment->original_name);
    }

    private function normalizedData(StoreTripRequest $request): array
    {
        $data = $request->validated();
        unset($data['has_bad_fruit'], $data['weigh_ticket_files'], $data['payment_proof_files'], $data['change_reason']);
        if (! $request->boolean('has_bad_fruit')) {
            $data['bad_fruit_ton'] = null;
            $data['bad_fruit_price_per_ton'] = null;
        }
        return $data;
    }

    private function nextTripNumber(string $date): string
    {
        $prefix = 'TRP-'.date('Ymd', strtotime($date));
        $last = Trip::where('trip_number', 'like', $prefix.'-%')->lockForUpdate()->orderByDesc('trip_number')->value('trip_number');
        $sequence = $last ? ((int) substr($last, -3)) + 1 : 1;
        return $prefix.'-'.str_pad((string) $sequence, 3, '0', STR_PAD_LEFT);
    }

    private function storeAttachments(StoreTripRequest $request, Trip $trip): void
    {
        foreach (['weigh_ticket_files' => 'weigh_ticket', 'payment_proof_files' => 'payment_proof'] as $field => $type) {
            foreach ($request->file($field, []) as $file) {
                $path = $file->store("trips/{$trip->id}", 'local');
                Attachment::create([
                    'trip_id' => $trip->id,
                    'type' => $type,
                    'file_path' => $path,
                    'original_name' => $file->getClientOriginalName(),
                    'mime_type' => $file->getMimeType(),
                    'file_size' => $file->getSize(),
                    'uploaded_by' => auth()->id(),
                    'created_at' => now(),
                ]);
            }
        }
    }

    private function audit(string $action, Trip $trip, ?array $old, ?array $new, string $reason): void
    {
        AuditLog::create([
            'user_id' => auth()->id(), 'action' => $action, 'entity_type' => Trip::class,
            'entity_id' => $trip->id, 'old_values' => $old, 'new_values' => $new,
            'reason' => $reason, 'ip_address' => request()->ip(), 'created_at' => now(),
        ]);
    }
}
