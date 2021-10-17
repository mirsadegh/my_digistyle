<?php $__env->startComponent('admin.content',['title' => 'ویرایش محصول']); ?>
    <?php $__env->slot('breadcrumb'); ?>
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">ویرایش محصول</li>
    <?php $__env->endSlot(); ?>

        <div class="content">
            <!--Middle Part Start-->
            <div id="content">
                <?php echo $__env->make('admin.layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div id="attributes" data-attributes="<?php echo e(json_encode(\App\Models\Attribute::all()->pluck('name'))); ?>"></div>
                <form class="form-horizontal" action="<?php echo e(route('admin.products.update',$product->id)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="card">

                      <div class="card-body">

                       <div class="form-group">
                            <label for="name" class="control-label"> نام:</label>
                           <input type="text" name="name" class="form-control" id="name" value="<?php echo e(old('name',$product->name)); ?>">
                       </div>

                       <div class="form-group">
                        <label for="description" class="control-label">توضیحات:</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10"><?php echo e(old('description',$product->description)); ?></textarea>
                   </div>

                   <div class="form-group">
                            <label for="price" class="control-label">قیمت:</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="قیمت محصول را وارد کنید." value="<?php echo e(old('price',$product->price)); ?>">
                   </div>

                   <div class="form-group">
                        <label for="inventory" class="control-label">موجودی:</label>
                        <input type="number" name="inventory" class="form-control" id="inventory" placeholder="موجودی محصول را وارد کنید." value="<?php echo e(old('inventory',$product->inventory)); ?>">
                  </div>

                  <div class="form-group">
                      <label for="inventory" class="control-label">درصد تخفیف:</label>
                      <input type="number" name="discount_percent" class="form-control" id="discount_percent" placeholder="درصد تخفیف" value="<?php echo e(old('discount_percent',$product->discount_percent)); ?>">
                  </div>

                   <div class="form-group">
                       <label class="col-sm-2 control-label">دسته بندی ها</label>
                       <select class="form-control" name="categories[]" id="categories" multiple>
                        <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($category->id); ?>" <?php echo e(in_array($category->id,$product->categories->pluck('id')->toArray()) ? 'selected':''); ?>><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </select>

                   </div>

                          <h6>ویژگی محصول</h6>
                          <hr>
                          <div id="attribute_section">

                             <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row" id="attribute-<?php echo e($loop->index); ?>">
                                  <div class="col-5">
                                      <div class="form-group">
                                          <label>عنوان ویژگی</label>
                                          <select name="attributes[<?php echo e($loop->index); ?>][name]" onchange="changeAttributeValues(event, <?php echo e($loop->index); ?>);" class="attribute-select form-control">
                                              <option value="">انتخاب کنید</option>
                                                <?php $__currentLoopData = \App\Models\Attribute::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($attr->name); ?>" <?php echo e($attr->name == $attribute->name ? 'selected' : ''); ?>><?php echo e($attr->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>

                                      </div>
                                  </div>
                                  <div class="col-5">
                                      <div class="form-group">
                                          <label>مقدار ویژگی</label>
                                          <select name="attributes[<?php echo e($loop->index); ?>][value]" class="attribute-select form-control">
                                              <option value="">انتخاب کنید.</option>
                                              <?php $__currentLoopData = $attribute->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($value->value); ?>" <?php echo e($value->id === $attribute->pivot->value_id ? 'selected' :''); ?>><?php echo e($value->value); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-2">
                                      <label>اقدامات</label>
                                      <div>
                                          <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attribute-<?php echo e($loop->index); ?>').remove()">
                                              حذف
                                          </button>
                                      </div>
                                  </div>

                              </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                          </div>
                          <button class="btn btn-sm btn-danger" type="button" id="add_product_attribute">ویژگی جدید</button>


                          <div class="form-group">
                      <hr>
                    <label  class="control-label">آپلود تصویر:</label>
                    <div class="input-group mb-2">
                        <input type="text" id="image_label" class="form-control" name="image" dir="ltr" value="<?php echo e($product->image); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                        </div>

                    </div>
                      <img src="<?php echo e($product->image); ?>" alt="" class="w-25">
                  </div>
                       <div class="from-group text-left">
                        <button type="submit" class="btn btn-success" style="margin-bottom: 30px;">ویرایش محصول</button>
                       </div>
                      </div>
                    </div>
                </form>

            </div>
            <!--Middle Part End -->
        </div>
    <?php $__env->slot('script'); ?>
        
        <script src="/js/ckeditor5-build-classic/ckeditor.js"></script>
        <script>

            $('#categories').select2({
                'placeholder': 'دسته بندی مورد نظر را انتخاب کنید.'
            });

      ClassicEditor
            .create( document.querySelector( '#description' ) , {
        language: {
            // The UI will be English.
            ui: 'fa',

            // But the content will be edited in Arabic.
            content: 'fa'
        }
    })
            .catch( error => {
                console.error( error );
        } );

            document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=700,height=500');
            });
            });

            // set file link
            function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
            }

            //create attribute value

            let changeAttributeValues = (event , id) =>{
                let valueBox = $(`select[name='attributes[${id}][value]']`);
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type' : 'application/json'
                    }
                })

                $.ajax({
                    type: 'POST',
                    url: '/admin/attribute/values',
                    data : JSON.stringify({
                        name : event.target.value
                    }),
                    success : function (res){
                        valueBox.html(`
                          <option value="" selected>انتخاب کنید</option>
                          ${
                            res.data.map(function(item){
                                return  `<option value="${item}">${item}</option>`
                            })
                        }
                       `)
                    }
                })
            }


            let createNewAttr = ({attributes , id})=>{

                return `
                  <div class="row" id="attribute-${id}">
                    <div class="col-5">
                         <div class="form-group">
                          <label>عنوان ویژگی</label>
                           <select name="attributes[${id}][name]" onchange="changeAttributeValues(event,${id});" class="attribute-select form-control">
                              <option value="">انتخاب کنید</option>
                               ${
                    attributes.map(function (item){
                        return `<option value="${item}">${item}</option>`
                    })
                }
                           </select>

                        </div>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                         <label>مقدار ویژگی</label>
                         <select name="attributes[${id}][value]" class="attribute-select form-control">
                              <option value="">انتخاب کنید.</option>
                         </select>
                      </div>
                    </div>
                    <div class="col-2">
                      <label>اقدامات</label>
                       <div>
                          <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attribute-${id}').remove()">
                            حذف
                          </button>
                       </div>
                    </div>

                  </div> `
            }


            $('#add_product_attribute').click(function (){
                let attributesSection = $('#attribute_section');
                let id = attributesSection.children().length;

                let attributes = $('#attributes').data('attributes');

                attributesSection.append(
                    createNewAttr({
                        attributes,
                        id
                    })
                );
                $('.attribute-select').select2({ tags : true })
            })
            $('.attribute-select').select2({ tags : true })



        </script>
    <?php $__env->endSlot(); ?>
<?php if (isset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695)): ?>
<?php $component = $__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695; ?>
<?php unset($__componentOriginal3868cefb37e84dfa0f62e77959fc379246768695); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>



<?php /**PATH C:\Users\Home\Desktop\project\digistyle\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>