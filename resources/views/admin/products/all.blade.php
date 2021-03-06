@component('admin.content',['title' => 'لیست محصولات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست محصولات</li>
    @endslot
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">محصولات</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            <a href="{{ route('admin.products.create') }}" class="btn btn-info">ایجاد محصول جدید</a>
                        </div>
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px">
                                <input type="text" name="search" class="form-control" placeholder="جستجو" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                        <tr class="text-center">
                            <th>ردیف </th>
                            <th>نام محصول</th>
                            <th>تعداد موجودی</th>
                            <th>درصد تخفیف</th>
                            <th>تعداد بازدید</th>
                            <th>اقدامات</th>
                        </tr>
                        @foreach($products as $product)
                            <tr class="text-center">
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->inventory }}</td>
                                <td>{{ $product->discount_percent }}</td>
                                <td>{{ $product->view_count }}</td>
                                <td class="d-flex">
                                        <form action="{{ route('admin.products.destroy',['product' => $product->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete ml-1">حذف</button>
                                        </form>
                                        <a href="{{ route('admin.products.edit',['product' => $product->id]) }}" class="btn btn-sm btn-primary ml-1">ویرایش</a>
                                        <a href="{{  route('admin.products.gallery.index',['product' => $product->id]) }}" class="btn btn-sm btn-warning ml-1">گالری تصاویر</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $products->appends(['search' => request('search')])->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    @slot('script')
    @include('alerts.sweetalert.delete-confirm',['className' => 'delete'])
    @endslot
@endcomponent
