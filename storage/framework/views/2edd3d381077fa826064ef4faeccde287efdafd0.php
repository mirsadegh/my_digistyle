<?php $__env->startComponent('admin.content', ['title' => 'ویرایش برند']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">ویرایش برند</li>
    <?php $__env->endSlot(); ?>

    <div class="content">
        <!--Middle Part Start-->
        <div id="content">
            <?php echo $__env->make('admin.layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <form class="form-horizontal" action="<?php echo e(route('admin.brands.update', $brand->id)); ?>" method="post" enctype="multipart/form-data" id="form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <div class="card">

                    <div class="card-body">

                        <div class="form-group">
                            <label for="persian_name" class="control-label">  نام فارسی برند:</label>
                            <input type="text" name="persian_name" class="form-control" id="persian_name"
                                value="<?php echo e(old('persian_name', $brand->persian_name)); ?>">
                        </div>
                        <div class="form-group">
                            <label for="original_name" class="control-label">  نام اصلی برند:</label>
                            <input type="text" name="original_name" class="form-control" id="original_name"
                                value="<?php echo e(old('original_name', $brand->original_name)); ?>">
                        </div>



                        <div class="form-group">
                            <label for="status" class="control-label">وضعیت:</label>
                             <select name="status" class="form-control form-control-sm">
                                 <option value="0" <?php if(old('status',$brand->status) == 0): ?> selected <?php endif; ?>>غیر فعال</option>
                                 <option value="1" <?php if(old('status' ,$brand->status)== 1): ?> selected <?php endif; ?>>فعال</option>
                             </select>
                        </div>

                        <div class="form-group">
                            <label for="tags" class="control-label">تگ :</label>
                            <input type="hidden" name="tags" class="form-control" id="tags" value="<?php echo e(old('tags', $brand->tags)); ?>">

                            <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                            </select>
                        </div>

                        <div class="form-group">
                            <hr>
                            <label class="control-label">آپلود تصویر:</label>
                            <div class="input-group mb-2">
                                <input type="text" id="image_label" class="form-control" name="logo" dir="ltr"
                                    value="<?php echo e($brand->logo); ?>">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                                </div>

                            </div>
                            <img src="<?php echo e($brand->logo); ?>" alt="" class="w-25">
                        </div>
                        <div class="from-group text-left">
                            <button type="submit" class="btn btn-success" style="margin-bottom: 30px;">ویرایش برند</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <!--Middle Part End -->
    </div>
    <?php $__env->slot('script'); ?>

        <script>

            $(document).ready(function(){

                var tags_input = $('#tags');
                var select_tags = $('#select_tags');
                var default_tags = tags_input.val();
                var default_data = null;

                if (tags_input.val() !== null && tags_input.val().length > 0) {
                     default_data = default_tags.split(',');
              }


                select_tags.select2({
                    'placeholder': 'لطفا تگ های خود را وارد نمایید.',
                    'tags': true,
                    data: default_data
                });

                select_tags.children('option').attr('selected',true).trigger('change');

                $('#form').submit(function(event){
                    if (select_tags.val() !== null && select_tags.val().length > 0) {
                          var selectSource = select_tags.val().join(', ');
                          tags_input.val(selectSource);
                    }

                })

            })



            document.addEventListener("DOMContentLoaded", function() {

                document.getElementById('button-image').addEventListener('click', (event) => {
                    event.preventDefault();

                    window.open('/file-manager/fm-button', 'fm', 'width=700,height=500');
                });
            });

            // set file link
            function fmSetLink($url) {
                document.getElementById('image_label').value = $url;
            }


        </script>
    <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/brands/edit.blade.php ENDPATH**/ ?>