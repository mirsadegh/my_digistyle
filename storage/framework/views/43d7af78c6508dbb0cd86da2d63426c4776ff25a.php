<?php $__env->startSection('content'); ?>

      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title-404 text-center">404</h1>
          <p class="text-center lead">متاسفیم!<br>
            صفحه ی مورد نظرتان را پیدا نکردیم! </p>
          <div class="buttons text-center"> <a class="btn btn-primary btn-lg" href="<?php echo e(route('index')); ?>">ادامه</a> </div>
        </div>
        <!--Middle Part End -->
      </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/errors/404.blade.php ENDPATH**/ ?>