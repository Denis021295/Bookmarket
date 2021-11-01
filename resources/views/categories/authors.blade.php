<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
    

@include('layouts.menu')



<main>
<div class="container mt-5">
  <div class="row mb-2">
    <div class="col-12"> <h1>Авторы</h1> </div>
  </div>
  <div class="row">

    <!-- start 8 -->
    <div class="col-lg-6">

    	@foreach($authors as $author)
		<ol class="list-group">
		  <li class="list-group-item d-flex justify-content-between align-items-start mb-1">
		    <div class="ms-2 me-auto">
		      <div class="fw-bold"> 
		      	<a href="{{ route('author.book', ['author' => $author->slug]) }}"> {{ $author->name }} </a>
		      </div>
		      {{ $author->slug }}
		    </div>
		    <span class="badge bg-primary rounded-pill"> {{ $author->books->count() }} </span>
		  </li>
		</ol>
		@endforeach

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
