<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="image/favicon.png" rel="icon" />
    <title>فروشگاه مارکت شاپ</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap-rtl.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="/css/owl.transitions.css" />
    <link rel="stylesheet" type="text/css" href="/css/responsive.css" />
    <link rel="stylesheet" type="text/css" href="/css/stylesheet-rtl.css" />
    <link rel="stylesheet" type="text/css" href="/css/responsive-rtl.css" />
    <link rel="stylesheet" type="text/css" href="/css/stylesheet-skin2.css" />


     <?php echo $__env->yieldContent('css'); ?>
    <!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
     
      <?php echo $__env->make('Frontend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="container">
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
    <!-- Feature Box End-->
    <!--Footer Start-->
      <?php echo $__env->make('Frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--Footer End-->

</div>
<!-- JS Part Start-->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing-1.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.dcjqaccordion.min.js"></script>
<script type="text/javascript" src="/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/js/custom.js"></script>


<!-- JS Part End-->
<?php echo $__env->make('sweet::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->yieldContent('script-vue'); ?>
</body>
</html>



<?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/Frontend/master.blade.php ENDPATH**/ ?>