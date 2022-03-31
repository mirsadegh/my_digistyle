@component('admin.content' , ['title' => 'ویرایش  محصولات ویژه'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.discounts.index') }}">لیست تخفیف‌ها</a></li>
        <li class="breadcrumb-item active">ویرایش  محصول ویژه</li>
    @endslot
    @slot('head')
      <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
    @endslot

    @slot('script')
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
     <script>
     $(document).ready(function(){
        $('#start_date_view').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#start_date'
        });
        $('#end_date_view').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#end_date'
        });
    });
     </script>
    @endslot

    <div class="row">
        <div class="col-lg-12">
            @include('admin.layouts.errors')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">فرم ویرایش  محصول ویژه</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.amazing_sales.update' , $amazingSale->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">انتخاب محصول</label>
                            <select name="product_id" class="form-control">
                                <option>محصول موردنظر را انتخاب کنید</option>
                                @foreach ($products as $product)
                                 <option value="{{ $product->id }}"{{ $product->id == $amazingSale->product_id ? 'selected' : ''}}>{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="percent" class="col-sm-2 control-label">میزان تخفیف (درصد)</label>
                            <input type="number" name="percentage" class="form-control" placeholder="درصد تخفیف را وارد کنید" value="{{ old('percentage',$amazingSale->percentage) }}" required>
                        </div>

                        <div class="form-group d-flex">
                            <div class="col-md-6">
                                <label for="inputEmail3" class="col-sm-4 control-label">تاریخ شروع تخفیف</label>
                                <input type="text" name="start_date" id="start_date" class="form-control d-none">
                                <input type="text" id="start_date_view"  class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail3" class="col-sm-4 control-label">تاریخ اتمام تخفیف</label>
                                <input type="text" name="end_date" id="end_date" class="published_at form-control d-none">
                                <input type="text" id="end_date_view"  class="form-control">
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ویرایش محصول ویژه </button>
                        <a href="{{ route('admin.discounts.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
