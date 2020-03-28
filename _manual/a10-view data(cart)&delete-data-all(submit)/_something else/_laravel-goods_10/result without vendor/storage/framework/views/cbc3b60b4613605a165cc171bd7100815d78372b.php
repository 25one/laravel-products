<?php $__env->startSection('main'); ?>

<?php
//print_r($product);
?>

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                    <?php if($errors->any()): ?>
                        <?php $__env->startComponent('good.components.alert'); ?>
                            <?php $__env->slot('type'); ?>
                                danger
                            <?php $__env->endSlot(); ?>
                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php echo e($error); ?><br>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>                
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="image"><img class="img_little" src="<?php echo e(asset('public/images/' . $product->image)); ?>" alt /></div> 
                    </div>
                    <div class="form-group">
                        <label for="type">Name</label>
                        <div class="name"><?php echo e($product->name); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="user">Price</label>
                        <div class="price"><?php echo e($product->price); ?></div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-primary button_tocart">to Cart</button>
                    <form name="form_tocart" method="post" action="<?php echo e(url('/tocart')); ?>" style="display: none;">
                                          <?php echo e(csrf_field()); ?>

                       <input type="hidden" name="image" value="<?php echo e($product->image); ?>" />
                       <input type="hidden" name="name" value="<?php echo e($product->name); ?>" />
                       <input type="hidden" name="price" value="<?php echo e($product->price); ?>" />
                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <!-- right column -->
       <div class="col-md-3">
       </div> 
    </div>
    <!-- /.row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
   $(document).ready(function(){
      $('.button_tocart').click(function(){
         form_tocart.submit(); 
      });
   });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('good.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-goods-group1/resources/views/good/product.blade.php ENDPATH**/ ?>