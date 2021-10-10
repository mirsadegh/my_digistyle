@extends('Frontend.master')

@section('content')
  
   
       <div class="login-box col-sm-4 col-sm-offset-4">
           @include('admin.layouts.errors')
        <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="#" class="h1"> ایجاد رمز عبور</a>
        </div>
        <div class="card-body">
       
            <form action="" method="post">
                @csrf
            <div class="m-5 d-flex">
                <input type="password" class="col-sm-10 input-pass" name="password" placeholder="رمز عبور">
              
                <div class="icon_lock">
                    <span class="fa  fa-lock"></span>
                </div>
               
            </div>
            <div class="m-5 d-flex">
                <input type="password" class="col-sm-10 input-pass"  name="password_confirmation"  placeholder="تکرار رمز عبور جدید">
                <div class="icon_lock">
                    <span class="fa  fa-lock"></span>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 my-5">
                <button type="submit" class="btn btn-primary btn-block">تغییر رمز عبور</button>
                </div>
                <!-- /.col -->
            </div>
            </form>
    
        </div>
        <!-- /.login-card-body -->
    </div>
    
   
    


@endsection