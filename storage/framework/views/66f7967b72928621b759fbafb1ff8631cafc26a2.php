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
                            <a href="<?php echo e(request()->fullUrlWithQuery(['admin' => 1 ])); ?>" class="btn btn-warning">کاربران مدیر</a>
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
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <?php if($user->email_verified_at): ?>
                                    <td><span class="badge badge-success">فعال</span></td>
                                <?php else: ?>
                                    <td><span class="badge badge-danger">غیرفعال</span></td>
                                <?php endif; ?>
                                <?php if($user->isSuperUser()): ?>
                                    <td><span class="badge badge-dark">کاربر مدیر</span></td>
                                <?php elseif($user->isStuffUser()): ?>
                                    <td><span class="badge badge-success">کاربر کارمند</span></td>
                                <?php else: ?>
                                    <td><span class="badge badge-primary">کاربر معمولی</span></td>
                                <?php endif; ?>

                                <td class="d-flex">
                                        <form action="<?php echo e(route('admin.users.destroy',['user' => $user->id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                        </form>

                                        <a href="<?php echo e(route('admin.users.edit',['user' => $user->id])); ?>" class="btn btn-sm btn-primary ml-1">ویرایش</a>

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
<?php if (isset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695)): ?>
<?php $component = $__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695; ?>
<?php unset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/admin/users/all.blade.php ENDPATH**/ ?>