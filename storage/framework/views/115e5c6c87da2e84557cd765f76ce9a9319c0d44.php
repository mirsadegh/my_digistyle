<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="image/favicon.png" rel="icon" />
    <title>فروشگاه مارکت شاپ</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap-rtl.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="/css/stylesheet-rtl.css" />

<?php echo $__env->yieldContent('css'); ?>
<!-- CSS Part End-->
</head>
<body>

<style>
    .font-sz {
        font-size: 18px !important;
    }
</style>

<div style="background-color: #fdfdfd;padding: 10px;">
    <ul class="breadcrumb container" >
        <li><a href="<?php echo e(route('index')); ?>"><i class="fa fa-home font-sz"></i></a></li>
        <li><a href="<?php echo e(route('login')); ?>" class="font-sz">ورود</a></li>
        <li class="font-sz">ثبت نام</li>
    </ul>
</div>
<div id="container">
    <div class="container" id="app">
    <!-- Breadcrumb Start--> 
            <!-- Breadcrumb End-->
            <div class="row col-md-8 col-md-offset-2 regstyle">
                <!--Middle Part Start-->
                <div id="content">
                    <h1 class="title">ثبت نام حساب کاربری</h1>
                    <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="<?php echo e(route('login')); ?>">صفحه لاگین</a> مراجعه کنید.</p>
                    <form class="form-horizontal" action="<?php echo e(route('register')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <fieldset id="account">
                            <legend>اطلاعات شخصی شما</legend>

                            <div class="form-group required">
                                <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  id="input-firstname"  placeholder="نام" name="name" value="<?php echo e(old('name')); ?>" required>
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger" style="margin-top: 10px">
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="input-lastname" placeholder="نام خانوادگی" name="lastname" value="<?php echo e(old('lastname')); ?>" required>
                                    <?php $__errorArgs = ['lastname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger" style="margin-top: 10px">
                                       <span class="invalid-feedback" role="alert">
                                           <strong><?php echo e($message); ?></strong>
                                       </span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="input-email" placeholder="آدرس ایمیل" value="<?php echo e(old('email')); ?>"  name="email" required>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger" style="margin-top: 10px">
                                       <span class="invalid-feedback" role="alert">
                                           <strong><?php echo e($message); ?></strong>
                                       </span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-telephone" class="col-sm-2 control-label">شماره موبایل</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="input-telephone" placeholder="شماره موبایل" value="<?php echo e(old('phone')); ?>" name="phone" required>
                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger" style="margin-top: 10px">
                                         <span class="invalid-feedback" role="alert">
                                           <strong><?php echo e($message); ?></strong>
                                        </span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>      
                            <div class="form-group required">
                                 <label for="input-company" class="col-sm-2 control-label">جنسیت</label>
                                 <div class="col-sm-10" style="line-height: 37px">
                                     <input type="radio"  id="male" name="gender" value="male">
                                    <label for="male" class="ml-5">مرد</label> 
                                   <input type="radio" id="female" name="gender" value="female">
                                   <label for="female" class="">زن</label>  
                                 <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                     <div class="alert alert-danger col-sm-12 pull-left">
                                         <span role="alert"><?php echo e($message); ?></span>
                                     </div>
                                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                 </div>                             
                         </div>
                        </fieldset>
                              
                        <fieldset id="address">
                    
                            <div class="form-group required">
                                <label for="input-address" class="col-sm-2 control-label">آدرس</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="input-address" placeholder="آدرس" name="address" value="<?php echo e(old('address')); ?>" required>
                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger mt-4">
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

                            <div class="form-group required">
                                <label for="input-national" class="col-sm-2 control-label">کد ملی</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control <?php $__errorArgs = ['nationalCode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="input-national" placeholder="کد ملی" name="nationalCode" value="<?php echo e(old('nationalCode')); ?>">
                                    <?php $__errorArgs = ['nationalCode'];
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
                           
                           
                            <select-city-component :login="0" :provinces="<?php echo e($provinces); ?>"></select-city-component>  
                           <?php $__errorArgs = ['province_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger col-sm-10 pull-left">
                                    <span role="alert"><?php echo e($message); ?></span>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <br>
                            <?php $__errorArgs = ['city_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger col-sm-10 pull-left">
                                    <span role="alert"><?php echo e($message); ?></span>
                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </fieldset>
                        <fieldset>
                            <legend>رمز عبور شما</legend>
                            <div class="form-group required">
                                <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="input-password" placeholder="رمز عبور" name="password" required>
                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="alert alert-danger" style="margin-top: 10px">
                                       <span class="invalid-feedback" role="alert">
                                          <strong><?php echo e($message); ?></strong>
                                       </span>
                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input-confirm" placeholder="تکرار رمز عبور" name="password_confirmation" required>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group buttons">
                                <input type="checkbox" value="1" name="agree" required>
                                &nbsp;من <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق هستم</a> &nbsp;
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-left">ثبت نام</button>
                        </div>

                    </form>
                </div>
                <!--Middle Part End -->
            </div>

    </div>
</div>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>

</body>
</html>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/auth/register.blade.php ENDPATH**/ ?>