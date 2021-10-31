<?php $__env->startComponent('admin.content' , ['title' => 'لیست سفارشات']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست سفارشات</li>
    <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">سفارشات</h3>

                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="hidden" name="type" value="<?php echo e(request('type')); ?>">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="<?php echo e(request('search')); ?>">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>آیدی سفارش</th>
                                <th>نام کاربر</th>
                                <th>هزینه سفارش</th>
                                <th>وضعیت سفارش</th>
                                <th>شماره پیگیری پستی</th>
                                <th>زمان ثبت سفارش</th>
                                <th style="text-align: center">اقدامات</th>
                            </tr>

                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->id); ?></td>
                                    <td><?php echo e($order->user->name); ?></td>
                                    <td><?php echo e($order->price); ?></td>
                                    <td><?php echo e($order->status); ?></td>
                                    <td><?php echo e($order->tracking_serial ?? 'هنوز ثبت نشده'); ?></td>
                                    <td><?php echo e(jdate($order->created_at)->ago()); ?></td>
                                    <td class="d-flex">
                                        <a href="<?php echo e(route('admin.orders.show' , $order->id)); ?>" class="btn btn-sm btn-warning  ml-1">مشاهده جزئیات سفارش</a>
                                        <a href="<?php echo e(route('admin.orders.payments' , $order->id)); ?>" class="btn btn-sm btn-info  ml-1">مشاهده پرداخت ها</a>
                                        <a href="<?php echo e(route('admin.orders.edit' , $order->id)); ?>" class="btn btn-sm btn-primary  ml-1">ویرایش سفارش</a>
                                        <form action="<?php echo e(route('admin.orders.destroy' , $order->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php echo e($orders->appends([ 'type' => request('type') ])->render()); ?>

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
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/orders/all.blade.php ENDPATH**/ ?>