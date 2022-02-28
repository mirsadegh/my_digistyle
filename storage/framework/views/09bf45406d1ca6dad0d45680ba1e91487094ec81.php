<?php $__env->startComponent('admin.content' , ['title' => 'لیست تخفیف']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست تخفیف‌ها</li>
    <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تخفیف‌ها</h3>

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
                                <a href="<?php echo e(route('admin.discounts.create')); ?>" class="btn btn-info">ایجاد تخفیف جدید</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered">
                        <tbody>
                        <tr class="text-center">
                            <th>آی‌دی تخفیف</th>
                            <th>کد تخفیف</th>
                            <th>میزان تخفیف (درصد)</th>
                            <th>مربوط به کاربر</th>
                            <th>مربوط به محصول</th>
                            <th>مربوط به دسته</th>
                            <th>مهلت استفاده</th>
                            <th>اقدامات</th>
                        </tr>

                        <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td><?php echo e($discount->id); ?></td>
                                <td><?php echo e($discount->code); ?></td>
                                <td><?php echo e($discount->percent); ?></td>
                                <td><?php echo e($discount->users->count() ? $discount->users->pluck('name')->join(', ') : 'همه کاربران'); ?></td>
                                <td><?php echo e($discount->products->count() ? $discount->products->pluck('name')->join(', ') : 'همه محصولات'); ?></td>
                                <td><?php echo e($discount->categories->count() ?  $discount->categories->pluck('name')->join(', ') : 'همه دسته‌ها'); ?></td>
                                <td><?php echo e(jdate($discount->expired_at)->ago()); ?></td>
                                <td class="d-flex">
                                   <form action="<?php echo e(route('admin.discounts.destroy' , $discount->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                   </form>
                                    <a href="<?php echo e(route('admin.discounts.edit' , $discount->id)); ?>" class="btn btn-sm btn-primary ml-1">ویرایش</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php echo e($discounts->appends([ 'search' => request('search') ])->render()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/discount/all.blade.php ENDPATH**/ ?>