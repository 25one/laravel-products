<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

    <div class="row">
       <div class="col-md-12 col-md-12 col-md-12 margin">
            <div class="box box-primary">
                <div class="box-body">       
                   <h3>Home - List of goods</h3>
                   <?php 
                   //print_r($goods); 
                   ?>
                      <select class="topothers">
                         <option value="1">Top-9</option>
                         <option value="0">Others</option>                         
                      </select>
                      <table>
                         <thead>
                          <tr>
                            <!--
                            <td class="widthbutton">&nbsp;</td>
                            -->
                            <td>Image</td>
                            <td>Name</td>                            
                            <td>Price</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             <?php echo $__env->make('good.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          </tbody>    
                       </table>
                </div>
            </div>
       </div>  
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('public/js/main.js')); ?>"></script>
<script>
   $(document).ready(function(){
      $('.topothers').change(function(){
         BaseRecord.topothers($(this).val()); 
      });
   });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('good.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-goods-group1/resources/views/good/index.blade.php ENDPATH**/ ?>