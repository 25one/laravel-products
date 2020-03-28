<?php $__env->startSection('main'); ?>

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Image</label>
                        <div class="image"><img src="" alt /></div> 
                    </div>
                    <div class="form-group">
                        <label for="type">Name</label>
                        <div class="name"></div>
                    </div>
                    <div class="form-group">
                        <label for="user">Price</label>
                        <div class="price"></div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="button" class="btn btn-primary">to Cart</button>
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


<?php echo $__env->make('good.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alex/www/laravel-goods-group1/resources/views/good/product.blade.php ENDPATH**/ ?>