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

          <form 
            action="{{ route('books.destroy', ['book' => $book->id]) }}" 
            method="POST"
            class="mb-0 mt-0"
          >
            @csrf
            @method("DELETE")
            <button 
              type="submit" 
              class="btn btn-secondary"
              name="book"
              value="{{ $book->id }}"
            >
              <i class="bi bi-dash-circle"></i>
            </button>
          </form>

        </td>
      </tr>
    @endforeach
  </tbody>
</table>

{{ $books->links() }}

@endsection('content')