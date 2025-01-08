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
  <main class="px-10 lg:px-40 mt-10">
    <h1 class="text-2xl font-semibold mb-4">Semua Kos yang Tersedia</h1>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
      <?php $__currentLoopData = $kosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
  </main>
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
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/customer/kost/all.blade.php ENDPATH**/ ?>