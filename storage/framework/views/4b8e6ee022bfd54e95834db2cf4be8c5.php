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
          <?php echo e(__('Daftar Kost')); ?>

      </h2>
   <?php $__env->endSlot(); ?>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4 rounded-xl shadow-lg">
          <div class="flex justify-between items-center mb-4">
              <h1 class="text-lg font-semibold">Daftar Kost</h1>
          </div>
          <div class="mt-2 mb-2">
            <?php if(auth()->user()->isOwner()): ?>
                <a href="<?php echo e(route('kost.create')); ?>" class="bg-orange-500 text-black px-4 py-2 rounded hover:bg-orange-600">Tambah Kost</a>
            <?php endif; ?>
          </div>
          <table class="w-full table-auto border-collapse border border-gray-300">
              <thead class="bg-gray-200">
                  <tr>
                      <th class="border px-4 py-2">No</th>
                      <th class="border px-4 py-2">Nama</th>
                      <th class="border px-4 py-2">Alamat</th>
                      <th class="border px-4 py-2">Harga</th>
                      <th class="border px-4 py-2">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                  <?php $__empty_1 = true; $__currentLoopData = $kosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                      <tr>
                          <td class="border px-4 py-2 text-center"><?php echo e($loop->iteration); ?></td>
                          <td class="border px-4 py-2"><?php echo e($kost->nama); ?></td>
                          <td class="border px-4 py-2"><?php echo e($kost->address->formatted_address); ?></td>
                          <td class="border px-4 py-2">Rp<?php echo e(number_format($kost->harga, 2)); ?></td>
                          <td class="border px-4 py-2 text-center">
                            <?php if(auth()->user()->isOwner()): ?>
                                <a href="<?php echo e(route('kost.edit', $kost->id)); ?>" class="text-blue-500 hover:underline">Edit</a> |
                            <?php endif; ?>
                              <form action="<?php echo e(route('kost.destroy', $kost->id)); ?>" method="POST" class="inline">
                                  <?php echo csrf_field(); ?>
                                  <?php echo method_field('DELETE'); ?>
                                  <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                              </form>
                          </td>
                      </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                      <tr>
                          <td colspan="5" class="border px-4 py-2 text-center">Data tidak tersedia</td>
                      </tr>
                  <?php endif; ?>
              </tbody>
          </table>
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
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/kost/index.blade.php ENDPATH**/ ?>