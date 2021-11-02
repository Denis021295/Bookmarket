@extends('empties.pattern')

@php
	use Carbon\Carbon;
@endphp


<link rel="stylesheet" href="../../../public/font/bootstrap-icons.css">
@section('title', 'Профиль | '.$client->email)


@section('menu')
	@include('layouts.menu')
@endsection


@section('content')
<div class="container mt-5">
	<div class="row">

		<!-- 3 -->
		<div class="col-lg-3">
			@include('profile.menu')
		</div>
		<!-- end 3 -->

		<!-- 9 -->
		<div class="col-lg-8">
			<div class="alert alert-secondary" role="alert">
				На Вашем бонусном счету <b>{{ $bns }}₴</b>
			</div>
			@foreach($books as $book)
				<div class="card mb-3" style="max-width: 100%;">
				  <div class="row g-0">
				    <div class="col-md-4">
				      <img src="../../{{ $book->poster }}" class="img-fluid rounded-start" alt="...">
				    </div>
				    <div class="col-md-8">
				      <div class="card-body">
				        <h5 class="card-title"> {{ $book->authors->name }} - {{ $book->title }} </h5>
				        <p class="card-text"> {{ mb_strimwidth($book->description, 0, 200, "...") }} </p>
				        <p class="card-text h4 text-center">
				        	<s>{{ $book->price }}₴</s>
				        	{{ 
				        		(($book->price - $bns) > 0) 
				        		? 
				        		($book->price - $bns).'₴' 
				        		: 
				        		'Бесплатно' 
				        	}}
				        </p>
				      </div>
				    </div>
				  </div>
				</div>
			@endforeach
		</div>
		<!-- end 9 -->

	</div>
</div>
@endsection



@section('footer')
	@include('layouts.footer')
@endsection