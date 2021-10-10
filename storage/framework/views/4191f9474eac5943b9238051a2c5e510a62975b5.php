<?php $__env->startSection('script-vue'); ?>
    <script>
        $('#sendComment').on('show.bs.modal',function (event){
          let button = $(event.relatedTarget) //button that triggered the modal
          let parent_id = button.data('id')
          let modal = $(this)
          modal.find('input[name="parent_id"]').val(parent_id)
        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Breadcrumb Start-->
    <ul class="breadcrumb">
        <li><a href="#"><span><i class="fa fa-home"></i></span></a></li>
        <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><span><?php echo e($cate->name); ?></span></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <!-- Breadcrumb End-->
    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-9">
            <div>
                <h1 class="title"><?php echo e($product->name); ?></h1>
                <div class="row product-info">
                    <div class="col-sm-6">
                        <div class="image">
                            <div style="height:410px;width:350px;" class="zoomWrapper">
                                <img class="img-responsive" id="zoom_01" src="<?php echo e($product->image); ?>" style="position: absolute;width:220px;height:330px">
                            </div>
                        </div>
                        <div class="center-block text-center">
                            <span class="zoom-gallery"><i class="fa fa-search"></i></span>
                            <span> برای مشاهده گالری روی تصویر کلیک کنید</span>
                        </div>
                        <div class="image-additional" id="gallery_01">
                            <a class="thumbnail" href="#" title="<?php echo e($product->name); ?>">
                                <img src="/image/product/macbook_air_1-66x99.jpg" title="<?php echo e($product->name); ?>" alt="<?php echo e($product->name); ?>">
                            </a>
                            <a class="thumbnail" href="#" title="<?php echo e($product->name); ?>">
                                <img src="/image/product/macbook_air_4-66x99.jpg" title="<?php echo e($product->name); ?>"alt="<?php echo e($product->name); ?>">
                            </a>
                            <a class="thumbnail" href="#" title="<?php echo e($product->name); ?>">
                                <img src="/image/product/macbook_air_2-66x99.jpg" title="<?php echo e($product->name); ?>" alt="<?php echo e($product->name); ?>">
                            </a>
                            <a class="thumbnail" href="#" title="<?php echo e($product->name); ?>">
                                <img src="/image/product/macbook_air_3-66x99.jpg" title="<?php echo e($product->name); ?>" alt="<?php echo e($product->name); ?>">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <ul class="list-unstyled description">
                            <li><b>برند :</b> <a href="#"><span itemprop="brand">اپل</span></a></li>
                            <li><b>کد محصول :</b> <span><?php echo e($product->id); ?></span></li>
                            <li><b>امتیازات خرید:</b> 700</li>
                            <li><b>وضعیت موجودی :</b>
                                <?php if($product->inventory >0): ?>
                                  <span class="instock">موجود</span>
                                <?php else: ?>
                                    <span class="bnt-error">اتمام موجودی</span>
                                <?php endif; ?>
                            </li>
                        </ul>
                        <ul class="price-box">
                            <li class="price">
                                <?php if($product->discount_percent): ?>
                                    <span class="price-new"><?php echo e($product->price - ($product->price * $product->discount_percent/100)); ?> تومان</span>
                                    <span class="price-old"><?php echo e($product->price); ?> تومان</span>
                               <?php else: ?>
                                    <span class="price-new"><?php echo e($product->price); ?> تومان</span>
                                <?php endif; ?>
                            </li>

                        </ul>
                        <div id="product">
                            <h3 class="subtitle">انتخاب های در دسترس</h3>
                            <div class="form-group required">
                                <label class="control-label">رنگ</label>
                                <select class="form-control" id="input-option200" name="option[200]">
                                    <option value=""> --- لطفا انتخاب کنید ---</option>
                                    <option value="4">مشکی</option>
                                    <option value="3">نقره ای</option>
                                    <option value="1">سبز</option>
                                    <option value="2">آبی</option>
                                </select>
                            </div>
                            <div class="cart">
                                <div>
                                        <form action="<?php echo e(route('cart.add',$product->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-primary btn-lg">افزودن به سبد</button>
                                        </form>
                                </div>
                                <div>
                                    <button type="button" class="wishlist" onclick="">
                                        <i class="fa fa-heart"></i>
                                        <span>افزودن به علاقه مندی ها</span>
                                    </button>
                                    <br>
                                    <button type="button" class="wishlist" onclick="">
                                        <i class="fa fa-exchange"></i>
                                        <span>مقایسه این محصول</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-description" data-toggle="tab" aria-expanded="true">توضیحات</a></li>
                    <li class=""><a href="#tab-specification" data-toggle="tab" aria-expanded="false">مشخصات</a></li>
                    <li class=""><a href="#tab-review" data-toggle="tab" aria-expanded="false">بررسی (2)</a></li>
                </ul>
                <div class="tab-content">
                    <div itemprop="description" id="tab-description" class="tab-pane active">
                        <div>
                           <?php if($product->categories): ?>
                                <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="#"><?php echo e($cate->name); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php endif; ?>
                            <p> <?php echo $product->description; ?> </p>
                        </div>
                    </div>
                    <div id="tab-specification" class="tab-pane">
                        <div id="tab-specification" class="tab-pane">

                            <ul style="list-style: none">
                                <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="c-product__specs-table-item">
                                    <div class="c-product__specs-table-item-title"> <?php echo e($attr->name); ?></div>
                                    <div class="c-product__specs-table-item-values"><?php echo e($attr->pivot->value->value); ?></div>
                                </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="sendComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">ارسال نظر</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <form action="<?php echo e(route('send.comment')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="modal-body">

                                <input type="hidden" name="commentable_id" value="<?php echo e($product->id); ?>">
                                <input type="hidden" name="commentable_type" value="<?php echo e(get_class($product)); ?>">
                                <input type="hidden" name="parent_id" value="0">
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">پیام دیدگاه:</label>
                                        <textarea name="comment" id="message-text" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">لغو</button>
                                <button type="submit" class="btn btn-primary">ارسال نظر</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div id="tab-review" class="tab-pane" style="margin-bottom: 45px">
                        <div id="review">
                            <div>
                               <?php echo $__env->make('Frontend.layouts.comments',['comments' => $product->comments()->latest()->where('approved',1)->where('parent_id',0)->get() ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                        <?php if(auth()->guard()->check()): ?>
                            <h2>یک بررسی بنویسید</h2>
                            <form action="<?php echo e(route('send.comment')); ?>" class="form-horizontal" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="commentable_id" value="<?php echo e($product->id); ?>">
                                <input type="hidden" name="commentable_type" value="<?php echo e(get_class($product)); ?>">
                                <input type="hidden" name="parent_id" value="0">
                                <div class="form-group required">
                                    <div class="col-sm-12">
                                        <label for="input-review" class="control-label">بررسی شما</label>
                                        <textarea class="form-control" id="input-review" rows="5" name="comment"></textarea>
                                        <div class="help-block">
                                            <span class="text-danger">توجه :</span> HTML بازگردانی نخواهد شد!
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <div class="pull-left">
                                        <button class="btn btn-success"  id="button-review" type="submit" style="margin-bottom: 25px" >ثبت بررسی</button>
                                    </div>
                                </div>
                            </form>
                        <?php else: ?>
                            <p><b>برای ثبت بررسی باید وارد سایت شوید.</b></p>
                            <a class="btn btn-success" href="<?php echo e(route('login')); ?>">صفحه لاگین</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Middle Part End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/Frontend/home/single-product.blade.php ENDPATH**/ ?>