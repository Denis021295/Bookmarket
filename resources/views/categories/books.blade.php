<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
    

@include('layouts.menu')



<main>
<div class="container mt-5">
  <div class="row mb-2">
    <div class="col-12">
      @if ($books->count() > 0)
      <span class="display-6">Результаты поиска</span>
        @elseif($books->count() == 0)
        <span class="display-6"> Ничего не найдено... <i class="bi bi-emoji-frown"></i> </span>
      @endif
    </div>
  </div>
  <div class="row">

    <!-- start 8 -->
    <div class="col-6">

    @foreach($books as $book)
		<ol class="list-group">
		  <li class="list-group-item d-flex justify-content-between align-items-start mb-1">
		    <div class="ms-2 me-auto">
		      <div class="fw-bold"> 
		      	<a href="{{ route('view.book', ['id' => $book->id]) }}"> {{ $book->title }} </a>
		      </div>
		      {{ $book->authors->name }}
		    </div>
		    <span class="badge bg-primary rounded-pill"> {{ $book->genres->name }} </span>
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
