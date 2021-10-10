<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
         $comments = Comment::query();
         if ($keyword = \request('search')){
             $comments->where('comment','LIKE',"%{$keyword}%")
                 ->orWhere('id',$keyword)->orWhereHas('user',function ($query) use($keyword){
                     $query->where('name','LIKE',"%{$keyword}%");
                 })->orWhereHasMorph('commentable',[Product::class],function ($query)use($keyword){
                      $query->where('name','LIKE',"%{$keyword}%");
                 })->get();
         }

         if(\request('approved')){
             $comments->where('approved',1)->get();
         }elseif (\request('unapproved')){
             $comments->where('approved',0)->get();
         }
         $comments = $comments->latest()->paginate(12);
        return view('admin.comments.all',compact('comments'));
    }

    public function changeApproved($id)
    {
       $comment = Comment::findOrFail($id);
       $comment->update([
           'approved'=> 1
       ]);

       alert()->success('نظر با موفقیت تایید شد.');

       return back();
//       return response()->json([
//             'status' => 'success',
//       ]);
    }

    public function changeUnApproved($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update([
            'approved'=> 0
        ]);
        alert()->error('نظر با موفقیت تایید نشد.');
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment = $comment->delete();
        alert()->success('کامنت مورد نظر با موفقیت حذف گردید');

        return back();
    }


}
