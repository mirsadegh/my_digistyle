<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

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
         $products = Product::orderBy('created_at','desc')->get();
        return view('Frontend.index',compact('products'));
    }


    public function home()
    {
        return view('home');
    }


    public function notFound()
    {
        return view('errors.404');
    }

    public function about()
    {
        return view('Frontend.home.about-us');
    }

    public function contact()
    {
        return view('Frontend.home.contact-us');
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

    public function search()
    {
        $products = Product::query();
        if ($keyword = \request('search')) {
            $products->where('name','LIKE',"%{$keyword}%")->orWhere('description','LIKE',"%{$keyword}%")->get();

        }

        $products = $products->latest()->paginate(12);
        return view('Frontend.home.products',compact('products'));
    }






}







