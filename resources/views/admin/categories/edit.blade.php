@component('admin.content',['title' => 'ویرایش  دسته'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">ویرایش  دسته</li>
    @endslot

        <div class="content">
            <!--Middle Part Start-->
            <div id="content">
                   <div class="card">
                             <div class="card-header">
                                <h3 class="card-title">فرم ویرایش دسته</h3>
                             </div>
                           @if(Session::has('edit-category'))
                                <div class="alert alert-danger">
                                    <div>{{ Session('edit-category') }}</div>
                                </div>
                           @endif
                             <form class="form-horizontal" action="{{ route('admin.categories.update',$category->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group required">
                                        <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"  id="input-firstname"  placeholder="نام" name="name" value="{{ old('name',$category->name) }}" required>
                                            @error('name')
                                            <div class="alert alert-danger" style="margin-top: 10px">
                                                    <span role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                 </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">ویرایش دسته</button>
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-default float-left">لغو</a>
                                </div>
                             </form>
                   </div>
            </div>
            <!--Middle Part End -->
        </div>


@endcomponent




