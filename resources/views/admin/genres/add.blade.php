@extends('admin.layouts.layout')
<link rel="stylesheet" href="../../public/font/bootstrap-icons.css">


@section('sidebar')
  @include('admin.layouts.sidebar')
@endsection('sidebar')


@section('content')
<form action="{{ route('genres.store') }}" method="POST">
  @csrf
  <div class="mb-3 mt-3">
    <label 
      for="exampleFormControlInput1" 
      class="form-label"
    >
      Жанр
    </label>
    <input 
      type="text"
      name="name"
      class="form-control" 
      id="exampleFormControlInput1"
      value="{{ old('name') }}" 
      placeholder="Жанр"
      required 
    >
    <button 
      type="submit" 
      class="btn btn-success mt-2"
    >
      Добавить
    </button>
  </div>
</form>



<div class="mt-5">
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

@endsection('content')