@foreach($categories as $sub_category)
    <tr class="text-center">
        <td>{{ $sub_category->id }}</td>
        <td>   {{str_repeat('---',$level) }} {{ $sub_category->name }}</td>
        <td>{{ $sub_category->parent($sub_category->parent_id) }}</td>
        <td class="d-flex">
            <a class="btn btn-sm btn-warning" href="{{ route('admin.categories.edit',$sub_category->id) }}">ویرایش</a>
            <div class="display-inline-block mr-3">
                <form method="post" action="{{ route('admin.categories.destroy',$sub_category->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'>حذف</button>
                </form>
            </div>

           
        
             @if($level < 2)
                <a href="{{ route('admin.categories.create') }}?parent_id={{ $sub_category->id }}" class="btn btn-sm btn-primary mr-3">ثبت زیر دسته</a>
             @endif
        </td>
    </tr>
    @if(count($sub_category->childs) > 0)
        @include('admin.layouts.categories-group',['categories' => $sub_category->childs,'level' => $level+1 ])
        
    @endif
@endforeach



