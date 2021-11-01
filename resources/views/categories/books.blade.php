<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
    

@include('layouts.menu')



<main>
<div class="container mt-3">
  <div class="row mb-3">
    <div class="col-12">
      @if( $res->books->count() || $res->authors->count() || $res->genres->count() || $res->publishers->count() )
      <span class="display-6">Результаты поиска</span>
        @else
        <span class="display-6"> Ничего не найдено... <i class="bi bi-emoji-frown"></i> </span>
      @endif
    </div>
  </div>
  <div class="row">

    <!-- start 8 -->
    <div class="col-6">


      @if($res->books->count())
        <ol class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-start mb-1 bg-primary text-light">
            <div class="ms-2 me-auto">
              <div class="fw-bold fs-5"> 
                <strong>Книги </strong> 
              </div>
            </div>
            <span class="fs-5"> 
              <span class="badge bg-warning text-dark">{{ $res->books->count() }}</span> 
            </span>
          </li>
          @foreach($res->books as $book)
            <li class="list-group-item d-flex justify-content-between align-items-start mb-1">
              <div class="ms-2 me-auto">
                <div class="fw-bold"> 
                  <a href="{{ route('view.book', ['id' => $book->id]) }}"> {{ $book->title }} </a>
                </div>
                {{ $book->authors->name }}
              </div>
              <span class="badge bg-primary rounded-pill"> {{ $book->genres->name }} </span>
            </li>
          @endforeach
        </ol>
      @endif

      @if($res->authors->count())
        <ol class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-start mb-1 bg-primary text-light">
            <div class="ms-2 me-auto">
              <div class="fw-bold fs-5"> 
                <strong>Авторы</strong> 
              </div>
            </div>
            <span class="fs-5"> 
              <span class="badge bg-warning text-dark">{{ $res->authors->count() }}</span> 
            </span>
          </li>
          @foreach($res->authors as $author)
            <li class="list-group-item d-flex justify-content-between align-items-start mb-1">
              <div class="ms-2 me-auto">
                <div class="fw-bold"> 
                  <a href="{{ route('author.book', ['author' => $author->slug]) }}"> {{ $author->name }} </a>
                </div>
                {{ $author->slug }}
              </div>
            </li>
          @endforeach
        </ol>
      @endif

      @if($res->genres->count())
        <ol class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-start mb-1 bg-primary text-light">
            <div class="ms-2 me-auto">
              <div class="fw-bold fs-5"> 
                <strong>Жанры</strong> 
              </div>
            </div>
            <span class="fs-5"> 
              <span class="badge bg-warning text-dark">{{ $res->genres->count() }}</span> 
            </span>
          </li>
          @foreach($res->genres as $genre)
            <li class="list-group-item d-flex justify-content-between align-items-start mb-1">
              <div class="ms-2 me-auto">
                <div class="fw-bold"> 
                  <a href="{{ route('genre.book', ['name' => $genre->slug]) }}"> {{ $genre->name }} </a>
                </div>
                {{ $genre->slug }}
              </div>
            </li>
          @endforeach
        </ol>
      @endif

      @if($res->publishers->count())
        <ol class="list-group">
          <li class="list-group-item d-flex justify-content-between align-items-start mb-1 bg-primary text-light">
            <div class="ms-2 me-auto">
              <div class="fw-bold fs-5"> 
                <strong>Издательства</strong> 
              </div>
            </div>
            <span class="fs-5"> 
              <span class="badge bg-warning text-dark">{{ $res->publishers->count() }}</span> 
            </span>
          </li>
          @foreach($res->publishers as $publisher)
            <li class="list-group-item d-flex justify-content-between align-items-start mb-1">
              <div class="ms-2 me-auto">
                <div class="fw-bold"> 
                  <a href="{{ route('publisher.book', ['name' => $publisher->slug]) }}"> {{ $publisher->name }} </a>
                </div>
                {{ $publisher->slug }}
              </div>
            </li>
          @endforeach
        </ol>
      @endif


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
