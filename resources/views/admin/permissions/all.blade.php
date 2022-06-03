@component('admin.content',['title' => 'دسترسی ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">دسترسی ها</li>
    @endslot
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">دسترسی ها</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            <a href="{{ route('admin.permissions.create') }}" class="btn btn-info">ایجاد دسترسی جدید</a>

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
                        <tr>
                            <th>نام دسترسی</th>
                            <th>توضیح دسترسی</th>
                            <th>اقدامات</th>
                        </tr>
                        @foreach($permissions as $permission)
                            <tr class="text-center">

                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->label }}</td>

                                <td class="d-flex">
                                        <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete ml-1">حذف</button>
                                        </form>

                                        <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-sm btn-primary ml-1">ویرایش</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $permissions->appends(['search' => request('search')])->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    @slot('script')
    @include('alerts.sweetalert.delete-confirm',['className' => 'delete'])
    @endslot
@endcomponent
