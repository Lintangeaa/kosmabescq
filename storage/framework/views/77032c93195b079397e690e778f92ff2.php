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

  <body class="font-sans antialiased">
    <div class="sticky top-0 h-20 bg-orange-200 flex justify-between items-center px-10 lg:px-40 z-20">
        <h1 class="text-xl uppercase font-extrabold text-ellipsis">kosmabescq</h1>
        <i class="fa-solid fa-magnifying-glass hover:text-orange-700 cursor-pointer transition-all duration-300"></i>
    </div>

    <main class="px-10 lg:px-40 mt-5 h-full">
        <div class="grid lg:grid-cols-2">
            <img src="/assets/img/hero.jpg" alt="Kosmabescq">
            <div class="h-auto flex justify-center items-center p-4 lg:p-8">
                <h1 class="text-2xl font-bold">Kosmabescq: Solusi Mudah untuk Semua Kebutuhan Pemesanan Kos Anda!</h1>
            </div>
        </div>

        <section class="py-8" id="populer">
            <h1 class="text-2xl font-semibold">Paling <span class="text-orange-500">Populer</span> dan Paling <span class="text-orange-500">Dicari</span></h1>
            <div class="swiper-container mt-5">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $kosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($kost->kamar_tersedia > 0): ?>
                            <a href="<?php echo e(route('customer.kost.show', $kost->id)); ?>" class="swiper-slide hover:-translate-y-2 transition-all duration-300">
                                <div class="w-48 bg-orange-100 h-56 rounded-xl p-2">
                                    <img src="<?php echo e(asset('storage/'.$kost->image)); ?>" class="h-32 w-full rounded-xl" alt="<?php echo e($kost->name); ?>">
                                    <div class="py-2">
                                        <h1 class="text font-semibold"><?php echo e($kost->nama); ?></h1>
                                        <span class="text-xs">Rp. <?php echo e(number_format($kost->harga, 0, ',', '.')); ?> /bulan</span>
                                        <span class="block text-sm text-gray-600">Kamar Tersedia: <?php echo e($kost->kamar_tersedia); ?></span>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

        <section class="py-8" id="hotel">
            <div class="container mx-auto">
                <h2 class="text-2xl font-bold mb-4">Kos</h2>
                <p class="mb-4">Temukan kenyamanan dan kemewahan di hotel-hotel pilihan kami. Dengan berbagai fasilitas modern dan layanan premium, hotel kami menawarkan pengalaman menginap yang tak terlupakan. Cocok untuk perjalanan bisnis maupun liburan, setiap hotel kami menyediakan kamar yang elegan dan layanan pelanggan yang memuaskan.</p>
                <div class="grid grid-cols-4 gap-4">
                    <?php $__currentLoopData = $kosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($kost->kamar_tersedia > 0): ?>
                            <a href="<?php echo e(route('customer.kost.show', $kost->id)); ?>">
                                <div class="h-full hover:bg-orange-200 p-2 rounded-lg transition-all duration-300 border border-orange-200">
                                    <img src="<?php echo e(asset('storage/'.$kost->image)); ?>" alt="<?php echo e($kost->nama); ?>" class="h-2/3 w-full rounded-lg">
                                    <div class="py-2">
                                        <h1 class="text font-semibold"><?php echo e($kost->nama); ?></h1>
                                        <p><?php echo e($kost->address->formatted_address); ?></p>
                                        
                                        <span class="text-xs">Rp. <?php echo e(number_format($kost->harga, 0, ',', '.')); ?> /bulan</span>
                                        <span class="block text-xs text-gray-600">Kamar Tersedia: <?php echo e($kost->kamar_tersedia); ?></span>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <a href="/hotel" class="text-orange-500 hover:underline mt-5">Lihat lebih banyak hotel</a>
            </div>
        </section>

        <!-- Repeat similar for 'vila' and 'guest-house' sections -->
        <!-- Ensure to replace content with actual $kost data dynamically -->
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-start md:items-center">
            <!-- About Section -->
            <div class="mb-4 md:mb-0">
                <h3 class="text-xl font-bold mb-2">Kosmabescq</h3>
                <p class="text-gray-400">Menawarkan pengalaman menginap yang tak terlupakan dengan berbagai pilihan akomodasi yang nyaman dan elegan.</p>
            </div>
            
            <div class="flex space-x-4">
                <a href="https://facebook.com" class="text-gray-400 hover:text-white" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com" class="text-gray-400 hover:text-white" aria-label="Twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://instagram.com" class="text-gray-400 hover:text-white" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://linkedin.com" class="text-gray-400 hover:text-white" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
        <div class="text-center mt-6 border-t border-gray-700 pt-4">
            <p class="text-gray-400 text-sm">&copy; <?php echo e(date('Y')); ?> Kosmabescq. All rights reserved.</p>
        </div>
    </footer>

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
<?php endif; ?><?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/customer/kost/index.blade.php ENDPATH**/ ?>