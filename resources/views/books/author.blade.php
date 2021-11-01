<!doctype html>
<html lang="en">
@include('layouts.head')
<link rel="stylesheet" href="../public/font/bootstrap-icons.css">
<body>
    

@include('layouts.menu')


<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"> 
        	{{ $books[0]->flag }}
        </h1>
        <p class="lead text-muted">Находите, покупайте, читайте что Вам по душе</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        
		@foreach($books as $book)
		        <div class="col">
		          <div class="card shadow-sm">
		          	<span class="bd-placeholder-img card-img-top" width="100%" height="225">
		          		<img height="400" width="100%" src="../{{ $book->getImage() }}">
		          	</span>
		            <div class="card-body">
		              	<p 
		              		class="card-text text-center"
		              	> 
		              		{{ $book->authors->name }} - {{ $book->title }}
		              		<br>
		              		<strong> {{ $book->price ? $book->price : 'Free'  }} ₴ </strong>
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
						<i class="bi bi-layout-text-sidebar-reverse"></i>
							{{ $book->pages }}
		            	</small>
		              </div>
		            </div>
		          </div>
		        </div>

			@endforeach



			<div 
				class="mt-4" 
				style="margin: 0 auto; width: 6rem;"
			> 
				{{ $books->links() }} 
			</div>



          </div>
        </div>
      </div>
    </div>
  </div>

</main>

@include('layouts.footer')
      
  </body>
</html>
