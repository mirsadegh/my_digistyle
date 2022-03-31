@component('admin.content' , ['title' => 'لیست محصولات ویژه'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست محصولات ویژه</li>
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">محصولات ویژه</h3>

                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="{{ request('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1">
                                <a href="{{ route('admin.amazing_sales.create') }}" class="btn btn-info">ایجاد تخفیف جدید</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-bordered">
                        <tbody>
                        <tr class="text-center">
                            <th>آی‌دی  تخفیف ویژه</th>
                            <th>میزان تخفیف (درصد)</th>
                            <th>محصول</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ اتمام</th>
                            <th>اقدامات</th>
                        </tr>

                        @foreach($amazing_sales as $amazing_sale)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $amazing_sale->percentage }}</td>
                                <td>
                                   {{ $amazing_sale->product->name }}
                                </td>

                                <td>{{ jdate($amazing_sale->start_date) }}</td>
                                <td>{{ jdate($amazing_sale->end_date) }}</td>
                                <td class="d-flex">
                                   <form action="{{ route('admin.amazing_sales.destroy' , $amazing_sale->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                   </form>
                                    <a href="{{ route('admin.amazing_sales.edit' , $amazing_sale->id) }}" class="btn btn-sm btn-primary ml-1">ویرایش</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
               <div class="card-footer">
                    {{ $amazing_sales->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent

