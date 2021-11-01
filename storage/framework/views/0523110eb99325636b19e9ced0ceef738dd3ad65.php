<?php $__env->startComponent('admin.content' , ['title' => 'ویرایش تصویر']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><?php echo e($product->name); ?></li>
        <li class="breadcrumb-item active">ویرایش تصویر</li>
    <?php $__env->endSlot(); ?>

    <?php $__env->slot('script'); ?>
        <script>
            // input
            let image;
            $('body').on('click','.button-image' , (event) => {
                event.preventDefault();

                image = $(event.target).closest('.image-field');

                window.open('/file-manager/fm-button', 'fm', 'width=800,height=400');
            });

            // set file link
            function fmSetLink($url) {
                image.find('.image_label').first().val($url);
            }
        </script>
    <?php $__env->endSlot(); ?>

    <div class="row">
        <div class="col-lg-12">
            <?php echo $__env->make('admin.layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش تصویر</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo e(route('admin.products.gallery.update' , ['product' => $product->id, 'gallery' => $gallery->id ])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>

                    <div class="card-body">

                        <div id="images_section">
                            <div class="row image-field">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label>تصویر</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control image_label" name="image" value="<?php echo e(old('image' , $gallery->image)); ?>"
                                                   aria-label="Image" aria-describedby="button-image">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary button-image" type="button">انتخاب</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label>عنوان تصویر</label>
                                        <input type="text" name="alt" class="form-control" value="<?php echo e(old('alt' , $gallery->alt)); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش تصاویر</button>
                        <a href="<?php echo e(route('admin.products.gallery.index' , ['product' => $product->id])); ?>" class="btn btn-default float-left">لغو</a>
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
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/products/gallery/edit.blade.php ENDPATH**/ ?>