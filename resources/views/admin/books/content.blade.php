@extends('admin.layouts.layout')
<link rel="stylesheet" href="../../public/font/bootstrap-icons.css">


@section('sidebar')
  @include('admin.layouts.sidebar')
@endsection('sidebar')


@section('content')
  <div class="mb-3 mt-3 h4" role="alert">
    <a href="{{ route('books.create') }}" class="text-decoration-none">
      <i class="bi bi-plus-circle-fill"></i>
      Добавить книгу
    </a>
  </div>

  <table class="table">
  <tbody>
    @foreach($books as $book)
      <tr>
        <th scope="row"> {{ $book->id }} </th>
        <td> 
          {{ $book->authors->name }} - {{ $book->title }} 
          <small>({{$book->genres->name}})</small>
        </td>
        <td>
          <a href="{{ route('books.edit', ['book' => $book->id]) }}">
            <i class="bi bi-pencil"></i>   
          </a>
        </td>
        <td>
          <a href="{{ route('books.destroy', ['book' => $book->id]) }}">
            <i class="bi bi-dash-circle"></i>
          </a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $books->links() }}

@endsection('content')