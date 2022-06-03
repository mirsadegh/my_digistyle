<?php $__env->startComponent('admin.content' , ['title' => 'مقام ها']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">مقام ها</li>
    <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">مقام ها</h3>

                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="<?php echo e(request('search')); ?>">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create-role')): ?>
                              <a href="<?php echo e(route('admin.roles.create')); ?>" class="btn btn-info">ایجاد مقام جدید</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>نام مقام</th>
                                <th>توضیح مقام</th>
                                <th>اقدامات</th>
                            </tr>

                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($role->name); ?></td>
                                    <td><?php echo e($role->label); ?></td>
                                    <td class="d-flex">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-role')): ?>
                                            <form action="<?php echo e(route('admin.roles.destroy' ,  $role->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger delete ml-1">حذف</button>
                                            </form>
                                        <?php endif; ?>

                                       <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-role')): ?>
                                       <a href="<?php echo e(route('admin.roles.edit' ,$role->id)); ?>" class="btn btn-sm btn-primary">ویرایش</a>

                                       <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php echo e($roles->render()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <?php $__env->slot('script'); ?>
    <?php echo $__env->make('alerts.sweetalert.delete-confirm',['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/roles/all.blade.php ENDPATH**/ ?>