<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/styles/cart.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/styles/cart_responsive.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

        <div class="cart_section">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="cart_container">
                            
                            <!-- Cart Items -->
                            <div class="cart_items">
                                <ul class="cart_items_list">

                                   <?php
                                      //print_r($cart);  
                                   ?>

                                   <?php echo $__env->make('product.cart-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                </ul>
                            </div>

                            <!-- Cart Buttons -->
                            <div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
                                <div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
                                    <div class="button button_clear trans_200"><a href="#">clear</a></div>
                                    <form name="clearall" method="post" action="/clearall" style="display: none;">
                                       <?php echo e(csrf_field()); ?>

                                    </form>
                                </div>
                            </div> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>                        

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- <script src="<?php echo e(asset('public/js/main.js')); ?>"></script> -->
<script>
$(document).ready(function(){
   $('.button_clear').click(function(){
      //clearall.submit();
      var clear=confirm('Would you really like to clean all cart?');
      if(clear) BaseRecord.clearall();
      return false;
   }); 
   $('.listbuttonremove').click(function(){
      BaseRecord.clearone($(this).attr('id'));
      return false;
   });      
});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('product.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-products/resources/views/product/cart.blade.php ENDPATH**/ ?>