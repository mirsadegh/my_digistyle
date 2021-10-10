<?php $__env->startSection('script-vue'); ?>
    <script>
              function changeQuantity(event , id ) {
                  $.ajaxSetup({
                      headers:{
                          "X-CSRF-TOKEN" : document.head.querySelector('meta[name="csrf-token"]').content,
                          "Content-Type" : "application/json"
                      }
                  })

                  $.ajax({
                      type: 'POST',
                      url: '/cart/quantity/change',
                      data : JSON.stringify({
                          id: id ,
                          quantity : event.target.value,
                          _method : 'patch'
                      }),
                      success: function ($res){
                          console.log($res)
                          location.reload()
                      },
                      error: function ($error){
                          console.log($error)
                      }
                  })
              }

    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><a href="#">سبد خرید</a></li>
            </ul>

            <!-- Breadcrumb End-->
            <?php if(Cart::all()->count()): ?>
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title">سبد خرید</h1>

                    <div class="table-responsive">
                        <table class="table  text-center" >
                            <thead>
                            <tr>
                                <td>تصویر</td>
                                <td>نام محصول</td>
                                <td>تعداد</td>
                                <td>قیمت واحد</td>
                                <td>کل</td>
                            </tr>
                            </thead>
                            <tbody>

                               <?php $__currentLoopData = Cart::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                       $product = $cart['product'];
                                    ?>
                                 <tr>
                                    <td>
                                        <a href="<?php echo e(route('singleProduct',$product->id)); ?>">
                                            <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" title="<?php echo e($product->name); ?>" class="img-thumbnail" width="50" height="100">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('singleProduct',$product->id)); ?>" class="line-height-50"><?php echo e($product->name); ?></a><br>
                                    </td>
                                    <td>
                                            <select onchange="changeQuantity(event,'<?php echo e($cart['id']); ?>')" class="align-middle text-center">
                                                 <?php $__currentLoopData = range(1,$product->inventory); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <option value="<?php echo e($item); ?>" <?php echo e($cart['quantity'] == $item ? 'selected' : ''); ?>><?php echo e($item); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                    </td>

                                     <?php if(! $product->discount_percent): ?>
                                         <td><span class="line-height-50"><?php echo e(number_format($product->price)); ?> تومان </span></td>
                                     <?php else: ?>
                                         <td>
                                             <span class="line-height-50">
                                                 <del class="text-danger text-sm"><?php echo e(number_format($product->price)); ?>  تومان </del>
                                                 <span><?php echo e(number_format($product->price - ( $product->price * $product->discount_percent/100))); ?>   تومان  </span>
                                             </span>
                                         </td>
                                     <?php endif; ?>


                                     <?php if(! $product->discount_percent): ?>
                                         <td><span class="line-height-50"><?php echo e(number_format($product->price * $cart['quantity'])); ?> تومان </span></td>
                                     <?php else: ?>
                                         <td>
                                             <span class="line-height-50">
                                                 <del class="text-danger text-sm"><?php echo e(number_format($product->price * $cart['quantity'])); ?>  تومان </del>
                                                 <span><?php echo e(number_format(($product->price - ( $product->price * $product->discount_percent/100) ) * $cart['quantity'])); ?> تومان </span>
                                             </span>
                                         </td>
                                     <?php endif; ?>
                                     <td>
                                         <form action="<?php echo e(route('cart.destroy',$cart['id'])); ?>" method="post" id="delete-product-<?php echo e($product->id); ?>">
                                             <?php echo csrf_field(); ?>
                                             <?php echo method_field('DELETE'); ?>
                                         </form>
                                         <a href="#" onclick="event.preventDefault();document.getElementById('delete-product-<?php echo e($product->id); ?>').submit()" class="line-height-50"><i class="fa fa-close"></i></a>
                                     </td>
                                </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>

                    <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>
                    <?php if($discount = Cart::getDiscount()): ?>
                       <div class="mt-4 row">
                           <form action="/discount/delete" method="post" id="delete-discount">
                               <?php echo csrf_field(); ?>
                               <?php echo method_field('delete'); ?>

                           </form>

                           <div class="col-sm-6">
                               <div>
                                    <span>   کد تخفیف فعال :</span>
                                   <span class="text-success"><?php echo e($discount->code); ?></span>
                                   <a href="#" class="badge badge-danger mr-2" onclick="event.preventDefault();document.getElementById('delete-discount').submit()" >حذف</a>
                               </div>
                               <div>
                                   درصد تخفیف :
                                   <span class="text-success"><?php echo e($discount->percent); ?> درصد </span>
                               </div>
                           </div>
                       </div>
                    <?php else: ?>
                        <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                                    </div>
                                    <div id="collapse-coupon" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <label class="col-sm-5 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد کنید</label>
                                            <form action="<?php echo e(route('cart.discount.check')); ?>" method="post" >
                                                <?php echo csrf_field(); ?>
                                                <div class="input-group">
                                                    <input type="text" name="discount" placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon" class="form-control">
                                                    <span class="mt-3" style="margin-right: 44rem">
                                                    <button type="submit"  id="button-coupon" class="btn btn-primary">اعمال تخفیف</button>
                                                </span>
                                                </div>
                                            </form>
                                            <?php if($errors->has('discount')): ?>
                                                <div class="text-danger text-sm mt-2"><?php echo e($errors->first('discount')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endif; ?>
                    <?php
                     $totalPrice = Cart::all()->sum(function ($cart){
                           return $cart['product']->price * $cart['quantity'];
                      });

                      $discount = Cart::all()->sum(function ($cart){
                          return ($cart['product']->price * ($cart['product']->discount_percent / 100) )*$cart['quantity'];
                      });
                     if (isset(Cart::getDiscount()->percent)){
                          $discountper = Cart::getDiscount()->percent/100;
                          $codeDiscount = ($totalPrice - $discount) * $discountper;
                     }

                   if (isset($codeDiscount)){
                       $total = $totalPrice - $discount - $codeDiscount;
                   }else{
                       $total = $totalPrice - $discount ;
                   }
                    ?>
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="text-right"><strong>جمع کل:</strong></td>
                                    <td class="text-right"><?php echo e(number_format($totalPrice)); ?> تومان</td>
                                </tr>
                                <?php if($discount): ?>
                                <tr>
                                    <td class="text-right"><strong>تخفیف (محصولات):</strong></td>
                                   <td class="text-right"><?php echo e(number_format($discount)); ?> تومان</td>
                                </tr>
                                <?php endif; ?>
                                <?php if(isset($codeDiscount)): ?>
                                <tr>
                                    <td class="text-right"><strong>تخفیف (کد تخفیف):</strong></td>
                                   <td class="text-right"><?php echo e(number_format($codeDiscount)); ?> تومان</td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <td class="text-right"><strong>مبلغ قابل پرداخت :</strong></td>
                                    <td class="text-right"><?php echo e(number_format($total)); ?> تومان </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="buttons">
                        <form action="<?php echo e(route('cart.payment')); ?>" method="post" id="cart-payment">
                            <?php echo csrf_field(); ?>
                        </form>
                        <div class="pull-left">
                            <a href="#" onclick="event.preventDefault();document.getElementById('cart-payment').submit()" class="btn btn-default">ادامه خرید</a>
                        </div>
                </div>
                <!--Middle Part End -->
            </div>
            <?php else: ?>
              <div class="c-checkout__headline"><div class="c-checkout__headline-title">سبد خرید شما</div></div>
               <div class="c-checkout-product__list-empty">
                   <div class="c-checkout-product__empty-symbol"></div>
                   <div class="c-checkout-product__empty-title">سبد خرید شما خالی است.</div>
               </div>

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/Frontend/home/cart.blade.php ENDPATH**/ ?>