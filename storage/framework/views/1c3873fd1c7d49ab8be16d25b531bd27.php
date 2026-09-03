<?php
    $trip = $trip ?? null;
    $editing = $trip !== null;
?>
<?php $__env->startSection('title', $editing ? 'Edit Trip' : 'Trip Baru'); ?>
<?php $__env->startSection('page-title', $editing ? 'Koreksi Trip' : 'Input Trip Baru'); ?>
<?php $__env->startSection('content'); ?>
    <form method="POST" enctype="multipart/form-data"
        action="<?php echo e($editing ? route('trips.update', $trip) : route('trips.store')); ?>" x-data="tripForm({
            weight: '<?php echo e(old('factory_weight_ton', $trip->factory_weight_ton ?? '')); ?>',
            normalPrice: '<?php echo e(old('normal_price_per_ton', $trip->normal_price_per_ton ?? '')); ?>',
            transport: '<?php echo e(old('transport_cost', $trip->transport_cost ?? '')); ?>',
            hasBad: <?php echo e(old('has_bad_fruit', isset($trip) && $trip->bad_fruit_ton !== null) ? 'true' : 'false'); ?>,
            badTon: '<?php echo e(old('bad_fruit_ton', $trip->bad_fruit_ton ?? '')); ?>',
            badPrice: '<?php echo e(old('bad_fruit_price_per_ton', $trip->bad_fruit_price_per_ton ?? '')); ?>'
        })">
        <?php echo csrf_field(); ?> <?php if($editing): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <div class="row g-3">
            <div class="col-xl-8">
                <div class="panel">
                    <div class="panel-head">
                        <div>
                            <p class="eyebrow">TRIP DATA</p>
                            <h3><?php echo e($editing ? $trip->trip_number : 'Detail Pengiriman'); ?></h3>
                        </div>
                    </div>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger"><strong>Periksa input berikut:</strong>
                            <ul class="mb-0 mt-2">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="form-grid">
                        <div><label class="form-label">Tanggal</label><input type="date" name="transaction_date"
                                value="<?php echo e(old('transaction_date', $trip?->transaction_date?->format('Y-m-d') ?? now()->toDateString())); ?>"
                                class="form-control form-control-lg" required></div>
                        <div><label class="form-label">Tonase Pabrik</label>
                            <div class="input-group input-group-lg"><input x-model.number="weight" step="0.001"
                                    type="number" name="factory_weight_ton" class="form-control" placeholder="0.000"
                                    required><span class="input-group-text">ton</span></div>
                        </div>
                        <div><label class="form-label">Harga Normal / Ton</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text">Rp</span>
                                <input type="text" inputmode="numeric" class="form-control" placeholder="0"
                                    :value="formatMoneyInput(normalPrice)"
                                    @input="
                normalPrice = parseMoney($event.target.value);
                $event.target.value = formatMoneyInput(normalPrice);
            "
                                    autocomplete="off" required><input type="hidden" name="normal_price_per_ton"
                                    :value="normalPrice">
                            </div>
                        </div>
                        <div><label class="form-label">Biaya Transport / Trip</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text">Rp</span>
                                <input type="text" inputmode="numeric" class="form-control" placeholder="0"
                                    :value="formatMoneyInput(transport)"
                                    @input="
                transport = parseMoney($event.target.value);
                $event.target.value = formatMoneyInput(transport);
            "
                                    autocomplete="off" required><input type="hidden" name="transport_cost"
                                    :value="transport">
                            </div>
                        </div>
                        <div><label class="form-label">Nomor Tiket Timbang <span
                                    class="optional">opsional</span></label><input type="text" name="weigh_ticket_number"
                                value="<?php echo e(old('weigh_ticket_number', $trip->weigh_ticket_number ?? '')); ?>"
                                class="form-control" placeholder="Contoh: WB-29083"></div>
                        <div><label class="form-label">Status</label><select name="payment_status" class="form-select">
                                <option value="draft" <?php if(old('payment_status', $trip->payment_status ?? 'paid') === 'draft'): echo 'selected'; endif; ?>>Draft</option>
                                <option value="paid" <?php if(old('payment_status', $trip->payment_status ?? 'paid') === 'paid'): echo 'selected'; endif; ?>>Paid / Final</option>
                            </select></div>
                    </div>
                    <div class="quality-box mt-4"><label class="quality-toggle"><input
                                class="form-check-input"type="checkbox" name="has_bad_fruit" value="1"
                                x-model="hasBad"><span><strong>Ada sawit buruk / kualitas rendah?</strong><small>Aktifkan
                                    hanya jika pabrik memberi harga lebih rendah untuk sebagian
                                    tonase.</small></span></label>
                        <div x-show="hasBad" x-collapse class="quality-fields">
                            <div><label class="form-label">Tonase Sawit Buruk</label>
                                <div class="input-group"><input x-model.number="badTon" type="number" step="0.001"
                                        name="bad_fruit_ton" class="form-control"><span class="input-group-text">ton</span>
                                </div>
                            </div>
                            <div><label class="form-label">Harga Sawit Buruk / Ton</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" inputmode="numeric" class="form-control" placeholder="0"
                                        :value="formatMoneyInput(badPrice)"
                                        @input="
            badPrice = parseMoney($event.target.value);
            $event.target.value = formatMoneyInput(badPrice);
        "
                                        autocomplete="off">

                                    <input type="hidden" name="bad_fruit_price_per_ton" :value="hasBad ? badPrice : ''">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4"><label class="form-label">Catatan <span class="optional">opsional</span></label>
                        <textarea name="notes" rows="3" class="form-control" placeholder="Catatan dari mandor atau pabrik..."><?php echo e(old('notes', $trip->notes ?? '')); ?></textarea>
                    </div>
                    <?php if($editing): ?>
                        <div class="correction-box mt-4"><label class="form-label">Alasan perubahan <span
                                    class="text-danger">*</span></label>
                            <textarea name="change_reason" rows="2" class="form-control" required
                                placeholder="Contoh: salah input harga dari slip timbang."><?php echo e(old('change_reason')); ?></textarea><small>Perubahan akan disimpan di audit log.</small>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="panel mt-3">
                    <div class="panel-head">
                        <div>
                            <p class="eyebrow">DOCUMENTS</p>
                            <h3>Bukti Transaksi</h3>
                        </div>
                    </div>
                    <div class="upload-grid"><label class="upload-zone"><i class="bi bi-receipt-cutoff"></i><strong>Bukti
                                Timbang</strong><span>JPG, PNG, PDF · maks. 5 MB/file</span><input type="file"
                                name="weigh_ticket_files[]" multiple
                                accept="image/jpeg,image/png,application/pdf"></label><label class="upload-zone"><i
                                class="bi bi-credit-card-2-front"></i><strong>Bukti Pembayaran</strong><span>JPG, PNG, PDF
                                · maks. 5 MB/file</span><input type="file" name="payment_proof_files[]" multiple
                                accept="image/jpeg,image/png,application/pdf"></label></div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="panel sticky-summary">
                    <p class="eyebrow">LIVE CALCULATION</p>
                    <h3>Ringkasan Trip</h3>
                    <div class="calc-row"><span>Tonase Pabrik</span><strong x-text="fmtTon(weight)"></strong></div>
                    <div class="calc-row"><span>Tonase Normal</span><strong x-text="fmtTon(normalTon)"></strong></div>
                    <div class="calc-row" x-show="hasBad"><span>Sawit Buruk</span><strong
                            x-text="fmtTon(badTon)"></strong></div>
                    <hr>
                    <div class="calc-row"><span>Gross Revenue</span><strong x-text="rupiah(gross)"></strong></div>
                    <div class="calc-row"><span>Transport</span><strong x-text="'- '+rupiah(transport)"></strong></div>
                    <div class="calc-total"><span>Net After Transport</span><strong x-text="rupiah(net)"></strong></div>
                    <div class="quality-impact" x-show="hasBad"><i class="bi bi-exclamation-triangle"></i>
                        <div><small>Quality Loss</small><strong x-text="rupiah(qualityLoss)"></strong></div>
                    </div><button class="btn btn-brand btn-lg w-100 mt-4"><i class="bi bi-check2-circle"></i>
                        <?php echo e($editing ? 'Simpan Koreksi' : 'Simpan Trip'); ?></button><a
                        href="<?php echo e($editing ? route('trips.show', $trip) : route('trips.index')); ?>"
                        class="btn btn-light w-100 mt-2">Batal</a>
                </div>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sawit-database-system\resources\views/trips/create.blade.php ENDPATH**/ ?>