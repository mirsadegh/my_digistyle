<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <table class="table table-striped table-bordered">
        <tbody>
        <tr>
            <td style="width: 50%;"><strong><span><?php echo e($comment->user->name); ?></span></strong></td>
            <td class="text-right"><span><?php echo e(jdate($comment->created_at)->ago()); ?></span></td>
        </tr>
        <tr>
            <td colspan="2">
                <p>
                    <?php echo e($comment->comment); ?>

                </p>

                 <?php echo $__env->make('Frontend.layouts.comments',['comments'=>$comment->child()->where('approved',1)->get()], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- Button trigger modal -->
                <?php if(auth()->guard()->check()): ?>
                    <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#sendComment" data-id="<?php echo e($comment->id); ?>">
                        پاسخ به بررسی
                    </button>
                <?php endif; ?>
            </td>
        </tr>
        </tbody>
    </table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/Frontend/layouts/comments.blade.php ENDPATH**/ ?>