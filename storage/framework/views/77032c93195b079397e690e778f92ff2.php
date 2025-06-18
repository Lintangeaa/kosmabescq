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

    <body class="font-sans antialiased bg-gray-50">
        <!-- Header -->
        <div class="sticky top-0 h-20 bg-orange-200 flex justify-between items-center px-6 sm:px-10 lg:px-28  z-20 shadow-md">
            <h1 class="text-xl uppercase font-extrabold text-ellipsis text-orange-700">Kosmabescq</h1>
        </div>

        <!-- Main Content -->
        <main class=" mx-auto mt-12 max-w-7xl px-6 sm:px-10 lg:px-[36px]  ">
            <!-- Hero Section -->
            <div class="flex justify-center items-center gap-6 flex-col lg:flex-row ">
                <img src="/assets/img/hero.jpg" alt="Kosmabescq" class="rounded-lg shadow-lg">
                <div class="h-auto flex justify-center items-center p-4 lg:p-8">
                    <h1 class="text-2xl lg:text-3xl font-bold text-gray-800 text-center lg:text-left ">Kosmabescq: Solusi
                        Mudah untuk Semua Kebutuhan Pemesanan Kos Anda!</h1>
                </div>
            </div>

            <section class="py-8" id="populer">
                <h1 class="text-2xl font-semibold text-gray-800 text-center sm:text-left">
                    Paling <span class="text-orange-500">Populer</span> dan Paling <span
                        class="text-orange-500">Dicari</span>
                </h1>
                <!-- Swiper Container -->
                <div class="swiper mySwiper mt-5">
                    <div class="swiper-wrapper">
                        <?php $__empty_1 = true; $__currentLoopData = $kosPopuler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="swiper-slide hover:-translate-y-2 transition-all duration-300 cursor-pointer">
                                <a href="<?php echo e(route('customer.kost.show', $kost->id)); ?>">
                                    <div class="w-48 bg-orange-100 h-56 rounded-xl p-2 hover:shadow-lg">
                                        <img src="<?php echo e(asset('storage/' . $kost->image)); ?>"
                                            class="h-32 w-full rounded-xl object-cover" alt="<?php echo e($kost->nama); ?>">
                                        <div class="py-2">
                                            <h1 class="text-md font-semibold"><?php echo e($kost->nama); ?></h1>
                                            <span class="text-xs text-orange-600">Rp.
                                                <?php echo e(number_format($kost->harga, 0, ',', '.')); ?> /bulan</span>
                                            <span class="block text-xs text-gray-600">Kamar Tersedia:
                                                <?php echo e($kost->kamar_tersedia); ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="swiper-slide">
                                <div class="w-48 bg-gray-100 h-56 rounded-xl p-2 flex items-center justify-center">
                                    <div class="text-center text-gray-500">
                                        <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <p class="text-xs">Belum ada kos populer</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>



            <!-- Kos Kami Section -->
            <section class="py-8" id="hotel">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Kos Kami</h2>
                <p class="mb-4 text-gray-600">
                    Temukan kenyamanan di berbagai pilihan kos terbaik yang tersedia, dengan fasilitas modern dan harga
                    yang terjangkau.
                </p>

                <!-- Grid Responsif -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <?php $__empty_1 = true; $__currentLoopData = $kosKami; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('customer.kost.show', $kost->id)); ?>">
                            <div
                                class="h-full hover:bg-orange-200 p-2 rounded-lg transition-all duration-300 border border-orange-200">
                                <img src="<?php echo e(asset('storage/' . $kost->image)); ?>" alt="<?php echo e($kost->nama); ?>"
                                    class="h-32 w-full rounded-lg object-cover">
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
                        <div class="col-span-full text-center py-8">
                            <div class="text-gray-500">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada kos tersedia</h3>
                                <p class="mt-1 text-sm text-gray-500">Kos akan tampil di sini ketika sudah tersedia.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Link Lihat Lebih Banyak -->
                <a href="<?php echo e(route('customer.kost.all')); ?>"
                    class="text-orange-500 hover:underline mt-5 block text-center sm:text-left">
                    Lihat lebih banyak Kos
                </a>
            </section>

        </main>

        <?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
    </body>
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
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/customer/kost/index.blade.php ENDPATH**/ ?>