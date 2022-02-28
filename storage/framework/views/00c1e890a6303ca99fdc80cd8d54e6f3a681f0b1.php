<?php $__env->startComponent('admin.content' , ['title' => 'لیست تصاویر اسلایدر']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        
        <li class="breadcrumb-item active"> تصاویر اسلایدر</li>
    <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تصاویر</h3>

                    <div class="card-tools d-flex">
                        <div class="btn-group-sm mr-1">
                            <a href="<?php echo e(route('admin.sliders.create' )); ?>" class="btn btn-info">ثبت تصویر جدید</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-2">
                                <a href="<?php echo e(url($image->image)); ?>">
                                    <img src="<?php echo e(url($image->image)); ?>" class="img-fluid mb-2" alt="<?php echo e($image->alt); ?>">
                                </a>
                                <form action="<?php echo e(route('admin.sliders.destroy', $image->id )); ?>" id="image-<?php echo e($image->id); ?>" method="post">
                                    <?php echo method_field('delete'); ?>
                                    <?php echo csrf_field(); ?>
                                </form>
                                <a href="<?php echo e(route('admin.sliders.edit' , $image->id)); ?>" class="btn btn-sm btn-primary">ویرایش</a>
                                <a href="#" class="btn btn-sm btn-danger" onclick="document.getElementById('image-<?php echo e($image->id); ?>').submit()">حذف</a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php echo e($images->render()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/sliders/all.blade.php ENDPATH**/ ?>