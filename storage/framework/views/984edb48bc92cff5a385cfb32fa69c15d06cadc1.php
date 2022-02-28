<?php $__env->startComponent('admin.content', ['title' => 'لیست برندها']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست برندها</li>
    <?php $__env->endSlot(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">برندها</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            <a href="<?php echo e(route('admin.brands.create')); ?>" class="btn btn-info">ایجاد برند جدید</a>
                        </div>
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px">
                                <input type="text" name="search" class="form-control" placeholder="جستجو"  value="<?php echo e(request('search')); ?>">
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
                                <th>نام فارسی برند</th>
                                <th>نام اصلی برند</th>
                                <th>لوگو</th>
                                <th>اقدامات</th>
                            </tr>
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-center">
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($brand->persian_name); ?></td>
                                    <td><?php echo e($brand->original_name); ?></td>
                                    <td>
                                        <img src="<?php echo e(asset($brand->logo)); ?>" alt="<?php echo e($brand->original_name); ?>" width="30">
                                    </td>

                                    <td class="d-flex">
                                        <form action="<?php echo e(route('admin.brands.destroy', ['brand' => $brand->id])); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                        </form>
                                        <a href="<?php echo e(route('admin.brands.edit', ['brand' => $brand->id])); ?>" class="btn btn-sm btn-primary ml-1">ویرایش</a>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/brands/all.blade.php ENDPATH**/ ?>