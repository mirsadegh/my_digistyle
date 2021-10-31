<?php $__env->startComponent('admin.content',['title' => 'لیست دسته بندی ها']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست دسته بندی ها</li>
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('head'); ?>
        <style>
            .table-head{
                 margin:20px 25px;
            }
        </style>
    <?php $__env->endSlot(); ?>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <h3 class="card-title table-head">دسته بندی ها</h3>
                    <div class="text-left mr-auto">
                        <a class="btn btn-app" href="<?php echo e(route('admin.categories.create')); ?>">
                            <i class="fa fa-plus"></i> جدید
                        </a>
                    </div>
                </div>

            </div>
            <?php if(Session::has('error_category')): ?>
                <div class="alert alert-danger">
                    <div><?php echo e(Session('error_category')); ?></div>
                </div>
           <?php endif; ?>
            <!-- /.card-header -->
            <div class="card-body">

                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"></div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid">
                                <thead>
                                <tr role="row" class="text-center">
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">شناسه</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">عنوان</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">دسته والد</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd text-center">
                                    <td tabindex="0"><?php echo e($category->id); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td><?php echo e($category->parent($category->parent_id)); ?></td>
                                    <td class="d-flex">
                                        <a class="btn btn-sm btn-warning" href="<?php echo e(route('admin.categories.edit',$category->id)); ?>">ویرایش</a>
                                        <div class="display-inline-block mr-3">
                                            <form method="post" action="<?php echo e(route('admin.categories.destroy',$category->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?> 
                                                <button type="submit"  class="btn btn-sm btn-danger show_confirm"  data-toggle="tooltip" title='Delete'>حذف</button>
                                            </form>
                                            
                                        </div>
                                        <a href="<?php echo e(route('admin.categories.create')); ?>?parent_id=<?php echo e($category->id); ?>" class="btn btn-sm btn-primary mr-3">ثبت زیر دسته</a>
                                    </td>
                                </tr>
                                <?php if(count($category->childs) > 0): ?>
                                    <?php echo $__env->make('admin.layouts.categories-group',['categories' => $category->childs,'level'=>1], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


    </div>

    <?php $__env->slot('script'); ?>
       <script type="text/javascript">
         $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `آیا واقعا میخواهید این دسته بندی را حذف کنید؟`,
                text: "!اگر شما این دسته بندی را حذف کنید. کاملا از بین خواهد رفت",
                icon: "warning",
                buttons: true,
                dangerMode: true,  
            })
            .then((willDelete) => {
              if (willDelete) {
                form.submit();
              }
            });
        });
       </script>
        
    <?php $__env->endSlot(); ?>

<?php if (isset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695)): ?>
<?php $component = $__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695; ?>
<?php unset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>





<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/categories/all.blade.php ENDPATH**/ ?>