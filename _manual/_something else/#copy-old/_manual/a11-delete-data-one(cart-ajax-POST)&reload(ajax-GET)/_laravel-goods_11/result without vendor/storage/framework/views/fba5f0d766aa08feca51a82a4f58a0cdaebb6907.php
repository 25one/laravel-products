<?php $__env->startSection('main'); ?>

    <div class="row">
       <div class="col-md-12 col-md-12 col-md-12 margin">
            <div class="box box-primary">
                <div class="box-body">       
                   <h3>Cart</h3>
                   <?php
                   //print_r($goods); 
                   ?>
                       <table>
                         <thead>
                          <tr>
                            <td class="widthbutton">&nbsp;</td>
                            <td>Image</td>
                            <td>Name</td>                            
                            <td>Price</td>
                          </tr>  
                          </thead>
                          <tbody id="pannel">
                             <?php echo $__env->make('good.brick-standard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          </tbody>    
                       </table>  
                       <hr>
		               <div class="box-footer">
		                    <button type="button" class="btn btn-danger button_clearcart">Clear Cart</button>
		                    <form name="form_clearcart" method="post" action="<?php echo e(route('clearcart')); ?>" style="display: none;">
		                                          <?php echo e(csrf_field()); ?>

		                    </form>
		               </div>                                        
                </div>
            </div>
       </div>  
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('public/js/main.js')); ?>"></script>
<script>
   $(document).ready(function(){
      $('.button_clearcart').click(function(){
         form_clearcart.submit(); 
      });
      $('.listbuttonremove').click(function(){
         BaseRecord.clearone($(this).attr('id')); 
         return false; //BECAUSE THIS IS <a>
      });      
   });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('good.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-goods-group1/resources/views/good/cart.blade.php ENDPATH**/ ?>