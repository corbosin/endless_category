@extends('layouts.app')

@section('content')
<ul>
    @foreach ($categories as $category)
        <li>{{ $category->name }}</li>
        <ul>
        @foreach ($category->childrenCategories as $childCategory)
            @include('child_category', ['child_category' => $childCategory])
        @endforeach
        </ul>
    @endforeach
</ul>

<div class="row">
            <div class="col-1 mb-3">
              <a href="{{ route('categories.create') }}" class="btn btn-block btn-primary">Добавить</a>
            </div>
</div>
@endsection