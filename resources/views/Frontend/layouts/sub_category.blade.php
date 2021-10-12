@foreach($categories as $sub_cate)
                <li>
                    <div class="dropdown-menu">
                        <a>{{ $sub_cate->name }} <span>&rsaquo;</span></a>
                    </div>
                </li>
@endforeach


