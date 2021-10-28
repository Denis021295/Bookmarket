@extends('admin.layouts.layout')
<link rel="stylesheet" href="../../public/font/bootstrap-icons.css">


@section('sidebar')
  @include('admin.layouts.sidebar')
@endsection('sidebar')


@section('content')
<form action="{{ route('authors.update', ['author' => $author->id]) }}" method="POST">
  @csrf
  <div class="mb-3 mt-3">
    <label 
      for="exampleFormControlInput1" 
      class="form-label"
    >
      Имя автора
    </label>
    <input 
      type="text"
      name="name"
      class="form-control" 
      id="exampleFormControlInput1"
      value="{{ $author->name }}" 
      placeholder="Имя автора"
      required 
    >
    <input type="hidden" name="id" value="{{ $author->id }}">
    <button 
      type="submit" 
      class="btn btn-success mt-2"
    >
      Обновить
    </button>
  </div>
</form>



<div class="mt-5">
  @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
</div>

@endsection('content')