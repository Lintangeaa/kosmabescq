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
      <div class="sticky top-0 h-20 bg-orange-200 flex justify-between items-center px-10 lg:px-40 z-20 shadow-md">
        <h1 class="text-xl uppercase font-extrabold text-ellipsis text-orange-700">Kosmabescq</h1>
        <div class="flex items-center space-x-6">
          <a href="<?php echo e(route('customer.kost.all')); ?>" class="text-sm text-orange-600 hover:text-orange-700">Lihat Semua Kost</a>
        </div>
      </div>
  
      <!-- Main Content -->
      <main class="px-10 lg:px-40 mt-10">
        <!-- Hero Section -->
        <div class="grid lg:grid-cols-2 gap-10">
          <img src="/assets/img/hero.jpg" alt="Kosmabescq" class="rounded-lg shadow-lg">
          <div class="h-auto flex justify-center items-center p-4 lg:p-8">
            <h1 class="text-3xl font-bold text-gray-800">Kosmabescq: Solusi Mudah untuk Semua Kebutuhan Pemesanan Kos Anda!</h1>
          </div>
        </div>
  
        <!-- Kos Populer Section -->
        <section class="py-8" id="populer">
          <h1 class="text-2xl font-semibold text-gray-800">
            Paling <span class="text-orange-500">Populer</span> dan Paling <span class="text-orange-500">Dicari</span>
          </h1>
          <div class="swiper-container mt-5">
            <div class="swiper-wrapper">
              <?php $__currentLoopData = $kosPopuler; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('customer.kost.show', $kost->id)); ?>" class="swiper-slide hover:-translate-y-2 transition-all duration-300">
                  <div class="w-48 bg-orange-100 h-56 rounded-xl p-2 hover:shadow-lg">
                    <img src="<?php echo e(asset('storage/'.$kost->image)); ?>" class="h-32 w-full rounded-xl object-cover" alt="<?php echo e($kost->nama); ?>">
                    <div class="py-2">
                      <h1 class="text-md font-semibold"><?php echo e($kost->nama); ?></h1>
                      <span class="text-xs text-orange-600">Rp. <?php echo e(number_format($kost->harga, 0, ',', '.')); ?> /bulan</span>
                      <span class="block text-xs text-gray-600">Kamar Tersedia: <?php echo e($kost->kamar_tersedia); ?></span>
                    </div>
                  </div>
                </a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </section>
  
        <!-- Kos Kami Section -->
        <section class="py-8" id="hotel">
          <h2 class="text-2xl font-bold text-gray-800 mb-4">Kos Kami</h2>
          <p class="mb-4 text-gray-600">Temukan kenyamanan di berbagai pilihan kos terbaik yang tersedia, dengan fasilitas modern dan harga yang terjangkau.</p>
          <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <?php $__currentLoopData = $kosKami; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="<?php echo e(route('customer.kost.show', $kost->id)); ?>">
                <div class="h-full hover:bg-orange-200 p-2 rounded-lg transition-all duration-300 border border-orange-200">
                  <img src="<?php echo e(asset('storage/'.$kost->image)); ?>" alt="<?php echo e($kost->nama); ?>" class="h-32 w-full rounded-lg object-cover">
                  <div class="py-2">
                    <h1 class="text-xs font-semibold text-gray-800"><?php echo e($kost->nama); ?></h1>
                    <p class="text-xs text-gray-600"><?php echo e($kost->address->formatted_address); ?></p>
                    <span class="text-xs text-orange-600">Rp. <?php echo e(number_format($kost->harga, 0, ',', '.')); ?> /bulan</span>
                    <span class="block text-xs text-gray-600">Kamar Tersedia: <?php echo e($kost->kamar_tersedia); ?></span>
                  </div>
                </div>
              </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <a href="<?php echo e(route('customer.kost.all')); ?>" class="text-orange-500 hover:underline mt-5">Lihat lebih banyak Kos</a>
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