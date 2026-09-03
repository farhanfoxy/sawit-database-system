<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public $timestamps = false;

    protected $fillable = ['trip_id', 'type', 'file_path', 'original_name', 'mime_type', 'file_size', 'uploaded_by', 'created_at'];
    protected $casts = ['created_at' => 'datetime'];

    public function trip() { return $this->belongsTo(Trip::class); }
    public function uploader() { return $this->belongsTo(User::class, 'uploaded_by'); }
}
