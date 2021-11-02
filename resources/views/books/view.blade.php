<!doctype html>
<html lang="en">
@include('layouts.head')
<link rel="stylesheet" href="../../public/font/bootstrap-icons.css">
<body>
    

@include('layouts.menu')



<main>
<div class="container mt-5">
  <div class="row mb-2">
    <div class="col-12 display-6 mb-2"> {{ $book->title }} </div>
  </div>
  <div class="row">

    <!-- start 8 -->
    <div class="col-lg-6">
      <img width="100%" src="../{{ $book->getImage() }}">
    </div>
    <!-- end 8 -->

    <!-- start 4 -->
    <div class="col-lg-6">


      <table class="table mb-5">
        <tbody>
          <tr>
            <th scope="row">Автор</th>
            <td> 
              <a 
                href="{{ route('author.book', ['author' => Str::slug($book->authors->name)]) }}"
                class="text-decoration-none text-success"
              > 
                {{ $book->authors->name }} 
              </a> 
            </td>
          </tr>
          <tr>
            <th scope="row">Жанр</th>
            <td> 
              <a 
                href="{{ route('genre.book', ['name' => Str::slug($book->genres->name)]) }}"
                class="text-decoration-none text-success"
              > 
                {{ $book->genres->name }} 
              </a> 
            </td>
          </tr>
          <tr>
            <th scope="row">Издательство</th>
            <td> 
              <a 
                href="{{ route('publisher.book', ['name' => Str::slug($book->publishers->name)]) }}"
                class="text-decoration-none text-success"
              > 
                {{ $book->publishers->name }} 
              </a> 
            </td>
          </tr>
          <tr>
            <th scope="row">Год издания</th>
            <td> {{ $book->year_pub }} </td>
          </tr>
          <tr>
            <th scope="row">Количество страниц</th>
            <td> {{ $book->pages }} </td>
          </tr>
          <tr>
            <th scope="row">Язык</th>
            <td> {{ $book->languages->name }} </td>
          </tr>
          <tr>
            <th scope="row">Код</th>
            <td> {{ $book->code }} </td>
          </tr>
          <tr>
            <th scope="row">Рейтинг</th>
            <td> 
              {{ $book->ratings ? round($book->ratings->rating, 2) : "-" }}
              @if ($book->ratings)
                <small>({{round((($book->ratings->rating*100)/5), 1)}}%)</small>
              @endif
            </td>
          </tr>
        </tbody>
      </table>



    @auth
    <div class="mb-3 mt-0">
      <form action="{{ route('rating.book', ['book' => $book->id]) }}" method="POST">
        @csrf
        Рейтинг
        <select name="rating">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <button type="submit" class="btn btn-primary btn-sm">оценить</button>
      </form>
    </div>
    @endauth


      <div class="text-center mb-5"> 
        <div class="display-6"> 

          @auth
            @if (auth()->user()->hasBonus())
              <s>{{ $book->price }}</s>
              {{ 
                ($book->price - auth()->user()->hasBonus()) > 0
                ?
                $book->price - auth()->user()->hasBonus().' ₴'
                :
                'Бесплатно'
              }}
            @else
              {{ $book->price }} ₴
            @endif
          @endauth

          @guest
            {{ $book->price }} ₴
          @endguest

        </div>
        <div class="mt-0 display-6">

            @auth
              <div class="mt-1 mb-2">
                @if (Gate::allows('book-in-list', $book))
                  <i class="bi bi-bookmark-check"></i>
                  Книга в списке желаний
                @else
                  <i class="bi bi-bookmark-plus"></i>
                  <a 
                    href="{{ route('book.wishlist', ['book' => $book->id]) }}"
                    class="text-decoration-none text-dark"
                  >
                    Добавить в список желаний
                  </a>
                @endif
              </div>

              @if (Gate::allows('book-in-basket', $book->clients))
                <i class="bi bi-bag-check"></i>
                Книга добавлена
              @else
                <i class="bi bi-bag-plus"></i>
                <a 
                  href="{{ route('shop.book', ['id' => $book->id]) }}"
                  class="text-decoration-none"
                > 
                Добавить в корзину 
              </a>
              @endif
            @endauth
        </div>
            @guest
              <small>(только зарегистрированные пользователи могут совершать покупки)</small>
            @endguest
      </div>


      <div style="white-space: pre-line; text-align: justify;">
        {{ $book->description }}
      </div>




      <div class="mt-5">
        <div class="mb-3">
          <span class="badge bg-warning text-dark"> 
            <i class="bi bi-chat"></i>
            Комментарии
            <span class="badge bg-primary">{{ $book->comments->count() }}</span>
          </span> 
        </div>
        @if ($book->comments->count() > 0)
          @foreach($book->comments as $comment)
              <div class="card mb-2" style="max-width: 540px;">
                <div class="row g-0">
                  <div class="col-md-4">
                    <img  
                      src="{{ $comment->clients->getImage() }}" 
                      class="img-fluid rounded-start" 
                      alt="..."
                      style="border-radius: 900px; height: 200px;"
                    >
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"> 
                        <a 
                          href="{{ route('profile.user', ['client' => $comment->clients->email]) }}"
                          class="text-decoration-none text-dark"
                        > 
                            {{ $comment->clients->login ?? $comment->clients->email }} 
                        </a>
                      </h5>
                      <p class="card-text">
                        {!! $comment->text !!}
                      </p>
                      @if (Gate::allows('delete-this-comment', $comment))
                        <div class="mb-3">
                          <form action="{{ route('delete.comment', ['id' => $comment->id]) }}" method="POST">
                            @csrf
                            <button 
                              type="submit" 
                              class="btn btn-primary"
                              name="id"
                              value="{{ $comment->id }}"
                            >
                              <i class="bi bi-basket"></i>
                              Удалить
                            </button>
                          </form>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
          @endforeach()
        @endif
      </div>


@auth
<div class="mt-5">
  <form method="POST" action="{{ route('new.comment', ['id' => $book->id]) }}">
    @csrf
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Добавьте комментарий</label>
      <textarea 
        class="form-control" 
        id="exampleFormControlTextarea1" 
        rows="3"
        name="text"
        value="{{ old('text') }}"
        required
      ></textarea>
      <input type="hidden" name="book_id" value={{ $book->id }}>
      <input type="hidden" name="client_id" value={{ Auth::user()->id }}>
      <button type="submit" class="btn btn-outline-success mt-2">Добавить</button>
    </div>
  </form>
</div>
@endauth


    </div>
    <!-- end 4 -->

  </div>
</div>
</main>


@include('layouts.footer')

      
</body>
</html>
