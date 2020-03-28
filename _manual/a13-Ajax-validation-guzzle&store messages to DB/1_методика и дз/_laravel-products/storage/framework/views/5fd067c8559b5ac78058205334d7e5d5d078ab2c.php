<?php $__env->startSection('css'); ?>
<style>
.product img {
opacity: 0.7;    
}
.product img:hover {
opacity: 1;   
cursor: pointer; 
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="super_container_inner">
        <div class="super_overlay"></div>

        <!-- Products -->

<?php
//print_r($products);
?>

        <div class="products">
			<div class="container">
				<div class="row products_row">

                <?php echo $__env->make('product.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				</div>
			  </div>
			</div>

        <div class="button load_more ml-auto mr-auto"><a href="#" class="link_again">больше</a>

        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- <script src="<?php echo e(asset('public/js/main.js')); ?>"></script> -->
<script>
$(document).ready(function(){
   /* 
   $('.product img').css('opacity', 0.7).css('cursor', 'pointer')
   .mouseover(function(){
       $(this).css('opacity', 1); 
   })
   .mouseout(function(){
       $(this).css('opacity', 0.7); 
   });
   */
   $('.load_more').click(function(){
      BaseRecord.top9=0;    
      BaseRecord.more();
      return false;
   });
   //header_search_button
   $('.header_search_button').click(function(){
      BaseRecord.search=$('.search_input').val();    
      BaseRecord.more();
      return false;
   });   
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('product.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel-products/resources/views/product/index.blade.php ENDPATH**/ ?>