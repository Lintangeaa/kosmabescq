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
        <div class="flex w-full justify-between items-center px-4 sm:px-8">
            <div class="mt-2 mb-2">
                <a href="<?php echo e(route('customer.kost.index')); ?>" class="bg-orange-500 text-black px-4 py-2 rounded hover:bg-orange-600">Kembali</a>
            </div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <?php echo e(__('Detail Kost')); ?>

            </h2>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="p-4 sm:p-8 md:p-12">
        <div class="bg-white shadow-lg rounded-lg p-4 sm:p-6 lg:p-8">
            <div class="flex justify-center mb-8">
                <!-- Gambar utama kost -->
                <?php if($kost->image): ?>
                    <img src="<?php echo e(asset('storage/'.$kost->image)); ?>" alt="<?php echo e($kost->nama); ?>" class="rounded-lg shadow-lg max-w-full h-auto">
                <?php else: ?>
                    <img src="https://via.placeholder.com/600x400.png?text=No+Image" alt="No Image" class="rounded-lg shadow-lg max-w-full h-auto">
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Nama Kost -->
                <div>
                    <h3 class="text-3xl font-semibold text-gray-800"><?php echo e($kost->nama); ?></h3>
                </div>
            </div>

            <div class="mt-6">
                <h4 class="text-2xl font-semibold text-gray-800">Alamat</h4>
                <div class="flex flex-col sm:flex-row items-start sm:items-center space-x-0 sm:space-x-4 mt-2">
                    <p class="text-gray-600"><?php echo e($kost->alamat_lengkap); ?></p>
                    <a href="<?php echo e($kost->gmap); ?>" target="_blank" class="text-blue-600 hover:underline mt-2 sm:mt-0 flex items-center">
                        <i class="fa fa-map-marker-alt text-red-500 mr-2"></i> Lihat di Google Maps
                    </a>
                </div>
            </div>

            <div class="mt-6">
                <h4 class="text-2xl font-semibold text-gray-800">Fasilitas</h4>
                <p class="text-gray-600 mt-2"><?php echo $kost->fasilitas; ?></p>
            </div>

            <div class="mt-6">
                <h4 class="text-2xl font-semibold text-gray-800">Informasi Tambahan</h4>
                <p class="text-gray-600 mt-2"><?php echo $kost->informasi; ?></p>
                <p class="text-xl text-gray-600 mt-2">Rp. <span class="text-orange-600 font-semibold"><?php echo e(number_format($kost->harga, 0, ',', '.')); ?></span> / bulan</p>
            </div>

            <!-- Button untuk memesan atau kontak -->
            <div class="flex justify-center mt-8">
                <?php if (isset($component)) { $__componentOriginalde8fa99d7d164450ac21f9a0af9f14e4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalde8fa99d7d164450ac21f9a0af9f14e4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.redirect-button','data' => ['href' => ''.e(route('customer.reservations.create', ['kost_id' => $kost->id])).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('redirect-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('customer.reservations.create', ['kost_id' => $kost->id])).'']); ?>
                    Reservasi
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalde8fa99d7d164450ac21f9a0af9f14e4)): ?>
<?php $attributes = $__attributesOriginalde8fa99d7d164450ac21f9a0af9f14e4; ?>
<?php unset($__attributesOriginalde8fa99d7d164450ac21f9a0af9f14e4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalde8fa99d7d164450ac21f9a0af9f14e4)): ?>
<?php $component = $__componentOriginalde8fa99d7d164450ac21f9a0af9f14e4; ?>
<?php unset($__componentOriginalde8fa99d7d164450ac21f9a0af9f14e4); ?>
<?php endif; ?>
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
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/customer/kost/show.blade.php ENDPATH**/ ?>