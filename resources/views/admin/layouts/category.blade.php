@foreach($categories as $sub_cat)
    <option value="{{ $sub_cat->id }}" @if($sub_cat->id == $selected_cat->parent) selected @endif>{{ str_repeat('---',$level) }}{{ $sub_cat->name }}</option>
    @if(count($sub_cat->childs))
      @include('admin.layouts.category',['categories' => $sub_cat->childs,'level' => $level+1,'selected_cat' => $selected_cat])
     @endif
@endforeach
