<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($sub_cat->id); ?>" <?php if($sub_cat->id == $selected_cat->parent_id): ?> selected <?php endif; ?>><?php echo e(str_repeat('---',$level)); ?><?php echo e($sub_cat->name); ?></option>
    <?php $__currentLoopData = $sub_cat->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php echo $__env->make('admin.layouts.category',['categories' => $sub_cat->childs,'level' => $level+1,'selected_cat' => $selected_cat], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/admin/layouts/category.blade.php ENDPATH**/ ?>