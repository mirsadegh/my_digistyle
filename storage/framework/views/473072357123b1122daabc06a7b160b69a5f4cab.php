<?php $__env->startComponent('admin.content',['title' => 'ایجاد دسته']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">ایجاد دسته</li>
    <?php $__env->endSlot(); ?>
        <div class="content">
            <!--Middle Part Start-->
            <div id="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">فرم ایجاد دسته</h3>
                    </div>
                    <form class="form-horizontal" action="<?php echo e(route('admin.categories.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="input-firstname" class="col-sm-2 control-label"> نام دسته</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="input-firstname"  placeholder="نام دسته را وارد کنید." name="name" value="<?php echo e(old('name')); ?>">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger" style="margin-top: 10px">
                                                <span role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                           <?php if(request('parent_id')): ?>
                               <?php
                                  $parent = \App\Models\Category::find(request('parent_id'))
                               ?>
                                <div class="form-group">
                                    <label for="input-firstname" class="col-sm-2 control-label">دسته والد</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  disabled  value="<?php echo e($parent->name); ?>">
                                        <input type="hidden" name="parent_id" value="<?php echo e($parent->id); ?>">
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success" style="margin-bottom: 30px">ایجاد دسته</button>
                            <a href="<?php echo e(route('admin.categories.index')); ?>" class="btn btn-default float-left">لغو</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--Middle Part End -->
        </div>
<?php if (isset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695)): ?>
<?php $component = $__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695; ?>
<?php unset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>




<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/admin/categories/create.blade.php ENDPATH**/ ?>