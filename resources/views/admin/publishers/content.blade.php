@extends('admin.layouts.layout')
<link rel="stylesheet" href="../../public/font/bootstrap-icons.css">


@section('sidebar')
  @include('admin.layouts.sidebar')
@endsection('sidebar')



@section('content')
  <div class="mb-3 mt-3 h4" role="alert">
    <a href="{{ route('publishers.create') }}" class="text-decoration-none">
      <i class="bi bi-plus-circle-fill"></i>
      Добавить издательство
    </a>
  </div>


  <table class="table">
  <tbody>
    @foreach($publishers as $publisher)
      <tr>
        <th scope="row"> {{ $publisher->id }} </th>
        <td> {{ $publisher->name }} </td>
        <td>
          <a href="{{ route('publishers.edit', ['publisher' => $publisher->id]) }}">
            <i class="bi bi-pencil"></i>   
          </a>
        </td>
        <td>

          <form 
            action="{{ route('publishers.destroy', ['publisher' => $publisher->id]) }}" 
            method="POST"
            class="mb-0 mt-0"
          >
            @csrf
            @method("DELETE")
            <button 
              type="submit" 
              class="btn btn-secondary"
              name="id"
              value="{{ $publisher->id }}"
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