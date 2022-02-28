@component('admin.content',['title' => 'ویرایش محصول'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">ویرایش محصول</li>
    @endslot

        <div class="content">
            <!--Middle Part Start-->
            <div id="content">
                @include('admin.layouts.errors')

                <div id="attributes" data-attributes="{{ json_encode(\App\Models\Attribute::all()->pluck('name')) }}"></div>
                <form class="form-horizontal" action="{{ route('admin.products.update',$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card">

                      <div class="card-body">

                       <div class="form-group">
                            <label for="name" class="control-label"> نام:</label>
                           <input type="text" name="name" class="form-control" id="name" value="{{ old('name',$product->name) }}">
                       </div>

                       <div class="form-group">
                        <label for="description" class="control-label">توضیحات:</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description',$product->description) }}</textarea>
                   </div>

                   <div class="form-group">
                            <label for="price" class="control-label">قیمت:</label>
                            <input type="number" name="price" class="form-control" id="price" placeholder="قیمت محصول را وارد کنید." value="{{ old('price',$product->price) }}">
                   </div>

                   <div class="form-group">
                        <label for="inventory" class="control-label">موجودی:</label>
                        <input type="number" name="inventory" class="form-control" id="inventory" placeholder="موجودی محصول را وارد کنید." value="{{ old('inventory',$product->inventory) }}">
                  </div>

                  <div class="form-group">
                      <label for="inventory" class="control-label">درصد تخفیف:</label>
                      <input type="number" name="discount_percent" class="form-control" id="discount_percent" placeholder="درصد تخفیف" value="{{ old('discount_percent',$product->discount_percent) }}">
                  </div>

                   <div class="form-group">
                       <label class="col-sm-2 control-label">دسته بندی ها</label>
                       <select class="form-control" name="category_id" id="categories">
                        @foreach(\App\Models\Category::where('level',3)->get() as $category)
                               <option value="{{ $category->id }}" {{ $product->category_id  == $category->id ? 'selected':'' }}>{{ $category->name }}</option>
                        @endforeach
                       </select>

                   </div>

                          <h6>ویژگی محصول</h6>
                          <hr>
                          <div id="attribute_section">

                             @foreach($product->attributes as $attribute)
                                <div class="row" id="attribute-{{ $loop->index }}">
                                  <div class="col-5">
                                      <div class="form-group">
                                          <label>عنوان ویژگی</label>
                                          <select name="attributes[{{ $loop->index }}][name]" onchange="changeAttributeValues(event, {{ $loop->index }});" class="attribute-select form-control">
                                              <option value="">انتخاب کنید</option>
                                                @foreach(\App\Models\Attribute::all() as $attr)
                                                  <option value="{{ $attr->name }}" {{ $attr->name == $attribute->name ? 'selected' : '' }}>{{ $attr->name }}</option>
                                                @endforeach
                                          </select>

                                      </div>
                                  </div>
                                  <div class="col-5">
                                      <div class="form-group">
                                          <label>مقدار ویژگی</label>
                                          <select name="attributes[{{ $loop->index }}][value]" class="attribute-select form-control">
                                              <option value="">انتخاب کنید.</option>
                                              @foreach($attribute->values as $value)
                                                  <option value="{{ $value->value }}" {{ $value->id === $attribute->pivot->value_id ? 'selected' :'' }}>{{ $value->value }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-2">
                                      <label>اقدامات</label>
                                      <div>
                                          <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attribute-{{ $loop->index }}').remove()">
                                              حذف
                                          </button>
                                      </div>
                                  </div>

                              </div>
                              @endforeach


                          </div>
                          <button class="btn btn-sm btn-danger" type="button" id="add_product_attribute">ویژگی جدید</button>


                          <div class="form-group">
                      <hr>
                    <label  class="control-label">آپلود تصویر:</label>
                    <div class="input-group mb-2">
                        <input type="text" id="image_label" class="form-control" name="image" dir="ltr" value="{{ $product->image }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                        </div>

                    </div>
                      <img src="{{ $product->image }}" alt="" class="w-25">
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
    @slot('script')
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
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
    @endslot
@endcomponent



