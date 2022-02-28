<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo e($title); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <?php echo e($breadcrumb); ?>

                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
           <?php echo e($slot); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo e($script ?? ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('head'); ?>
    <?php echo e($head ?? ''); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/content.blade.php ENDPATH**/ ?>