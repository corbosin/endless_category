
@foreach($categories as $category)
<option value="{{ $category->id }}">{{ $prefix }}{{ $category->name }}</option>
@if($category->childrenCategories)
    @include('child_categories', ['categories' => $category->childrenCategories, 'prefix' => $prefix . ' - '])
@endif
@endforeach