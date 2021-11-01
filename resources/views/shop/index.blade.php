<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
    

@include('layouts.menu')



<main>
<div class="container mt-5">
  <div class="row mb-2">
    <div class="col-12"> <h1>Корзина</h1> </div>
  </div>
  <div class="row">


    <!-- start 8 -->
    <div class="col-lg-6">

    	@foreach($books as $book)
		<ol class="list-group">
		  <li class="list-group-item d-flex justify-content-between align-items-start mb-1">
		    <div class="ms-2 me-auto">
		      <div class="fw-bold"> 
		      	<a href="#" class="text-decoration-none"> 
		      		<strong>{{ $book->title }}</strong> 
		      		({{ $book->price }} ₴)
		      	</a>
		      </div>
		      <small> {{ $book->authors->name }} </small>
		    </div>
		    <span class="badge bg-primary rounded-pill"> 1 </span>
		  </li>
		@endforeach
		  <li class="list-group-item d-flex justify-content-between align-items-start mb-1 bg-primary text-light">
		    <div class="ms-2 me-auto">
		      <div class="fw-bold fs-5"> 
		      		<strong>Итого: </strong> 
		      </div>
		    </div>
		    <span class="fs-5"> <strong> {{ $books->sum('price') }} ₴ </strong> </span>
		  </li>
		</ol>

    </div>
    <!-- end 8 -->

    <!-- start 4 -->
    <div class="col-lg-6">
    </div>
    <!-- end 4 -->

  </div>
</div>
</main>


@include('layouts.footer')

      
</body>
</html>
