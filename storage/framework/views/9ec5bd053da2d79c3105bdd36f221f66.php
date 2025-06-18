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
            <?php echo e(__('Daftar Pengguna')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-4 rounded-xl shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-lg font-semibold">Daftar Pengguna</h1>
            </div>
            <div class="mt-2 mb-6">
                <a href="<?php echo e(route('admin.user.create')); ?>"
                    class="bg-orange-500 text-black px-4 py-2 rounded hover:bg-orange-600">Tambah Pengguna</a>
            </div>
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Password</th>
                        <th class="border px-4 py-2">Role</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="border px-4 py-2 text-center"><?php echo e($loop->iteration); ?></td>
                            <td class="border px-4 py-2"><?php echo e($user->name); ?></td>
                            <td class="border px-4 py-2"><?php echo e($user->email); ?></td>
                            <td class="border px-4 py-2">
                                <span class="password-field" data-password="<?php echo e($user->password); ?>" style="cursor: pointer;">
                                    ********
                                </span>
                            </td>
                            <td class="border px-4 py-2"><?php echo e($user->role); ?></td>
                            <td class="border px-4 py-2">
                                <div class="flex gap-3 justify-center items-center">
                                    <a href="<?php echo e(route('admin.user.edit', $user->id)); ?>"
                                        class="text-blue-600 hover:text-blue-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            class="h-5 w-5 flex justify-center items-center" viewBox="0 0 512 512">
                                            <path
                                                d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                        </svg>
                                    </a>|
                                    <form action="<?php echo e(route('admin.user.destroy', $user->id)); ?>" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-800 flex justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-5 w-5 "
                                                viewBox="0 0 448 512">
                                                <path
                                                    d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="border px-4 py-2 text-center">Data tidak tersedia</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if(session('success')): ?>
        <script>
            window.onload = function() {
                alert('<?php echo e(session('success')); ?>');
            }
        </script>
    <?php endif; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordFields = document.querySelectorAll('.password-field');

            passwordFields.forEach(field => {
                let isVisible = false;

                field.addEventListener('click', function() {
                    if (isVisible) {
                        this.textContent = '********';
                        isVisible = false;
                    } else {
                        this.textContent = this.getAttribute('data-password');
                        isVisible = true;
                    }
                });
            });
        });
    </script>
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
<?php /**PATH /Users/prakosolintang/MyPROJECT/soulcode/PHP/Laravel/kosmabescq/resources/views/admin/user/index.blade.php ENDPATH**/ ?>