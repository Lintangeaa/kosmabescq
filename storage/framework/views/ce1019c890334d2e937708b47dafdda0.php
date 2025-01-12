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
          <?php echo e(__('Invoice Reservasi')); ?>

      </h2>
   <?php $__env->endSlot(); ?>

  <div class="p-12">
      <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
          <h3 class="text-2xl font-semibold text-gray-800">Invoice untuk <?php echo e($reservation->kost->nama); ?></h3>
          <p class="text-gray-600 mt-2">ID Reservasi: <span class="font-medium text-gray-800"><?php echo e($reservation->reservation_id); ?></span></p>
          <p class="text-gray-600 mt-1">Tanggal Mulai: <span class="font-medium text-gray-800"><?php echo e($reservation->tanggal_reservasi); ?></span></p>
          <p class="text-gray-600 mt-1">Total Bulan: <span class="font-medium text-gray-800"><?php echo e(floor($reservation->total)); ?> Bulan</span></p>
          <p class="text-gray-600 mt-1">Status: <span class="font-medium text-gray-800"><?php echo e($reservation->status); ?></span></p>
          <p class="text-gray-600 mt-1">Total Pembayaran: <span class="font-medium text-gray-800">Rp <?php echo e(number_format($reservation->total * $reservation->kost->harga, 0, ',', '.')); ?></span></p>
          <p class="text-gray-600 mt-1">Metode Pembayaran: <span class="font-medium text-gray-800"><?php echo e($payment->payment_method); ?></span></p>
          <p class="text-gray-600 mt-1">Tanggal Pembayaran: <span class="font-medium text-gray-800"><?php echo e($payment->created_at->format('d-m-Y H:i')); ?></span></p>

          <!-- Tombol Download Invoice -->
          <div class="mt-4 text-center">
              <a href="<?php echo e(route('customer.reservations.downloadInvoice', $reservation->reservation_id)); ?>" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                  Download Invoice
              </a>
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
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/customer/reservations/invoice.blade.php ENDPATH**/ ?>