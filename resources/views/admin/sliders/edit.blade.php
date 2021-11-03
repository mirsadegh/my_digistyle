@component('admin.content' , ['title' => 'ویرایش تصویر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">ویرایش تصویر</li>
    @endslot

    @slot('script')
    <script src="/js/ckeditor5-build-classic/ckeditor.js"></script>
        <script>

                ClassicEditor
                        .create( document.querySelector( '#description' ) , {
                    language: {
                        // The UI will be English.
                        ui: 'fa',

                        // But the content will be edited in Arabic.
                        content: 'fa'
                    }
                })
                
            // input
            let image;
            $('body').on('click','.button-image' , (event) => {
                event.preventDefault();

                image = $(event.target).closest('.image-field');

                window.open('/file-manager/fm-button', 'fm', 'width=800,height=400');
            });

            // set file link
            function fmSetLink($url) {
                image.find('.image_label').first().val($url);
            }
        </script>
    @endslot

    <div class="row">
        <div class="col-lg-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش تصویر</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.sliders.update' , $slider->id) }}" method="POST">
                    @csrf
                    @method('patch')

                    <div class="card-body">
                        <div id="images_section">
                            <div class="row image-field">
                                <div class="col-6">
                                    <div class="form-group">
                                         <label>عنوان تصویر</label>
                                         <input type="text" name="heading" class="form-control" value="{{ old('heading',$slider->heading) }}">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                         <label>آپلود تصویر جدید</label>
                                         <div class="input-group">
                                            <input type="text" class="form-control image_label" name="image" value="{{ old('imag',$slider->image) }}" aria-label="Image" aria-describedby="button-image">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary button-image" type="button">انتخاب</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="{{ $slider->image }}" class="w-25">  
                    <div class="col-6 my-5">
                        <label for="product_id" class="control-label">انتخاب محصول</label>
                       <select class="form-control" name="product_id">
                           <option value="">انتخاب کنید.</option>
                        @foreach ($products as $product)
                             <option  value="{{  $product->id }}" {{   $product->id == $slider->product_id ? 'selected' : '' }}>{{ $product->name }}</option> 
                        @endforeach  
                    
                      </select>
                   </div>  
                   
                      
                        <div class="form-group">
                            <label for="description" class="control-label">توضیحات:</label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description',$slider->description) }}</textarea>
                       </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش تصاویر</button>
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>



@endcomponent
