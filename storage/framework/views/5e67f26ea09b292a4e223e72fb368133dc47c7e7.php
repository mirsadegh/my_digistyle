<?php $__env->startComponent('admin.content' , ['title' => 'ایجاد تخفیف ویژه محصول']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.discounts.index')); ?>">لیست تخفیف‌ها</a></li>
        <li class="breadcrumb-item active">ایجاد  تخفیف ویژه</li>
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('head'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')); ?>">
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('script'); ?>
            <script src="<?php echo e(asset('admin-assets/jalalidatepicker/persian-date.min.js')); ?>"></script>
            <script src="<?php echo e(asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')); ?>"></script>
             <script>
             $(document).ready(function(){
                $('#start_date_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#start_date'
                });
                $('#end_date_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#end_date'
                });
            });
             </script>
    <?php $__env->endSlot(); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> فرم ایجاد کد تخفیف ویژه</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo e(route('admin.amazing_sales.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">انتخاب محصول</label>
                            <select name="product_id" class="form-control">
                                <option>محصول موردنظر را انتخاب کنید</option>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="percent" class="col-sm-2 control-label">میزان تخفیف (درصد)</label>
                            <input type="number" name="percentage" class="form-control" placeholder="درصد تخفیف را وارد کنید" value="<?php echo e(old('percentage')); ?>" required>
                        </div>

                        <div class="form-group d-flex">
                            <div class="col-md-6">
                                <label for="inputEmail3" class="col-sm-4 control-label">تاریخ شروع تخفیف</label>
                                <input type="text" name="start_date" id="start_date" class="form-control d-none">
                                <input type="text" id="start_date_view"  class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail3" class="col-sm-4 control-label">تاریخ اتمام تخفیف</label>
                                <input type="text" name="end_date" id="end_date" class="published_at form-control d-none">
                                <input type="text" id="end_date_view"  class="form-control">
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت کد تخفیف</button>
                        <a href="<?php echo e(route('admin.discounts.index')); ?>" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/amazingSale/create.blade.php ENDPATH**/ ?>