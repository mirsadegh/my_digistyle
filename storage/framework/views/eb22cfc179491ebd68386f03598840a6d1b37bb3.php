<?php $__env->startSection('content'); ?>



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">تصاویر / <?php echo e($product->name); ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">

                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4 border">
                            <a href="<?php echo e(url($image->image)); ?>">
                                <img src="<?php echo e(url($image->image)); ?>" class="img-fluid mb-2" alt="<?php echo e($image->alt); ?>" width="200">
                            </a>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/gallery/index.blade.php ENDPATH**/ ?>