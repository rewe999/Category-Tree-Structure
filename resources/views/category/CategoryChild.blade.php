<ul>
    @foreach($childs as $child)
        <li>
            <a href="{{route('get.category',$child->id)}}">{{ $child->title }}</a>
            @if(count($child->childs))
                @include('category.CategoryChild',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
