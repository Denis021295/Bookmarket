@extends('admin.layouts.layout')
<link rel="stylesheet" href="../../public/font/bootstrap-icons.css">


@section('sidebar')
  @include('admin.layouts.sidebar')
@endsection('sidebar')



@section('content')
  <div class="mb-3 mt-3 h4" role="alert">
    <a href="{{ route('authors.create') }}" class="text-decoration-none">
      <i class="bi bi-plus-circle-fill"></i>
      Добавить автора
    </a>
  </div>


  <table class="table">
  <tbody>
    @foreach($authors as $author)
      <tr>
        <th scope="row"> {{ $author->id }} </th>
        <td> {{ $author->name }} </td>
        <td>
          <a href="{{ route('authors.edit', ['author' => $author->id]) }}">
            <i class="bi bi-pencil"></i>   
          </a>
        </td>
        <td>


          <form 
            action="{{ route('authors.destroy', ['author' => $author->id]) }}" 
            method="POST"
            class="mb-0 mt-0"
          >
            @csrf
            @method("DELETE")
            <button 
              type="submit" 
              class="btn btn-secondary"
              name="author"
              value="{{ $author->id }}"
            >
              <i class="bi bi-dash-circle"></i>
            </button>
          </form>


        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection('content')