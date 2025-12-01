@if(isset($category_lists))
<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($category_lists as $key => $category)
        <li class="nav-item">
            <a class="nav-link {{ $key == 0 ? 'active' : '' }}" 
               id="tab-{{ $category->id }}" 
               data-toggle="tab" 
               href="#category-{{ $category->id }}" 
               role="tab" 
               aria-controls="category-{{ $category->id }}" 
               aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
               {{ $category->title }}
            </a>
        </li>
    @endforeach
</ul>
@endif
