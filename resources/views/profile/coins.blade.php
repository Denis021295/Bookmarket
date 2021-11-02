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
				У Вас <b>{{ $coin }} BMcoins</b>
			</div>
			<div class="alert alert-warning" role="alert">
				На данный момент расчитаться виртуальной валютой на сайте нельзя... Ждите обновлений
			</div>
		</div>
		<!-- end 9 -->

	</div>
</div>
@endsection



@section('footer')
	@include('layouts.footer')
@endsection