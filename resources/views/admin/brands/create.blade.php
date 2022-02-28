@component('admin.content', ['title' => 'ایجاد برند'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">ایجاد برند</li>
    @endslot


    <div class="content">
        <!--Middle Part Start-->
        <div id="content">
            @include('admin.layouts.errors')



            <form class="form-horizontal" action="{{ route('admin.brands.store') }}" method="post" enctype="multipart/form-data" id="form">
                @csrf
                <div class="card">

                    <div class="card-body">

                        <div class="form-group">
                            <label for="persian_name" class="control-label"> نام فارسی برند:</label>
                            <input type="text" name="persian_name" class="form-control" id="persian_name"
                                placeholder="نام فارسی برند را وارد کنید." value="{{ old('persian_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="original_name" class="control-label"> نام اصلی برند:</label>
                            <input type="text" name="original_name" class="form-control" id="original_name"
                                placeholder="نام اصلی برند را وارد کنید." value="{{ old('original_name') }}">
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label"> وضعیت :</label>
                            <select name="status" id="" class="form-control form-control-sm">
                                <option value="0" @if (old('status' == 0))  selected @endif>غیرفعال</option>
                                <option value="1" @if (old('status' == 1)) selected  @endif>فعال</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tags" class="control-label"> تگ ها :</label>
                            <input type="hidden" class="form-control form-control-sm" name="tags" id="tags" value="{{ old('tags') }}">
                            <select id="select_tags" class="select2 form-control form-control-sm" multiple>

                            </select>
                        </div>



                        <div class="form-group">
                            <label class="control-label">آپلود تصویر:</label>
                            <div class="input-group">

                                <input type="text" id="image_label" class="form-control" dir="ltr" name="logo">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-image">انتخاب</button>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="from-group text-left mt-4">
                            <button type="submit" class="btn btn-success" style="margin-bottom: 30px;">ایجادبرند</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--Middle Part End -->
    </div>


    @slot('script')



        <script>
           $(document).ready(function(){
              var tags_input = $('#tags');
              var select_tags = $('#select_tags');
              var default_tags = tags_input.val();
              var default_data = null;

              if (tags_input.val() !== null && tags_input.val().length > 0) {
                     default_data = default_tags.split(',');
              }

              select_tags.select2({
                  'placeholder' : 'لطفا تگ های خود را وارد نمایید.',
                  'tags': true,
                  data: default_data
              });

              select_tags.children('option').attr('selected',true).trigger('change');

              $('#form').submit(function (event){

                if(select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }

              })
           })



            //file manager
            document.addEventListener("DOMContentLoaded", function() {

                document.getElementById('button-image').addEventListener('click', (event) => {
                    event.preventDefault();

                    window.open('/file-manager/fm-button', 'fm', 'width=700,height=400');
                });
            });
            // set file link
            function fmSetLink($url) {
                document.getElementById('image_label').value = $url;
            }


        </script>
    @endslot
@endcomponent
