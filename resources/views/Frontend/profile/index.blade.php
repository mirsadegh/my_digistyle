@extends('Frontend.master')

@section('content')
      <div class="c-profile__wrapper">
          <aside class="col-md-4">
             
             <div class="c-nav-sidebar__content">
                <ul class="c-sidebar-menu">
                    <li class="c-sidebar-menu__item c-sidebar-menu__item--orders">
                        <a class="c-sidebar-menu__link" href="/profile/orders/">سفارشات من</a>
                    </li>
                    <li class="c-sidebar-menu__item c-sidebar-menu__item--next_purchases">
                        <a class="c-sidebar-menu__link" href="/profile/next-purchase/">کالاهای مورد علاقه</a>
                    </li>
                    <li class="c-sidebar-menu__item c-sidebar-menu__item--address">
                        <a class="c-sidebar-menu__link" href="/profile/address/">آدرس‌ها</a>
                    </li>
                    <li class="c-sidebar-menu__item c-sidebar-menu__item--comments">
                        <a class="c-sidebar-menu__link" href="/profile/comments/">نظرات ثبت‌شده</a>
                    </li>
                   
                    <li class="c-sidebar-menu__item c-sidebar-menu__item--additional_info">
                        <a class="c-sidebar-menu__link" href="/profile/additional-info/">اطلاعات حساب</a>
                    </li>
                    <li class="c-sidebar-menu__item c-sidebar-menu__item--change_password">
                        <a class="c-sidebar-menu__link" href="/profile/change-password/">ایجاد رمز ورود</a>
                    </li>
                    <li class="c-sidebar-menu__item c-sidebar-menu__item--logout">
                        <a class="c-sidebar-menu__link" href="/users/logout/">خروج از حساب کاربری</a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="col-md-8">
            <h1 class="c-profile__header">اطلاعات مشتری حقیقی</h1>
            <div class="c-info-table__wrapper">
                <table class="table table-dark">
                  <tbody>
                         <tr class="c-info-table__row">
                            <td class="c-info-table__cell" style="width: 55%">
                                <div class="c-info-table__cell-wrapper">
                                    <span class="c-info-table__cell-label"> نام :</span>
                                    <span class="c-info-table__cell-value ">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="c-info-table__cell" style="width: 55%">
                                <div class="c-info-table__cell-wrapper">
                                    <span class="c-info-table__cell-label"> نام خانوادگی :</span>
                                    <span class="c-info-table__cell-value ">{{ $user->lastname }}</span>
                                </div>
                            </td>
                         </tr>
                         <tr>
                               <td class="c-info-table__cell">
                                <div class="c-info-table__cell-wrapper">
                                    <span class="c-info-table__cell-label">آدرس الکترونیک :</span>
                                    <span class="c-info-table__cell-value ">{{ $user->email }}</span>
                                </div>
                              </td>
                              <td class="c-info-table__cell">
                                <div class="c-info-table__cell-wrapper">
                                    <span class="c-info-table__cell-label">جنسیت :</span>
                                    <span class="c-info-table__cell-value ">
                                        @if ($user->gender == 'male')
                                            {{  'مرد'}}
                                        @elseif($user->gender == 'female')    
                                             {{ 'زن'}}
                                        @endif
                                    </span>
                                </div>
                              </td>
                         </tr>

                         <tr class="c-info-table__row">
                            <td class="c-info-table__cell" style="width: 55%">
                                <div class="c-info-table__cell-wrapper">
                                    <span class="c-info-table__cell-label">کد ملی :</span>
                                    <span class="c-info-table__cell-value ">{{ $user->nationalCode }}</span>
                                </div>
                            </td>
                            <td class="c-info-table__cell" style="width: 55%">
                                <div class="c-info-table__cell-wrapper">
                                    <span class="c-info-table__cell-label">شماره تلفن همراه :</span>
                                    <span class="c-info-table__cell-value  ltr">{{ $user->phone }}</span>
                                </div>
                            </td>
                         </tr>
                          
                            <tr>
                                
                                <td class="c-info-table__cell" colspan="2">
                                    <div class="c-info-table__cell-wrapper">
                                        <span class="c-info-table__cell-label">محل سکونت :</span>
                                        <span class="c-info-table__cell-value ">{{ Illuminate\Support\Str::limit($user->address,100) }}</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="c-profile__action">
                    <a class="c-profile__table-action" href="{{ route('profile.edit',$user->id)}}">ویرایش اطلاعات</a>
                    <a class="c-profile__table-action" href="{{ route('profile.change-password')}}">تغییر رمز ورود</a>
                </p>
            </div>
        </div>
@endsection