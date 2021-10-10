<?php $__env->startSection('content'); ?>      
<div class="row col-md-8 col-md-offset-2 regstyle">
    <!--Middle Part Start-->

         <?php echo $__env->make('admin.layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h1 class="title">ویرایش حساب کاربری</h1>
        <form class="form-horizontal" action="<?php echo e(route('profile.update',$user->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <fieldset id="account">
                <legend>اطلاعات شخصی شما</legend>

                <div class="form-group required">
                    <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"  id="input-firstname"  placeholder="نام" name="name" value="<?php echo e(old('name',$user->name)); ?>" required>
                        
                    </div>
                </div>
                <div class="form-group required">
                    <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-lastname" placeholder="نام خانوادگی" name="lastname" value="<?php echo e(old('lastname',$user->lastname)); ?>" required>         
                    </div>
                </div>
                <div class="form-group required">
                    <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="<?php echo e(old('email',$user->email)); ?>"  name="email" required>
                        
                    </div>
                </div>
                <div class="form-group required">
                    <label for="input-telephone" class="col-sm-2 control-label">شماره موبایل</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="input-telephone" placeholder="شماره موبایل" value="<?php echo e(old('phone',$user->phone)); ?>" name="phone" required>
                        
                    </div>
                </div>      
                <div class="form-group required">
                     <label for="input-company" class="col-sm-2 control-label">جنسیت</label>
                     <div class="col-sm-10" style="line-height: 37px">
                         <input type="radio"  id="male" name="gender" <?php echo e($user->gender == 'male' ? 'checked' : ''); ?> value="male">
                        <label for="male" class="ml-5">مرد</label> 
                       <input type="radio" id="female" name="gender" <?php echo e($user->gender == 'female' ? 'checked' : ''); ?> value="female">
                       <label for="female" class="">زن</label>  
                     </div>
                                  
             </div>
            </fieldset>
                  
            <fieldset id="address">
                <div class="form-group required">
                    <label for="input-address" class="col-sm-2 control-label">آدرس</label>
                      
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-address" placeholder="آدرس" name="address" value="<?php echo e(old('address',$user->address)); ?>" required>
                    </div>
                </div>

                <div class="form-group required">
                    <label for="input-national" class="col-sm-2 control-label">کد ملی</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="input-national" placeholder="کد ملی" name="nationalCode" value="<?php echo e(old('nationalCode',$user->nationalCode)); ?>">
                       
                    </div>
                </div>
              
                <div class="row mb-5">
                        <label for="input-country" class="col-sm-2 control-label">  استان</label>         
                        <span class="show_province col-sm-3"><?php echo e($user->province->name); ?></span>    
                    
                        <label for="input-country" class="col-sm-2 control-label mr-4">  شهر</label> 
                       <span class="show_province col-sm-3"><?php echo e($user->city->name); ?></span>  
                </div>


                <div id="app" class="mb-3">
                   <select-city-component :provinces="<?php echo e($provinces); ?>" :login="1"></select-city-component>  
                </div>
              
            </fieldset>

           
            <div class="form-group">
                <button type="submit" class="btn btn-success pull-left">ویرایش کاربر</button>
            </div>

        </form>
   
    <!--Middle Part End -->
</div>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/Frontend/profile/edit.blade.php ENDPATH**/ ?>