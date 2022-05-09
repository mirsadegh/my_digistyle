@component('admin.content',['title' => 'لیست نظرات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">لیست نظرات</li>
    @endslot
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">نظرات</h3>
                    <div class="card-tools d-flex">
                        <div class="btn-group-sm ml-2">
                            @if(! request('approved') && ! request('unapproved'))
                                <a href="{{ request()->fullUrlWithQuery(['approved' => 1]) }}" class="btn btn-warning">نظرات تایید شده</a>
                                <a href="{{ request()->fullUrlWithQuery(['unapproved' => 1]) }}" class="btn btn-success">نظرات تایید نشده</a>
                            @elseif(! request('unapproved'))
                            <a href="{{ request()->fullUrlWithQuery(['approved' => 1]) }}" class="btn btn-warning">نظرات تایید شده</a>
                            @elseif(! request('approved'))
                            <a href="{{ request()->fullUrlWithQuery(['unapproved' => 1]) }}" class="btn btn-success">نظرات تایید نشده</a>
                            @endif
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
                            <th>ردیف</th>
                            <th>نام نظر دهنده</th>
                            <th>نام محصول</th>
                            <th>متن نظر</th>
                            <th>وضعیت نظر</th>
                            <th>اقدامات</th>
                        </tr>
                        @foreach($comments as $comment)
                            <tr class="text-center">
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->user->name }}</td>

                                <td>{{ $comment->commentable->name }}</td>
                                <td>{{ $comment->comment }}</td>

                                @if($comment->approved == 0)
                               <td ><a href="{{ route('admin.changeApproved',$comment->id) }}" class="btn btn-sm btn-success" title="تایید">تایید نشده</a></td>
                                @else
                                 <td> <span onclick="changeUnApproved({{ $comment->id }})"  class="btn btn-sm btn-warning" title="عدم تایید">تایید شده</span></td>
                                @endif


                                <td>
                                        <form action="{{ route('admin.comments.destroy',['comment' => $comment->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger delete ml-1">حذف</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $comments->appends(['search' => request('search')])->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

    @slot('script')
        <script>
            // function changeApproved(id){
            //     console.log(id)
            //     $.ajax({
            //         type: 'GET',
            //         url: '/admin/changeApproved/'+id,
            //         success:function (res){
            //             location.reload(true)
            //             console.log(res)
            //         }
            //     })
            //
            // }
            function changeUnApproved(id){
                console.log(id)
                $.ajax({
                    type: 'GET',
                    url: '/admin/changeUnApproved/'+id,
                    success:function (res){
                        location.reload(true)
                        console.log(res)
                    }
                })

            }


        </script>
        @include('alerts.sweetalert.delete-confirm',['className' => 'delete'])
    @endslot
@endcomponent
