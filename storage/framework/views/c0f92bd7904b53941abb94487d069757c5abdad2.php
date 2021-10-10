<?php $__env->startComponent('admin.content' , ['title' => 'ایجاد کد تخفیف']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.discounts.index')); ?>">لیست تخفیف‌ها</a></li>
        <li class="breadcrumb-item active">ایجاد کد تخفیف</li>
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('head'); ?>

    <?php $__env->endSlot(); ?>

    <?php $__env->slot('script'); ?>

        <script>

            $('#users').select2({
                'placeholder' : 'کاربر مورد نظر را انتخاب کنید'
            })

            $('#products').select2({
                'placeholder' : 'محصول مورد نظر را انتخاب کنید'
            })

            $('#categories').select2({
                'placeholder' : 'دسته مورد نظر را انتخاب کنید'
            })


        </script>
    <?php $__env->endSlot(); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">فرم ایجاد کد تخفیف</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo e(route('admin.discounts.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">کد تخفیف</label>
                            <input type="text" name="code" class="form-control" id="inputEmail3" placeholder="کد تخفیف را وارد کنید" value="<?php echo e(old('code')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="percent" class="col-sm-2 control-label">میزان تخفیف (درصد)</label>
                            <input type="number" name="percent" class="form-control" placeholder="درصد تخفیف را وارد کنید" value="<?php echo e(old('percent')); ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">کاربر مربوط به تخفیف (اختیاری)</label>
                            <select class="form-control" name="users[]" id="users" multiple>
                                <?php $__currentLoopData = \App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="products" class="col-sm-2 control-label">محصول مربوطه (اختیاری)</label>
                            <select class="form-control" name="products[]" id="products" multiple>
                                <?php $__currentLoopData = \App\Models\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="categories" class="col-sm-2 control-label">دسته‌بندی مربوطه (اختیاری)</label>
                            <select class="form-control" name="categories[]" id="categories" multiple>

                                <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">مهلت استفاده</label>
                            <input type="datetime-local" name="expired_at" class="form-control"  placeholder="مهلت استفاده را وارد کنید" value="<?php echo e(old('expired_at')); ?>">
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
<?php if (isset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695)): ?>
<?php $component = $__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695; ?>
<?php unset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/admin/discount/create.blade.php ENDPATH**/ ?>