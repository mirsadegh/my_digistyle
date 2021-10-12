<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="dropdown-menu">
                        <a><?php echo e($sub_cate->name); ?> <span>&rsaquo;</span></a>
                    </div>
                </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/Frontend/layouts/sub_category.blade.php ENDPATH**/ ?>