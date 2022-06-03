<?php $__env->startComponent('admin.content' , ['title' => 'ثبت مقام']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.users.index')); ?>">لیست کاربران</a></li>
        <li class="breadcrumb-item active">ثبت مقام</li>
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('script'); ?>
        <script>
            $('#roles').select2({
                'placeholder' : 'مقام مورد نظر را انتخاب کنید'
            })
            $('#permissions').select2({ })
        </script>
    <?php $__env->endSlot(); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ثبت مقام</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo e(route('admin.users.roles.store',$user->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">کاربر</label>
                             <input type="text" class="form-control" value="<?php echo e($user->name); ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">مقام ها</label>
                            <select class="form-control" name="role" id="roles">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>" <?php echo e($role->id == $user->role_id ? 'selected' : ''); ?>><?php echo e($role->name); ?> - <?php echo e($role->label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت مقام</button>
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/users/roles.blade.php ENDPATH**/ ?>