@foreach($comments as $comment)
    <table class="table table-striped table-bordered">
        <tbody>
        <tr>
            <td style="width: 50%;"><strong><span>{{ $comment->user->name }}</span></strong></td>
            <td class="text-right"><span>{{ jdate($comment->created_at)->ago()  }}</span></td>
        </tr>
        <tr>
            <td colspan="2">
                <p>
                    {{ $comment->comment }}
                </p>

                 @include('Frontend.layouts.comments',['comments'=>$comment->child()->where('approved',1)->get()])

                <!-- Button trigger modal -->
                @auth
                    <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#sendComment" data-id="{{ $comment->id }}">
                        پاسخ به بررسی
                    </button>
                @endauth
            </td>
        </tr>
        </tbody>
    </table>
@endforeach
