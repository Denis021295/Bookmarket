@extends('empties.pattern')

@php
	use Carbon\Carbon;
@endphp


<link rel="stylesheet" href="../../../public/font/bootstrap-icons.css">
@section('title', 'Список желаний')


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
			@foreach($books as $book)
				<div class="card mb-3" style="max-width: 100%;">
				  <div class="row g-0">
				    <div class="col-md-4">
				      <img src="../../{{ $book->books->poster }}" class="img-fluid rounded-start" alt="...">
				    </div>
				    <div class="col-md-8">
				      <div class="card-body">
				        <h5 class="card-title"> 
				        	<a 
				        		href="{{ route('view.book', ['id' => $book->books->id]) }}"
				        		class="text-decoration-none text-dark"
				        	>
				        		{{ $book->books->authors->name }} - {{ $book->books->title }}
				        	</a>
				        </h5>
				        <p class="card-text"> {{ mb_strimwidth($book->books->description, 0, 300, "...") }} </p>
				        <p>
				        	<form 
				        		action="{{ route('wishlist.del', ['id' => $book->id]) }}" 
				        		method="POST"
				        	>
				        		@csrf
				        		<button 
				        			type="submit" 
				        			class="btn btn-primary"
				        			name="id"
				        			value="{{ $book->id }}"
				        		>
				        			Убрать из списка
				        		</button>
				        	</form>
				        </p>
				      </div>
				    </div>
				  </div>
				</div>
			@endforeach

<div 
  class="col-md-12"
  style="margin: 0 auto; width: 6rem;"
> 
  @if ($books instanceof Illuminate\Pagination\LengthAwarePaginator)
    {{ $books->links() }}
  @endif
</div>

		</div>
		<!-- end 9 -->

	</div>
</div>
@endsection



@section('footer')
	@include('layouts.footer')
@endsection