<div class="slideshow single-slider owl-carousel">
    @foreach (\App\Models\Slider::all() as $slider)     
    <div class="item"> <a href="#"><img class="img-responsive" src="{{ $slider->image }}" alt="{{ $slider->heading }}" height="420px !important" /></a> </div>
    @endforeach
</div>
