<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Daftar Reservasi Kos')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="p-6">
        <?php if($reservations->isEmpty()): ?>
            <div class="text-center">
                <p class="text-gray-600">Tidak ada reservasi untuk kos Anda.</p>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto bg-white shadow rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b text-left">ID Reservasi</th>
                            <th class="px-4 py-2 border-b text-left">Nama Kost</th>
                            <th class="px-4 py-2 border-b text-left">Nama Pembooking</th> <!-- Kolom nama pembooking -->
                            <th class="px-4 py-2 border-b text-left">Tanggal Mulai</th>
                            <th class="px-4 py-2 border-b text-left">Total Bulan</th>
                            <th class="px-4 py-2 border-b text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-4 py-2 border-b"><?php echo e($reservation->reservation_id); ?></td>
                                <td class="px-4 py-2 border-b"><?php echo e($reservation->kost->nama); ?></td>
                                <td class="px-4 py-2 border-b"><?php echo e($reservation->user->name); ?></td> <!-- Menampilkan nama pembooking -->
                                <td class="px-4 py-2 border-b"><?php echo e($reservation->tanggal_reservasi); ?></td>
                                <td class="px-4 py-2 border-b"><?php echo e(floor($reservation->total)); ?> Bulan</td>
                                <td class="px-4 py-2 border-b"><?php echo e($reservation->status); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/owner/reservations/index.blade.php ENDPATH**/ ?>