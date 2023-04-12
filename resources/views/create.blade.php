@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление категории</h1>
          </div>
          
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            
            <form action="{{ route('categories.store') }}" method="POST" class="wl-25">
              @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Название категории">
              </div>
               

              <input type="submit" class="btn btn-primary" value="Создать категорию-подкатегорию">

    <div class="form-group">
        <label for="parent_id">Родительская категория</label>


    <select class="form-control" id="parent_id" name="parent_id">
    <option value=""></option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">
            {{ $category->name }}
            @if($category->ancestors && count($category->ancestors) > 0)

                &raquo; {{ implode(' &raquo; ', $category->ancestors->pluck('name')->toArray()) }}
            @endif
        </option>
        @include('child_categories', ['categories' => $category->childrenCategories, 'prefix' => ' - '])
    @endforeach
</select>


    </div>  

            </form>
            
            </div>
          </div>


          
      </div><!-- /.container-fluid -->
    </  section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection