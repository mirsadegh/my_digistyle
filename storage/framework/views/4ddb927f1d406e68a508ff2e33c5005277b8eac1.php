<?php $__env->startComponent('admin.content' , ['title' => 'ویرایش مقام']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.permissions.index')); ?>">همه مقام ها</a></li>
        <li class="breadcrumb-item active">ویرایش مقام</li>
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('script'); ?>
        <script>
            $('#permissions').select2({
                'placeholder' : 'مقام مورد نظر را انتخاب کنید',
                tags: true
            })
            $('#roles').select2({ })
        </script>
    <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">فرم ویرایش مقام</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo e(route('admin.roles.update' , $role->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">عنوان مقام</label>
                            <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="عنوان مقام را وارد کنید" value="<?php echo e(old('name' , $role->name)); ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">توضیح مقام</label>
                            <input type="text" name="label" class="form-control" id="inputEmail3" placeholder="توضیح مقام را وارد کنید" value="<?php echo e(old('label' , $role->label)); ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">دسترسی ها</label>
                            <select class="form-control" name="permissions[]" id="permissions" multiple>
                                <?php $__currentLoopData = \App\Models\Permission::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($permission->id); ?>" <?php echo e(in_array($permission->id , $role->permissions->pluck('id')->toArray()) ? 'selected' : ''); ?>><?php echo e($permission->name); ?> - <?php echo e($permission->label); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش مقام</button>
                        <a href="<?php echo e(route('admin.roles.index')); ?>" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/roles/edit.blade.php ENDPATH**/ ?>