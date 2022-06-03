<?php $__env->startComponent('admin.content',['title' => 'ایجاد دسترسی']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin"> پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.permissions.index')); ?>}"> همه دسترسی ها</a></li>
        <li class="breadcrumb-item active">ایجاد دسترسی</li>
    <?php $__env->endSlot(); ?>

            <div class="row">
              <div class="col-lg-12">
                <?php echo $__env->make('admin.layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">فرم ایجاد دسترسی</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" action="<?php echo e(route('admin.permissions.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">عنوان دسترسی</label>
                                <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="عنوان دسترسی را وارد کنید" value="<?php echo e(old('name')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="percent" class="col-sm-2 control-label">توضیح دسترسی</label>
                                <input type="text" name="label" class="form-control" placeholder="توضیح دسترسی را وارد کنید." value="<?php echo e(old('label')); ?>">
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">ثبت دسترسی</button>
                            <a href="<?php echo e(route('admin.permissions.index')); ?>" class="btn btn-default float-left">لغو</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
             </div>
            </div>
         </div>
            <!--Middle Part End -->

    <?php $__env->slot('script'); ?>
        <script src="<?php echo e(asset('/js/app.js')); ?>"></script>
    <?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>




<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/permissions/create.blade.php ENDPATH**/ ?>