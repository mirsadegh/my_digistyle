@component('admin.content',['title' => 'ایجاد کاربر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/"> پنل مدیریت</a></li>
        <li class="breadcrumb-item active">ایجاد کاربر</li>
    @endslot
       
            <div id="content" class="admin_create_user col-sm-8 offset-md-2">
                @include('admin.layouts.errors')
                <form class="form-horizontal" action="{{ route('admin.users.store') }}" method="post">
                    @csrf
                    <fieldset id="account">
                        <legend>اطلاعات شخصی </legend>
                        <div class="form-group">
                            <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  id="input-firstname"  placeholder="نام" name="name" value="{{ old('name') }}">
                              
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-lastname" class="col-sm-2 control-label">نام خانوادگی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-lastname" placeholder="نام خانوادگی" name="lastname" value="{{ old('lastname') }}">
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="input-email" placeholder="آدرس ایمیل" value="{{ old('email') }}"  name="email" >
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-telephone" class="col-sm-2 control-label">شماره موبایل</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="input-telephone" placeholder="شماره تلفن" value="{{ old('phone') }}" name="phone" >
        
                            </div>
                        </div>
                    </fieldset>
                    <fieldset id="address"> 
                             <div class="form-group"> 
                                <label for="input-company" class="col-sm-2 control-label">جنسیت</label>
                                <div class="mr-5">
                                    <input type="radio"  id="male" name="gender" checked value="male">
                                <label for="male" class="col-sm-2">مرد</label>
                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female" class="col-sm-2">زن</label> 
                                </div>
                               
                             </div>
                        <div class="form-group">
                          
                            <div id="app" class="mb-4 mr-2">
                                <select-city-component :provinces="{{ $provinces }}" :login="1"></select-city-component>  
                             </div>
                             <label for="input-address" class="col-sm-2 control-label">آدرس</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-address" placeholder="آدرس" name="address" value="{{ old('address') }}">
 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-national" class="col-sm-2 control-label">کد ملی</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input-national" placeholder="کد ملی" name="nationalCode" value="{{ old('nationalCode') }}">
                            </div>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>رتبه کاربر</legend>
                        <hr>
                         <div class="form-group">

                             <input type="radio"  id="normal-role" name="user_role" checked value="0">
                             <label for="normal-role" class="col-sm-2">کاربر معمولی</label>

                             <input type="radio" id="stuff-role" name="user_role" value="1">
                             <label for="stuff-role" class="col-sm-2">کاربر کارمند</label>

                             <input type="radio" id="admin-role" name="user_role" value="2">
                             <label for="admin-role" class="col-sm-2">کاربر مدیر</label>
                         </div>

                    </fieldset>
                    <fieldset>
                        <legend>رمز عبور شما</legend>
                        <div class="form-group">
                            <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="input-password" placeholder="رمز عبور" name="password" >
                            
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="input-confirm" placeholder="تکرار رمز عبور" name="password_confirmation" >
                            </div>
                        </div>
                    </fieldset>
                    <filedset>
                        <div class="form-check">
                            <input type="checkbox" name="verify" class="form-check-input" id="verify">
                            <label for="verify">اکانت فعال باشد.</label>
                        </div>
                    </filedset>

                        <div class="form-group" style="margin-right: 33.5rem !important;">
                           <input type="hidden" name="agree" value="1">
                           <button type="submit" class="btn btn-success">ایجادکاربر</button>
  
                        </div>
                       
                </form>

            </div>
            <!--Middle Part End -->
      
    @slot('script')
        <script src="{{ asset('/js/app.js') }}"></script>
    @endslot

@endcomponent




