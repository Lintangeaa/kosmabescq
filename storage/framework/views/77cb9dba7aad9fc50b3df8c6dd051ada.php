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
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <?php echo e(__('Daftar Reservasi')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="p-12">
        <?php if($reservations->isEmpty()): ?>
            <div class="text-center">
                <p class="mb-6 text-gray-600">Tidak ada reservasi yang ditemukan.</p>
                <a href="<?php echo e(route('customer.kost.index')); ?>"
                    class="px-4 py-2 mt-4 text-white bg-orange-500 rounded hover:bg-orange-600">Cari Kos</a>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto gap-6 sm:grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $statusColor = match($reservation->status) {
                            'Dibatalkan' => 'red',
                            'Selesai' => 'green',
                            'Dibayar' => 'blue',
                            'Menunggu Pembayaran' => 'yellow',
                            default => 'gray'
                        };
                    ?>
                    <div class="p-6 rounded-lg shadow-sm mb-6 border hover:shadow-lg transition-shadow duration-300
                        bg-<?php echo e($statusColor); ?>-100 border-<?php echo e($statusColor); ?>-300">
                        <h3 class="text-xl font-semibold text-gray-800"><?php echo e($reservation->kost->nama); ?></h3>
                        <p class="mt-2 text-gray-600">ID Reservasi: <span
                                class="font-medium text-gray-800"><?php echo e($reservation->reservation_id); ?></span></p>
                        <p class="mt-1 text-gray-600">Tanggal Mulai: <span
                                class="font-medium text-gray-800"><?php echo e($reservation->tanggal_reservasi); ?></span></p>
                        <p class="mt-1 text-gray-600">Total Bulan: <span
                                class="font-medium text-gray-800"><?php echo e(floor($reservation->total)); ?> Bulan</span></p>

                        <!-- Status Section -->
                        <p class="mt-1 text-gray-600">
                            Status:
                            <span class="font-medium text-<?php echo e($statusColor); ?>-600">
                                <?php echo e($reservation->status); ?>

                            </span>
                        </p>

                        <div class="mt-4 text-center">
                            <?php switch($reservation->status):
                                case ('Menunggu Pembayaran'): ?>
                                    <a href="<?php echo e(route('customer.reservations.payment', $reservation->reservation_id)); ?>"
                                        class="inline-block px-5 py-2 text-white bg-<?php echo e($statusColor); ?>-600 rounded-lg hover:bg-<?php echo e($statusColor); ?>-700 focus:outline-none focus:ring-2 focus:ring-<?php echo e($statusColor); ?>-500">
                                        Bayar Sekarang
                                    </a>
                                    <?php break; ?>
                                <?php case ('Dibayar'): ?>
                                <?php case ('Selesai'): ?>
                                    <a href="<?php echo e(route('customer.reservations.invoice', $reservation->reservation_id)); ?>"
                                        class="inline-block px-5 py-2 text-white bg-<?php echo e($statusColor); ?>-600 rounded-lg hover:bg-<?php echo e($statusColor); ?>-700 focus:outline-none focus:ring-2 focus:ring-<?php echo e($statusColor); ?>-500">
                                        Lihat Invoice
                                    </a>
                                    <?php break; ?>
                                <?php case ('Dibatalkan'): ?>
                                    <span class="font-semibold text-<?php echo e($statusColor); ?>-600">Reservasi Dibatalkan</span>
                                    <?php break; ?>
                            <?php endswitch; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/customer/reservations/index.blade.php ENDPATH**/ ?>