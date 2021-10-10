@component('admin.content',['title' => 'ایجاد دسته'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">ایجاد دسته</li>
    @endslot
        <div class="content">
            <!--Middle Part Start-->
            <div id="content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">فرم ایجاد دسته</h3>
                    </div>
                    <form class="form-horizontal" action="{{ route('admin.categories.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="input-firstname" class="col-sm-2 control-label"> نام دسته</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="input-firstname"  placeholder="نام دسته را وارد کنید." name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="alert alert-danger" style="margin-top: 10px">
                                                <span role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                           @if(request('parent'))
                               @php
                                  $parent = \App\Models\Category::find(request('parent'))
                               @endphp
                                <div class="form-group">
                                    <label for="input-firstname" class="col-sm-2 control-label">دسته والد</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  disabled  value="{{ $parent->name }}">
                                        <input type="hidden" name="parent" value="{{ $parent->id }}">
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success" style="margin-bottom: 30px">ایجاد دسته</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-default float-left">لغو</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--Middle Part End -->
        </div>
@endcomponent




