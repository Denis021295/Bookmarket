<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
    

@include('layouts.menu')



<main>
<div class="container mt-5">
  <div class="row mb-2">
    <div class="col-12"> <h1>Жанры</h1> </div>
  </div>
  <div class="row">

    <!-- start 8 -->
    <div class="col-6">

    @foreach($genres as $genre)
		<ol class="list-group">
		  <li class="list-group-item d-flex justify-content-between align-items-start mb-1">
		    <div class="ms-2 me-auto">
		      <div class="fw-bold"> 
		      	<a href="{{ route('genre.book', ['name' => $genre->slug]) }}"> {{ $genre->name }} </a>
		      </div>
		      {{ $genre->slug }}
		    </div>
		    <span class="badge bg-primary rounded-pill"> {{ $genre->books->count() }} </span>
		  </li>
		</ol>
		@endforeach

    </div>
    <!-- end 8 -->

    <!-- start 4 -->
    <div class="col-6">
    </div>
    <!-- end 4 -->

  </div>
</div>
</main>


@include('layouts.footer')

      
</body>
</html>
