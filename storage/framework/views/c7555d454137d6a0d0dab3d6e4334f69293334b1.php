<?php $__env->startComponent('admin.content',['title' => 'دسترسی ها']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">دسترسی ها</li>
    <?php $__env->endSlot(); ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">دسترسی ها</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            <a href="<?php echo e(route('admin.permissions.create')); ?>" class="btn btn-info">ایجاد دسترسی جدید</a>

                        </div>
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px">
                                <input type="text" name="search" class="form-control" placeholder="جستجو" value="<?php echo e(request('search')); ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th>نام دسترسی</th>
                            <th>توضیح دسترسی</th>
                            <th>اقدامات</th>
                        </tr>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">

                                <td><?php echo e($permission->name); ?></td>
                                <td><?php echo e($permission->label); ?></td>

                                <td class="d-flex">
                                        <form action="<?php echo e(route('admin.permissions.destroy', $permission->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger delete ml-1">حذف</button>
                                        </form>

                                        <a href="<?php echo e(route('admin.permissions.edit', $permission->id)); ?>" class="btn btn-sm btn-primary ml-1">ویرایش</a>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php echo e($permissions->appends(['search' => request('search')])->render()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <?php $__env->slot('script'); ?>
    <?php echo $__env->make('alerts.sweetalert.delete-confirm',['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/permissions/all.blade.php ENDPATH**/ ?>