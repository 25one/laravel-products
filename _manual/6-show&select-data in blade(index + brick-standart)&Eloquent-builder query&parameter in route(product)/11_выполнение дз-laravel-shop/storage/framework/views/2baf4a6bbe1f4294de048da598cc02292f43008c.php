<?php $__env->startSection('main'); ?>

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">

<?php
//print_r($products);
?>
            
            <div class="amado-pro-catagory clearfix">

               <?php echo $__env->make('shop.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
        </div>
        <!-- Product Catagories Area End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('shop.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-shop/resources/views/shop/index.blade.php ENDPATH**/ ?>