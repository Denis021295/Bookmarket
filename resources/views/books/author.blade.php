<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
    

@include('layouts.menu')


<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">@foreach($books as $book) {{ $book->name }}  @endforeach</h1>
        <p class="lead text-muted">Находите, покупайте, читайте что Вам по душе</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        
		@foreach($books as $book)
			@foreach($book->books as $item)

		        <div class="col">
		          <div class="card shadow-sm">
		          	<span class="bd-placeholder-img card-img-top" width="100%" height="225">
		          		<img height="400" width="100%" src="../{{ $item->getImage() }}">
		          	</span>
		            <div class="card-body">
		              	<p 
		              		class="card-text text-center"
		              	> 
		              		{{ $item->authors->name }} - {{ $item->title }}
		              		<br>
		              		<strong> {{ $item->price ? $item->price : 'Free'  }} ₴ </strong>
		              	</p>
		              <div class="d-flex justify-content-between align-items-center">
		                <div class="btn-group">
		              		<span 
		              			class="px-1"
		              		>
		              			<a 
		              				href="{{ route('view.book', ['id' => $item->id]) }}" 
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
							{{ $item->pages }}
		            	</small>
		              </div>
		            </div>
		          </div>
		        </div>


			@endforeach
		@endforeach


          </div>
        </div>
      </div>
    </div>
  </div>

</main>

@include('layouts.footer')
      
  </body>
</html>
