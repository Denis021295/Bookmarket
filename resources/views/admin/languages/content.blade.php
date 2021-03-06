@extends('admin.layouts.layout')
<link rel="stylesheet" href="../../public/font/bootstrap-icons.css">


@section('sidebar')
  @include('admin.layouts.sidebar')
@endsection('sidebar')



@section('content')
  <div class="mb-3 mt-3 h4" role="alert">
    <a href="{{ route('languages.create') }}" class="text-decoration-none">
      <i class="bi bi-plus-circle-fill"></i>
      Добавить язык
    </a>
  </div>


  <table class="table">
  <tbody>
    @foreach($languages as $language)
      <tr>
        <th scope="row"> {{ $language->id }} </th>
        <td> {{ $language->name }} </td>
        <td>
          <a href="{{ route('languages.edit', ['language' => $language->id]) }}">
            <i class="bi bi-pencil"></i>   
          </a>
        </td>
        <td>

          <form 
            action="{{ route('languages.destroy', ['language' => $language->id]) }}" 
            method="POST"
            class="mb-0 mt-0"
          >
            @csrf
            @method("DELETE")
            <button 
              type="submit" 
              class="btn btn-secondary"
              name="id"
              value="{{ $language->id }}"
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