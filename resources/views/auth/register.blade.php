<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="image/favicon.png" rel="icon" />
    <title>فروشگاه مارکت شاپ</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/js/bootstrap/css/bootstrap-rtl.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/stylesheet.css" />
    <link rel="stylesheet" type="text/css" href="/css/stylesheet-rtl.css" />

@yield('css')
<!-- CSS Part End-->
</head>
<body>

<style>
    .font-sz {
        font-size: 18px !important;
    }
</style>

<div style="background-color: #fdfdfd;padding: 10px;">
    <ul class="breadcrumb container" >
        <li><a href="{{ route('index') }}"><i class="fa fa-home font-sz"></i></a></li>
        <li><a href="{{ route('login') }}" class="font-sz">ورود</a></li>
        <li class="font-sz">ثبت نام</li>
    </ul>
</div>
<div id="container">
    <div class="container" id="app">
    <!-- Breadcrumb Start--> 
            <!-- Breadcrumb End-->
            <div class="row col-md-8 col-md-offset-2 regstyle">
                <!--Middle Part Start-->
                <div id="content">
                    <h1 class="title">ثبت نام حساب کاربری</h1>
                    <p>اگر قبلا حساب کاربریتان را ایجاد کرد اید جهت ورود به <a href="{{ route('login') }}">صفحه لاگین</a> مراجعه کنید.</p>
                    <form class="form-horizontal" action="{{ route('register') }}" method="post">
                        @csrf
                        <fieldset id="account">
                            <legend>اطلاعات شخصی شما</legend>

                            <div class="form-group required">
                                <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"  id="input-firstname"  placeholder="نام" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="alert alert-danger" style="margin-top: 10px">
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="input-lastname" placeholder="نام خانوادگی" name="lastname" value="{{ old('lastname') }}" required>
                                    @error('lastname')
                                    <div class="alert alert-danger" style="margin-top: 10px">
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="input-email" placeholder="آدرس ایمیل" value="{{ old('email') }}"  name="email" required>
                                    @error('email')
                                    <div class="alert alert-danger" style="margin-top: 10px">
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-telephone" class="col-sm-2 control-label">شماره موبایل</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="input-telephone" placeholder="شماره موبایل" value="{{ old('phone') }}" name="phone" required>
                                    @error('phone')
                                    <div class="alert alert-danger" style="margin-top: 10px">
                                         <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                    </div>
                                    @enderror
                                </div>
                            </div>      
                            <div class="form-group required">
                                 <label for="input-company" class="col-sm-2 control-label">جنسیت</label>
                                 <div class="col-sm-10" style="line-height: 37px">
                                     <input type="radio"  id="male" name="gender" value="male">
                                    <label for="male" class="ml-5">مرد</label> 
                                   <input type="radio" id="female" name="gender" value="female">
                                   <label for="female" class="">زن</label>  
                                 @error('gender')
                                     <div class="alert alert-danger col-sm-12 pull-left">
                                         <span role="alert">{{ $message}}</span>
                                     </div>
                                 @enderror
                                 </div>                             
                         </div>
                        </fieldset>
                              
                        <fieldset id="address">
                    
                            <div class="form-group required">
                                <label for="input-address" class="col-sm-2 control-label">آدرس</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="input-address" placeholder="آدرس" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                    <div class="alert alert-danger mt-4">
                                        <span role="alert">
                                          <strong>{{ $message }}</strong>
                                    </span>
                                    </div>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group required">
                                <label for="input-national" class="col-sm-2 control-label">کد ملی</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('nationalCode') is-invalid @enderror" id="input-national" placeholder="کد ملی" name="nationalCode" value="{{ old('nationalCode') }}">
                                    @error('nationalCode')
                                    <div class="alert alert-danger" style="margin-top: 10px">
                                          <span role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                           
                           
                            <select-city-component :login="0" :provinces="{{ $provinces }}"></select-city-component>  
                           @error('province_id')
                                <div class="alert alert-danger col-sm-10 pull-left">
                                    <span role="alert">{{ $message }}</span>
                                </div>
                            @enderror
                            <br>
                            @error('city_id')
                                <div class="alert alert-danger col-sm-10 pull-left">
                                    <span role="alert">{{ $message }}</span>
                                </div>
                            @enderror
                        </fieldset>
                        <fieldset>
                            <legend>رمز عبور شما</legend>
                            <div class="form-group required">
                                <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password" placeholder="رمز عبور" name="password" required>
                                    @error('password')
                                    <div class="alert alert-danger" style="margin-top: 10px">
                                       <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                       </span>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input-confirm" placeholder="تکرار رمز عبور" name="password_confirmation" required>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group buttons">
                                <input type="checkbox" value="1" name="agree" required>
                                &nbsp;من <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق هستم</a> &nbsp;
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-left">ثبت نام</button>
                        </div>

                    </form>
                </div>
                <!--Middle Part End -->
            </div>

    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
