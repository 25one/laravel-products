<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<?php if(\Request::is('cart')): ?>
<td class="center widthbutton"><a class="btn btn-danger listbuttonremove" id="<?php echo e($good->id); ?>" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
<?php endif; ?>
   <td><a href="<?php echo e(route('product', ['id' => $good->id])); ?>"><img class="img_little" src="<?php echo e(asset('public/images/' . $good->image)); ?>" alt /></a></td> 
   <td><?php echo e($good->name); ?></td>      
   <td><?php echo e($good->price); ?></td>   
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /home/alex/www/laravel-goods-group1/resources/views/good/brick-standard.blade.php ENDPATH**/ ?>