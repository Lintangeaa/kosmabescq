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

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Statistik -->
            <div class="grid grid-cols-1 gap-4 mb-8 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Total Kos -->
                <div class="p-6 bg-white rounded-lg border border-orange-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="p-3 bg-orange-100 rounded-full">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Total Kos</h3>
                            <p class="text-2xl font-bold text-orange-600"><?php echo e($totalKos); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Kamar Tersedia -->
                <div class="p-6 bg-white rounded-lg border border-green-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Kamar Tersedia</h3>
                            <p class="text-2xl font-bold text-green-600"><?php echo e($totalKamarTersedia); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Total Reservasi -->
                <div class="p-6 bg-white rounded-lg border border-blue-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Total Reservasi</h3>
                            <p class="text-2xl font-bold text-blue-600"><?php echo e($totalReservasi); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Pendapatan -->
                <div class="p-6 bg-white rounded-lg border border-purple-100 shadow-sm">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-full">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Pendapatan</h3>
                            <p class="text-2xl font-bold text-purple-600">Rp <?php echo e(number_format($totalPendapatan, 0, ',', '.')); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Daftar Kos -->
            <div class="mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Daftar Kos</h2>
                    <a href="<?php echo e(route('admin.kost.create')); ?>" class="px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                        Tambah Kos
                    </a>
                </div>

                <div class="overflow-hidden bg-white rounded-lg shadow-sm">
                    <div class="grid grid-cols-1 gap-6 p-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <?php $__empty_1 = true; $__currentLoopData = $kosKami; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="relative bg-white rounded-lg border border-gray-200 shadow-sm transition-all duration-300 group hover:shadow-lg hover:border-orange-300">
                                <div class="relative overflow-hidden rounded-t-lg pb-[60%]">
                                    <img src="<?php echo e(asset('storage/' . $kost->image)); ?>" alt="<?php echo e($kost->nama); ?>"
                                        class="object-cover absolute inset-0 w-full h-full transition-transform duration-300 group-hover:scale-105">
                                </div>
                                <div class="p-4">
                                    <h3 class="mb-2 text-lg font-semibold text-gray-800 line-clamp-1"><?php echo e($kost->nama); ?></h3>
                                    <p class="mb-2 text-sm text-gray-600 line-clamp-2"><?php echo e($kost->address->formatted_address); ?></p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-orange-600">
                                            Rp <?php echo e(number_format($kost->harga, 0, ',', '.')); ?>

                                        </span>
                                        <span class="px-3 py-1 text-sm <?php echo e($kost->kamar_tersedia > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?> rounded-full">
                                            <?php echo e($kost->kamar_tersedia); ?> Kamar
                                        </span>
                                    </div>
                                    <div class="flex mt-4 space-x-2">
                                        <a href="<?php echo e(route('admin.kost.edit', $kost->id)); ?>"
                                           class="flex-1 px-4 py-2 text-sm text-center text-orange-600 bg-orange-100 rounded-md transition-colors hover:bg-orange-200">
                                            Edit
                                        </a>
                                        <a href="<?php echo e(route('admin.kost.show', $kost->id)); ?>"
                                           class="flex-1 px-4 py-2 text-sm text-center text-white bg-orange-500 rounded-md transition-colors hover:bg-orange-600">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-span-full py-12 text-center">
                                <div class="inline-flex justify-center items-center mb-4 w-16 h-16 bg-orange-100 rounded-full">
                                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <h3 class="mb-2 text-lg font-medium text-gray-900">Belum ada kos tersedia</h3>
                                <p class="mb-6 text-gray-500">Mulai tambahkan kos pertama Anda untuk ditampilkan di sini.</p>
                                <a href="<?php echo e(route('admin.kost.create')); ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                                    <svg class="mr-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Tambah Kos Baru
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
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