@extends('Frontend.master')

@section('content')

      <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
          <h1 class="title-404 text-center">404</h1>
          <p class="text-center lead">متاسفیم!<br>
            صفحه ی مورد نظرتان را پیدا نکردیم! </p>
          <div class="buttons text-center"> <a class="btn btn-primary btn-lg" href="{{ route('index') }}">ادامه</a> </div>
        </div>
        <!--Middle Part End -->
      </div>

@endsection
