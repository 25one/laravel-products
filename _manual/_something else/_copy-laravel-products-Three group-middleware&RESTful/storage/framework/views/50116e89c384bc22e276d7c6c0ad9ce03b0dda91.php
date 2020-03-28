<?php $__env->startSection('form-open'); ?>
    <form method="post" action="<?php echo e(route('products.store')); ?>">
                    <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('POST')); ?>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('product.dashboard.products.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-products3group/resources/views/product/dashboard/products/create.blade.php ENDPATH**/ ?>