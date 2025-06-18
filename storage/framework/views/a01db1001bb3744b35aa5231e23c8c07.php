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
            <?php echo e(__('Beranda')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <!-- Menampilkan Data Kost -->
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <?php $__empty_1 = true; $__currentLoopData = $kosKami; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="">
                            <div class="h-full p-2 transition-all duration-300 border border-orange-200 rounded-lg hover:bg-orange-200">
                                <img src="<?php echo e(asset('storage/' . $kost->image)); ?>" alt="<?php echo e($kost->nama); ?>"
                                    class="object-cover w-full h-32 rounded-lg">
                                <div class="py-2">
                                    <h1 class="text-sm font-semibold text-gray-800"><?php echo e($kost->nama); ?></h1>
                                    <p class="text-sm text-gray-600"><?php echo e($kost->address->formatted_address); ?></p>
                                    <span class="text-sm text-orange-600">Rp.
                                        <?php echo e(number_format($kost->harga, 0, ',', '.')); ?> /bulan</span>
                                    <span class="block text-sm text-gray-600">Kamar Tersedia:
                                        <?php echo e($kost->kamar_tersedia); ?></span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="py-8 text-center col-span-full">
                            <div class="text-gray-500">
                                <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada kos tersedia</h3>
                                <p class="mt-1 text-sm text-gray-500">Kos akan tampil di sini ketika sudah tersedia.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
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
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/dashboard.blade.php ENDPATH**/ ?>