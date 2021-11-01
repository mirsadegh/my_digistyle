<?php $__env->startComponent('admin.content',['title' => 'لیست محصولات']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست محصولات</li>
    <?php $__env->endSlot(); ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">محصولات</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-info">ایجاد محصول جدید</a>
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
                        <tr class="text-center">
                            <th>ردیف </th>
                            <th>نام محصول</th>
                            <th>تعداد موجودی</th>
                            <th>درصد تخفیف</th>
                            <th>تعداد بازدید</th>
                            <th>اقدامات</th>
                        </tr>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="text-center">
                                <td><?php echo e($product->id); ?></td>
                                <td><?php echo e($product->name); ?></td>
                                <td><?php echo e($product->inventory); ?></td>
                                <td><?php echo e($product->discount_percent); ?></td>
                                <td><?php echo e($product->view_count); ?></td>
                                <td class="d-flex">
                                        <form action="<?php echo e(route('admin.products.destroy',['product' => $product->id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                        </form>
                                        <a href="<?php echo e(route('admin.products.edit',['product' => $product->id])); ?>" class="btn btn-sm btn-primary ml-1">ویرایش</a>
                                        <a href="<?php echo e(route('admin.products.gallery.index',['product' => $product->id])); ?>" class="btn btn-sm btn-warning ml-1">گالری تصاویر</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <?php echo e($products->appends(['search' => request('search')])->render()); ?>

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
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/products/all.blade.php ENDPATH**/ ?>