<?php $__env->startComponent('admin.content' , ['title' => 'لیست محصولات ویژه']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست محصولات ویژه</li>
    <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">محصولات ویژه</h3>

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
                                <a href="<?php echo e(route('admin.amazing_sales.create')); ?>" class="btn btn-info">ایجاد تخفیف جدید</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered">
                        <tbody>
                        <tr class="text-center">
                            <th>آی‌دی  تخفیف ویژه</th>
                            <th>میزان تخفیف (درصد)</th>
                            <th>محصول</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ اتمام</th>
                            <th>اقدامات</th>
                        </tr>

                        <?php $__currentLoopData = $amazing_sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amazing_sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td><?php echo e($loop->iteration); ?></td>

                                <td><?php echo e($amazing_sale->percentage); ?></td>
                                <td>
                                   <?php echo e($amazing_sale->product->name); ?>

                                </td>

                                <td><?php echo e(jdate($amazing_sale->start_date)); ?></td>
                                <td><?php echo e(jdate($amazing_sale->end_date)); ?></td>
                                <td class="d-flex">
                                   <form action="<?php echo e(route('admin.amazing_sales.destroy' , $amazing_sale->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger delete ml-1">حذف</button>
                                   </form>
                                    <a href="<?php echo e(route('admin.amazing_sales.edit' , $amazing_sale->id)); ?>" class="btn btn-sm btn-primary ml-1">ویرایش</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
               <div class="card-footer">
                    <?php echo e($amazing_sales->render()); ?>

                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <?php $__env->slot('script'); ?>
    <?php echo $__env->make('alerts.sweetalert.delete-confirm',['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>



<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/amazingSale/all.blade.php ENDPATH**/ ?>