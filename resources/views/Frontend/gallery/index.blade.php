@extends('Frontend.master')


@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">تصاویر / {{ $product->name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">

                    @foreach($galleries as $image)
                        <div class="col-sm-4 border">
                            <a href="{{ url($image->image) }}">
                                <img src="{{ url($image->image) }}" class="img-fluid mb-2" alt="{{ $image->alt }}" width="200">
                            </a>

                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </div>
</div>



@endsection
