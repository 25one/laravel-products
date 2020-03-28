<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" href="<?php echo e('products/' . $product->id); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<td class="col-md-6 col-sm-6 col-xs-6 center widthbutton"><a class="btn btn-primary listbuttonupdate" href="<?php echo e(route('products.edit', [$product->id])); ?>"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
   <td class="center"><img class="img_little" src="<?php echo e(asset('public/images/' . $product->image)); ?>" alt=""></td>
   <td><?php echo e($product->name); ?></td> 
   <td><?php echo e($product->price); ?></td>      
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /var/www/html/laravel-products3group/resources/views/product/dashboard/brick-standard.blade.php ENDPATH**/ ?>