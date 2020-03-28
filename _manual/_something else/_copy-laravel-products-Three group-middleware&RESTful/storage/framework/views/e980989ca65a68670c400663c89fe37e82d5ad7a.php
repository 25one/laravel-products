<?php $__env->startSection('form-open'); ?>
    <form method="post" action="<?php echo e(route('products.update', [$product->id])); ?>">
                     <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('PUT')); ?>   
<?php $__env->stopSection(); ?>

<?php echo $__env->make('product.dashboard.products.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-products3group/resources/views/product/dashboard/products/edit.blade.php ENDPATH**/ ?>