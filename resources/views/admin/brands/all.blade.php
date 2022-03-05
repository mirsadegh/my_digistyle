@component('admin.content', ['title' => 'لیست برندها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست برندها</li>
    @endslot
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">برندها</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            <a href="{{ route('admin.brands.create') }}" class="btn btn-info">ایجاد برند جدید</a>
                        </div>
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px">
                                <input type="text" name="search" class="form-control" placeholder="جستجو"  value="{{ request('search') }}">
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
                                <th>نام فارسی برند</th>
                                <th>نام اصلی برند</th>
                                <th>لوگو</th>
                                <th>اقدامات</th>
                            </tr>
                            @foreach ($brands as $brand)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->persian_name }}</td>
                                    <td>{{ $brand->original_name }}</td>
                                    <td>
                                        <img src="{{ asset($brand->logo) }}" alt="{{ $brand->original_name }}" width="30">
                                    </td>

                                    <td class="d-flex">
                                        <form action="{{ route('admin.brands.destroy', ['brand' => $brand->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                        </form>
                                        <a href="{{ route('admin.brands.edit', ['brand' => $brand->id]) }}" class="btn btn-sm btn-primary ml-1">ویرایش</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{-- {{ $brands->appends(['search' => request('search')])->render() }} --}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent


