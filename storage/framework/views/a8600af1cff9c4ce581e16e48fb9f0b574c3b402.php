<div class="slideshow single-slider owl-carousel">
    <?php $__currentLoopData = \App\Models\Slider::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
    <div class="item"> <a href="#"><img class="img-responsive" src="<?php echo e($slider->image); ?>" alt="<?php echo e($slider->heading); ?>" height="420px !important" /></a> </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
</div>
<?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/layouts/slideshow.blade.php ENDPATH**/ ?>