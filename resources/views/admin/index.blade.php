@extends('admin.layouts.layout')


@section('sidebar')
  @include('admin.layouts.sidebar')
@endsection('sidebar')



@section('content')
	<div id="carouselExampleSlidesOnly" class="carousel slide mt-3" data-bs-ride="carousel">
		<div class="carousel-inner">
			@foreach($posters as $poster)
				<div class="carousel-item @if ($poster->id == $posters->min('id')) active @endif">
					<img src="{{ $poster->poster }}" class="d-block w-50" alt="{{ $poster->title }}">
				</div>
			@endforeach
		</div>
	</div>
@endsection('content')