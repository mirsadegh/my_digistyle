<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="text-center">
        <td><?php echo e($sub_category->id); ?></td>
        <td>   <?php echo e(str_repeat('---',$level)); ?> <?php echo e($sub_category->name); ?></td>
        <td><?php echo e($sub_category->parent($sub_category->parent)); ?></td>
        <td class="d-flex">
            <a class="btn btn-sm btn-warning" href="<?php echo e(route('admin.categories.edit',$sub_category->id)); ?>">ویرایش</a>
            <div class="display-inline-block mr-3">
                <form method="post" action="<?php echo e(route('admin.categories.destroy',$sub_category->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit"  class="btn btn-sm btn-danger">حذف</button>
                </form>
            </div>
            <a href="<?php echo e(route('admin.categories.create')); ?>?parent=<?php echo e($sub_category->id); ?>" class="btn btn-sm btn-primary mr-3">ثبت زیر دسته</a>
        </td>
    </tr>
    <?php if(count($sub_category->childs) > 0): ?>
        <?php echo $__env->make('admin.layouts.categories-group',['categories' => $sub_category->childs,'level' => $level+1 ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/admin/layouts/categories-group.blade.php ENDPATH**/ ?>