
<?php $__currentLoopData = $frontCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="list-group-item" data-id="<?php echo e($parentCategory->id); ?>"> 
  <a href="<?php echo e(route('category',[$parentCategory])); ?>" style="width: 100px;display:inline-block"><?php echo e($parentCategory->name); ?></a>
  <i class="fa fa-arrow-left"></i>
</li>
<?php if($parentCategory->childs->count()): ?>
  <div class="list-second-level" data-id="<?php echo e($parentCategory->id); ?>" style="display:none;">
    <?php $__currentLoopData = $parentCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="list-group-item" data-id="<?php echo e($category->id); ?>">
        <i class="fa fa-arrow-right"></i>
        <a href="<?php echo e(route('category',[$parentCategory, $category])); ?>"><?php echo e($category->name); ?></a>
      </li>
      <?php if($category->childs->count()): ?>
        <div class="list-third-level" data-id="<?php echo e($category->id); ?>" style="display:none;">
          <?php $__currentLoopData = $category->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('category',[$parentCategory,$category,$childCategory->slug])); ?>" class="list-group-item<?php echo e($loop->last ? ' mb-1' : ''); ?>" data-id="<?php echo e($childCategory->id); ?>">
              <?php echo e($childCategory->name); ?> (<?php echo e($childCategory->products_count); ?>)
            </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      
<script>
  
       $('#categories li').click(function(){
          var $this = $(this);
          var id = $this.data('id');

          $this.siblings('li[data-id!= "'+ id +'"]').children('i').addClass('fa-arrow-left').removeClass('fa-arrow-down');
          $this.siblings('div[data-id!="' + id +'"]').hide();
          $this.children('i').toggleClass('fa-arrow-left').toggleClass('fa-arrow-down');
          $this.siblings('div[data-id=" '+id+' "]').toggle();

        });

        <?php if(isset($selectedCategories)): ?>
        <?php $__currentLoopData = $selectedCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($loop->index < 2): ?>
            $('#categories .list-group-item[data-id="<?php echo e($selected); ?>"]').click();
          <?php endif; ?>
          <?php if($loop->last): ?>
            $('#categories .list-group-item[data-id="<?php echo e($selected); ?>"]').toggleClass('active');
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>

</script>




<?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/Frontend/layouts/multilevel_sidebar_category.blade.php ENDPATH**/ ?>