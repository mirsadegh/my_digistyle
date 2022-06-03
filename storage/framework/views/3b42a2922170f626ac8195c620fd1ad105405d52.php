<?php $__env->startComponent('admin.content',['title' => 'لیست کاربران']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست کاربران</li>
    <?php $__env->endSlot(); ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">کاربران</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-info">ایجاد کاربر جدید</a>
                            
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
                            <th>آیدی کاربر</th>
                            <th>نام کاربر</th>
                            <th>ایمیل</th>
                            <th>وضعیت ایمیل</th>
                            <th>مقام کاربر</th>
                            <th>اقدامات</th>
                        </tr>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <?php if($user->email_verified_at): ?>
                                    <td><span class="badge badge-success">فعال</span></td>
                                <?php else: ?>
                                    <td><span class="badge badge-danger">غیرفعال</span></td>
                                <?php endif; ?>

                                    <td><span class="badge badge-primary"><?php echo e($user->role->label ?? ''); ?></span></td>


                                <td class="d-flex">
                                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-user')): ?>
                                       <form action="<?php echo e(route('admin.users.destroy',['user' => $user->id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger delete ml-1">حذف</button>
                                        </form>
                                     <?php endif; ?>

                                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-user')): ?>
                                        <a href="<?php echo e(route('admin.users.edit',['user' => $user->id])); ?>" class="btn btn-sm btn-primary ml-1">ویرایش</a>
                                     <?php endif; ?>
                                     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show-roles')): ?>
                                     <a href="<?php echo e(route('admin.users.roles', $user->id)); ?>" class="btn btn-sm btn-warning ml-1">انتخاب مقام</a>
                                     <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php echo e($users->appends(['search' => request('search')])->render()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <?php $__env->slot('script'); ?>
    <?php echo $__env->make('alerts.sweetalert.delete-confirm',['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/users/all.blade.php ENDPATH**/ ?>