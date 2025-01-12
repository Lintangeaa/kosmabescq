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
            <?php echo e(__('Daftar Reservasi')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
  
    <div class="p-12">
        <?php if($reservations->isEmpty()): ?>
            <div class="text-center">
                <p class="text-gray-600">Tidak ada reservasi yang ditemukan.</p>
                <a href="<?php echo e(route('customer.kost.index')); ?>" class="mt-4 bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Cari Kos</a>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto sm:grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $reservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white p-6 rounded-lg shadow-sm mb-6 border border-gray-200 hover:shadow-lg transition-shadow duration-300
                    <?php if($reservation->status == 'Dibatalkan'): ?> bg-red-100 border-red-300 <?php elseif($reservation->status == 'Selesai'): ?> bg-green-100 border-green-300 <?php endif; ?>
                ">
                    <h3 class="text-xl font-semibold text-gray-800"><?php echo e($reservation->kost->nama); ?></h3>
                    <p class="text-gray-600 mt-2">ID Reservasi: <span class="font-medium text-gray-800"><?php echo e($reservation->reservation_id); ?></span></p>
                    <p class="text-gray-600 mt-1">Tanggal Mulai: <span class="font-medium text-gray-800"><?php echo e($reservation->tanggal_reservasi); ?></span></p>
                    <p class="text-gray-600 mt-1">Total Bulan: <span class="font-medium text-gray-800"><?php echo e(floor($reservation->total)); ?> Bulan</span></p>
                    
                    <!-- Status Section -->
                    <p class="text-gray-600 mt-1">
                        Status: 
                        <span class="font-medium 
                            <?php if($reservation->status == 'Dibatalkan'): ?>
                                text-red-600
                            <?php elseif($reservation->status == 'Dibayar'): ?>
                                text-green-600
                            <?php elseif($reservation->status == 'Menunggu Pembayaran'): ?>
                                text-yellow-600
                            <?php elseif($reservation->status == 'Selesai'): ?>
                                text-blue-600
                            <?php endif; ?>
                        ">
                            <?php echo e($reservation->status); ?>

                        </span>
                    </p>

                    <?php if($reservation->status == 'Menunggu Pembayaran'): ?>
                        <div class="mt-4 text-center">
                            <a href="<?php echo e(route('customer.reservations.payment', $reservation->reservation_id)); ?>" class="bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                Bayar Sekarang
                            </a>
                        </div>
                    <?php elseif($reservation->status == 'Dibayar'): ?>
                        <div class="mt-4 text-center">
                            <a href="<?php echo e(route('customer.reservations.invoice', $reservation->reservation_id)); ?>" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Lihat Invoice
                            </a>
                        </div>
                    <?php elseif($reservation->status == 'Dibatalkan'): ?>
                        <!-- Jika status Dibatalkan, tampilkan label merah dan tidak ada tombol -->
                        <div class="mt-4 text-center">
                            <span class="text-red-600 font-semibold">Reservasi Dibatalkan</span>
                        </div>
                    <?php endif; ?>
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