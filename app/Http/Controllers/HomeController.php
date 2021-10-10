<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified'])->only(['home','comments']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Frontend.index');
    }

    public function home()
    {
        return view('home');
    }

    public function comments(Request $request)
    {
       $validData = $request->validate([
           'commentable_id' => 'required',
           'commentable_type' => 'required',
           'parent_id' => 'required',
           'comment' => 'required'

       ]);
      auth()->user()->comments()->create($validData);
      alert()->success('نظر شما با موفقیت ثبت گردید و بعد از تایید نمایش داده خواهد شد.');
      return back();

    }






}







