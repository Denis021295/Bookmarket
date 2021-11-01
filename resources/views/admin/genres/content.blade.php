@extends('admin.layouts.layout')
<link rel="stylesheet" href="../../public/font/bootstrap-icons.css">


@section('sidebar')
  @include('admin.layouts.sidebar')
@endsection('sidebar')



@section('content')
  <div class="mb-3 mt-3 h4" role="alert">
    <a href="{{ route('genres.create') }}" class="text-decoration-none">
      <i class="bi bi-plus-circle-fill"></i>
      Добавить жанр
    </a>
  </div>


  <table class="table">
  <tbody>
    @foreach($genres as $genre)
      <tr>
        <th scope="row"> {{ $genre->id }} </th>
        <td> {{ $genre->name }} </td>
        <td>
          <a href="{{ route('genres.edit', ['genre' => $genre->id]) }}">
            <i class="bi bi-pencil"></i>   
          </a>
        </td>
        <td>

          <form 
            action="{{ route('genres.destroy', ['genre' => $genre->id]) }}" 
            method="POST"
            class="mb-0 mt-0"
          >
            @csrf
            @method("DELETE")
            <button 
              type="submit" 
              class="btn btn-secondary"
              name="id"
              value="{{ $genre->id }}"
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