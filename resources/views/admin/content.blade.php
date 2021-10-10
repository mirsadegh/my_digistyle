@extends('admin.master')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        {{ $breadcrumb }}
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
           {{ $slot }}
    </div>
@endsection
@section('script')
    {{ $script ?? '' }}
@endsection
@section('head')
    {{ $head ?? '' }}
@endsection
