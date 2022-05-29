<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="<?php echo e(route('index')); ?>"><i class="fa fa-home"></i></a></li>
        <li>جستجو</li>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title">جستجو - <?php echo e(request('search')); ?></h1>
            <label>شاخص جستجو</label>
            <div class="row">

                <form method="post">
                    <?php echo csrf_field(); ?>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="جستجو..." name="search">
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" name="category_id">
                            <option value="">همه دسته ها</option>

                            <?php $__currentLoopData = $parentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($parentCategory->id); ?>"><?php echo e($parentCategory->name); ?>

                                    <?php if($parentCategory->childs->count()): ?>
                                        <?php $__currentLoopData = $parentCategory->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>">--<?php echo e($category->name); ?>

                                    <?php if($category->childs->count()): ?>
                                        <?php $__currentLoopData = $category->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sub_cat->id); ?>">----<?php echo e($sub_cat->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary" id="button-search"> جستجو</button>
                    </div>

                </form>

            </div>
            <br>
            <div class="product-filter">
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <div class="btn-group">
                            <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip"
                                title="List"><i class="fa fa-th-list"></i></button>
                            <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip"
                                title="Grid"><i class="fa fa-th"></i></button>
                        </div>

                    </div>
                    
                    
                </div>
            </div>
            <br />
            <div class="row products-category">

                <?php if(isset($products)): ?>
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div class="product-layout product-list col-xs-12">
                                    <div class="product-thumb">
                                        <div class="image">
                                            <a href="<?php echo e(route('singleProduct',$product->id)); ?>}}">
                                                <img src="<?php echo e($product->image); ?>"  title="<?php echo e($product->name); ?>" class="img-responsive" width="180" />
                                            </a>
                                        </div>
                                        <div class="caption">
                                            <h4><a href="<?php echo e(route('singleProduct',$product->id)); ?>"><?php echo e($product->name); ?></a></h4>
                                            <?php if($product->discount_percent): ?>
                                            <p class="price">
                                                 <span class="price-new"><?php echo e(number_format($product->price - ( $product->price * $product->discount_percent/100))); ?> تومان</span>
                                                 <span class="price-old"><?php echo e(number_format($product->price)); ?> تومان</span>
                                                 <span class="saving">-<?php echo e($product->discount_percent); ?>%</span>
                                              </p>
                                          <?php else: ?>
                                            <p class="price"> <?php echo e(number_format($product->price)); ?> تومان </p>
                                          <?php endif; ?>

                                            <?php
                                                $ratings = $product->ratings;
                                              if ($ratings->count() > 0) {
                                                   $ratingCount = $ratings->count();
                                                $stars_rated = 0 ;
                                                foreach ($ratings as $rating){
                                                    $stars = $rating->stars_rated;
                                                    $stars_rated += $stars;
                                                }
                                                $avgRatingProduct = ceil($stars_rated/$ratingCount);
                                              }

                                            ?>
                                            <?php if($ratings->count() > 0): ?>
                                                <div class="rating">

                                                    <?php for($i=1;$i<=$avgRatingProduct;$i++): ?>
                                                        <span class="fa fa-stack">
                                                            <i class="fa fa-star fa-stack-2x"></i>
                                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                                        </span>
                                                    <?php endfor; ?>
                                                    <?php for($i>$avgRatingProduct;$i<=5;$i++): ?>
                                                        <span class="fa fa-stack">
                                                            <i class="fa fa-star-o fa-stack-2x"></i>
                                                        </span>
                                                    <?php endfor; ?>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                        <div class="button-group">
                                            <form action="<?php echo e(route('cart.add',$product->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-primary btn-lg">افزودن به سبد</button>
                                            </form>
                                            <div class="add-to-links">
                                            <?php if(Auth::check()): ?>
                                                <?php if(! $product->favorited()): ?>
                                                    <a href="#" id="<?php echo e($product->id); ?>" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick="event.preventDefault();changeFavorite(<?php echo e($product->id); ?>)">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="#" id="<?php echo e($product->id); ?>" data-toggle="tooltip" title="حذف از علاقه مندی ها" onClick="event.preventDefault();changeUnFavorite(<?php echo e($product->id); ?>)">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                              <form action="<?php echo e(route('addCompare',$product->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                               <button type="submit" data-toggle="tooltip" title="مقایسه این محصول">
                                                    <i class="fa fa-exchange"></i>
                                                </button>
                                              </form>

                                            </div>
                                        </div>
                                    </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>

            </div>

        </div>
        <!--Middle Part End -->
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script-vue'); ?>
<script type="text/javascript">

     $("#input-sort").change(function(){
         var select_sort = $(this).val();

         $.ajaxSetup({
             headers:{
                 "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content,
                 "Content-Type": "application/json"
             }
         })

         $.ajax({
             type: 'POST',
             url: '/searchPage',
             data: JSON.stringify({
                 orders : select_sort
             }),


         })
     })



    function changeFavorite(id){

          var url = /favorite/+id;
          $.ajax({
              url: url,
              type: "GET",
              success:function (response){
                  if (response.status) {
                      console.log(response.status);
                     $("#"+id +'>i').removeClass('fa-heart-o').addClass('fa-heart');
                      $("#"+id).attr('title' , response.message);
                  }
              },

          })
    }
    function changeUnFavorite(id){

        var url = '/unFavorite/'+ id;

        $.ajax({
            url: url,
            type: "GET",
            success:function (response){

                console.log(response.status)
                 if(response.status){
                     $("#"+id +'>i').removeClass('fa-heart').addClass('fa-heart-o');
                     $("#"+id).attr('title' , response.message);
                 }
            },

        })
    }
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/sadegh/Desktop/project/my_digistyle/resources/views/Frontend/home/search.blade.php ENDPATH**/ ?>