@extends('admin.layouts.layout')
<link rel="stylesheet" href="../../public/font/bootstrap-icons.css">


@section('sidebar')
  @include('admin.layouts.sidebar')
@endsection('sidebar')


@section('content')


<div class="mt-3 mb-3">
  @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="list-unstyled">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</div>


<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
  @csrf
  <div class="mb-3">
  <label 
    for="exampleFormControlInput1" 
    class="form-label"
  >
    Название
  </label>
  <input
    name="title"
    type="text" 
    class="form-control" 
    id="exampleFormControlInput1"
    value="{{ old('title') }}"
    required
  >
</div>
<div class="mb-3">
  <label 
    for="exampleFormControlTextarea1" 
    class="form-label"
  >
    Описание
  </label>
  <textarea
    name="description"
    class="form-control" 
    id="exampleFormControlTextarea1" 
    rows="3"
    value="{{ old('description') }}"
    required
  ></textarea>


  <label 
    for="authors_area" 
    class="form-label mt-3"
  >
    Автор
  </label>
  <select
    class="form-control"
    id="authors_area" 
    name="author"
  >
    @foreach($authors as $author)
      <option value="{{ $author->id }}"> {{ $author->name }} </option>
    @endforeach
  </select>


  <label 
    for="genre_area" 
    class="form-label mt-3"
  >
    Жанр
  </label>
  <select
    class="form-control"
    id="genre_area" 
    name="genre"
  >
    @foreach($genres as $genre)
      <option value="{{ $genre->id }}"> {{ $genre->name }} </option>
    @endforeach
  </select>



  <label 
    for="publisher_area" 
    class="form-label mt-3"
  >
    Издательство
  </label>
  <select
    class="form-control"
    id="publisher_area" 
    name="publisher"
  >
    @foreach($publishers as $publisher)
      <option value="{{ $publisher->id }}"> {{ $publisher->name }} </option>
    @endforeach
  </select>


    <label 
    for="lang_area" 
    class="form-label mt-3"
  >
    Язык
  </label>
  <select
    class="form-control"
    id="lang_area" 
    name="language"
  >
    @foreach($languages as $language)
      <option value="{{ $language->id }}"> {{ $language->name }} </option>
    @endforeach
  </select>




  <label 
    for="code_input" 
    class="form-label mt-3"
  >
    Код товара
  </label>
  <input
    name="code"
    type="number" 
    class="form-control" 
    id="code_input"
    value="{{ old('code') }}"
    required
  >


  <label 
    for="year_input" 
    class="form-label mt-3"
  >
    Год публикации
  </label>
  <input
    name="year_pub"
    type="number" 
    class="form-control" 
    id="year_input"
    value="{{ old('year_pub') }}"
    required
  >


  <label 
    for="price_input" 
    class="form-label mt-3"
  >
    Цена
  </label>
  <input
    name="price"
    type="number" 
    class="form-control" 
    id="price_input"
    value="{{ old('price') }}"
    required
  >


  <label 
    for="pages_input" 
    class="form-label mt-3"
  >
    Кол-во страниц
  </label>
  <input
    name="pages"
    type="number" 
    class="form-control" 
    id="pages_input"
    value="{{ old('pages') }}"
    required
  >


  <div class="mt-3">
    <label 
      for="formFile" 
      class="form-label"
    >
      Изображение
    </label>
    <input 
      class="form-control" 
      type="file" 
      id="formFile" 
      name="poster" 
      required
    >
  </div>

  <div class="mt-3">
    <button type="submit" class="btn btn-primary">Добавить</button>
  </div>


</div>
</form>

@endsection('content')