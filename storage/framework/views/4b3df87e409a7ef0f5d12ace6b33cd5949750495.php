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
<!-- Breadcrumb Start-->
<div style="background-color: #fdfdfd;padding: 10px">
    <ul class="breadcrumb container">
        <li><a href="<?php echo e(route('index')); ?>"><i class="font-sz fa fa-home"></i></a></li>
        <li> <a href="<?php echo e(route('register')); ?>" class="font-sz">ثبت نام</a> </li>
        <li class="font-sz">ورود</li>
    </ul>
</div>

<div id="container">
    <div class="container">
            <!-- Breadcrumb End-->
            <div class="row regstyle">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">حساب کاربری ورود</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <h2 class="subtitle">مشتری جدید</h2>
                            <p><strong>ثبت نام حساب کاربری</strong></p>
                            <p>با ایجاد حساب کاربری میتوانید سریعتر خرید کرده، از وضعیت خرید خود آگاه شده و تاریخچه ی سفارشات خود را مشاهده کنید.</p>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary">ثبت نام</a> </div>
                        <form action="<?php echo e(route('login')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-6">
                                <h2 class="subtitle">مشتری قبلی</h2>
                                <p><strong>من از قبل مشتری شما هستم</strong></p>
                                <div class="form-group">
                                    <label class="control-label" for="input-email">آدرس ایمیل</label>
                                    <input type="email" name="email" value="" placeholder="آدرس ایمیل" id="input-email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
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
                                <div class="form-group">
                                    <label class="control-label" for="input-password">رمز عبور</label>
                                    <input type="password" name="password"  placeholder="رمز عبور" id="input-password" class="form-control">
                                    <br>
                                    <a href="<?php echo e(route('password.request')); ?>">فراموشی رمز عبور</a>

                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-success pull-left" style="border-radius: 3px">ورود</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

    </div>
</div>
</body>
</html>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/auth/login.blade.php ENDPATH**/ ?>