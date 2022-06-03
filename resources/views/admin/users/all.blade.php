@component('admin.content',['title' => 'لیست کاربران'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست کاربران</li>
    @endslot
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">کاربران</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            <a href="{{ route('admin.users.create') }}" class="btn btn-info">ایجاد کاربر جدید</a>
                            {{-- <a href="{{ request()->fullUrlWithQuery(['admin' => 1 ]) }}" class="btn btn-warning">کاربران مدیر</a> --}}
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
                            <th>آیدی کاربر</th>
                            <th>نام کاربر</th>
                            <th>ایمیل</th>
                            <th>وضعیت ایمیل</th>
                            <th>مقام کاربر</th>
                            <th>اقدامات</th>
                        </tr>
                        @foreach($users as $user)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @if($user->email_verified_at)
                                    <td><span class="badge badge-success">فعال</span></td>
                                @else
                                    <td><span class="badge badge-danger">غیرفعال</span></td>
                                @endif

                                    <td><span class="badge badge-primary">{{ $user->role->label ?? '' }}</span></td>


                                <td class="d-flex">
                                     @can('delete-user')
                                       <form action="{{ route('admin.users.destroy',['user' => $user->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete ml-1">حذف</button>
                                        </form>
                                     @endcan

                                     @can('edit-user')
                                        <a href="{{ route('admin.users.edit',['user' => $user->id]) }}" class="btn btn-sm btn-primary ml-1">ویرایش</a>
                                     @endcan
                                     @can('show-roles')
                                     <a href="{{ route('admin.users.roles', $user->id) }}" class="btn btn-sm btn-warning ml-1">انتخاب مقام</a>
                                     @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $users->appends(['search' => request('search')])->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    @slot('script')
    @include('alerts.sweetalert.delete-confirm',['className' => 'delete'])
    @endslot
@endcomponent
