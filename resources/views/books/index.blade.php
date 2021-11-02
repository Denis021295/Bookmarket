<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
    

@include('layouts.menu')


<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <span>
          @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif
        </span>
        <h1 class="fw-light">BookMarket</h1>
        <p class="lead text-muted">Находите, покупайте, читайте что Вам по душе</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    

    <div class="text-center mb-3 mt-0">
      <form 
        action="{{ route('sort.book') }}"
        method="POST"
      >
        @csrf
        <span class="h5 m-0"> 
          Сортировать по 
        </span>
        <select 
          name="sort" 
          class="form-control text-center w-auto mt-2 mb-2 cursor-pointer" 
          style="margin: 0 auto;"
        >
          <option value="rating">рейтингу</option>
          <option value="title">названию</option>
          <option value="id">дате</option>
          <option value="price">цене</option>
          <option value="year_pub">году публикации</option>
          <option value="pages">кол-ву страниц</option>
          <option value="code">коду</option>
        </select>
        <button type="submit" class="btn btn-primary btn-sm">сейчас</button>
      </form>
      @if(session()->has('sort'))
        <div class="alert alert-light p-2 mt-3 h5" role="alert">
          <i class="bi bi-sort-up"></i> 
          Сортировка | <b>{{ Str::upper(session('sort')) }}</b>
        </div>
      @endif
    </div>


    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">        

		@foreach($books as $book)
        <div class="col">
          <div class="card shadow-sm">
          	<span class="bd-placeholder-img card-img-top" width="100%" height="225">
          		<img height="400" width="100%" src="{{ $book->getImage() }}">
          	</span>
            <div class="card-body">
              	<p 
              		class="card-text text-center"
              	> 
              		{{ $book->authors->name }} - {{ $book->title }}
              		<br>

                  @auth
                    @if (!auth()->user()->hasBonus())
                      <strong> {{ $book->price ? $book->price : 'Free'  }} ₴ </strong>
                    @else
                    <strong>
                      <s>{{ $book->price }}</s>
                      {{ 
                        (($book->price - auth()->user()->hasBonus()) > 0)
                        ?
                        ($book->price - auth()->user()->hasBonus()).' ₴'
                        :
                        'Бесплатно'
                      }}
                    </strong>
                    @endif
                  @endauth

                  @guest
                    <strong> {{ $book->price ? $book->price : 'Free'  }} ₴ </strong>
                  @endguest

              	</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
              		<span 
              			class="px-1"
              		>
              			<a 
              				href="{{ route('view.book', ['id' => $book->id]) }}" 
              				class="btn btn-outline-success btn-xs" 
              				tabindex="-1" 
              				role="button" 
              				aria-disabled="true"
              			>
              				Подробнее
              			</a>
              		</span>
                </div>
                <small class="text-muted">


              <span class="px-1">
                <i class="bi bi-star"></i>
                {{ $book->ratings ? round($book->ratings->rating, 2) : 0 }}
              </span>

              <span class="px-1">
                <i class="bi bi-chat"></i>
                {{ $book->comments->count() }}
              </span>

					<svg
						xmlns="http://www.w3.org/2000/svg" 
						width="16" 
						height="16" 
						fill="currentColor" 
						class="bi bi-layout-text-sidebar-reverse" 
						viewBox="0 0 16 16"
					>
  						<path 
  							d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z"
  						/>
  						<path 
  							d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h2zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5V1z"/>
					</svg>
					{{ $book->pages }}
            	</small>
              </div>
            </div>
          </div>
        </div>
		@endforeach


          </div>
        </div>
      </div>
    </div>
  </div>

<div 
  class="col-md-12"
  style="margin: 0 auto; width: 6rem;"
> 
  @if ($books instanceof Illuminate\Pagination\LengthAwarePaginator)
    {{ $books->links() }}
  @endif
</div>

</main>

@include('layouts.footer')
      
  </body>
</html>
