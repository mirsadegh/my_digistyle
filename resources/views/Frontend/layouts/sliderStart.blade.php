<div class="category-module" id="latest_category">
    <h3 class="subtitle">مد و زیبایی - <a class="viewall" href="category.tpl">نمایش همه</a></h3>
    {{-- <div class="category-module-content">

        @php
            $categories = App\Models\Category::where('parent_id',null)->get();
        @endphp
        <ul id="sub-cat" class="tabs">

            @foreach ($categories as $category)
            <li><a href="#tab-cat-{{ $loop->iteration }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
        @php
             $categories = App\Models\Category::all();

        @endphp

         @foreach ($categories as $category)

            @php
              $cat_childs = $category->childs ;
            @endphp

                   <div id="tab-cat-{{ $loop->iteration }}" class="tab_content">
                        <div class="owl-carousel latest_category_tabs">

                            @foreach (as $cat_product)

                                <div class="product-thumb">
                                        <div class="image">
                                            <a href="product.html">
                                              <img src="{{ $cat_product->image }}" alt="{{ $cat_product->name }}" title="{{ $cat_product->name }}" class="img-responsive" />
                                           </a>
                                        </div>
                                        <div class="caption">
                                            <h4><a href="product.html">{{ $cat_product->name }}</a></h4>
                                            <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                            <div class="rating">
                                                <span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                </span>
                                                <span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                </span>
                                                <span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                </span>
                                                <span class="fa fa-stack">
                                                    <i class="fa fa-star fa-stack-2x"></i>
                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                </span>
                                                <span class="fa fa-stack">
                                                    <i class="fa fa-star-o fa-stack-2x"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="button-group">
                                            <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                                            <div class="add-to-links">
                                                <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                                <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>
                     </div>

         @endforeach

    </div> --}}
</div>
