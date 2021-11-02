@extends('empties.pattern')

@php
	use Carbon\Carbon;
@endphp


<link rel="stylesheet" href="../public/font/bootstrap-icons.css">
@section('title', 'Профиль | '.$client->email)


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
			@if ($client->comments->count() == 0)
				<div class="alert alert-info" role="alert">Вы не добавили ни одного комментария...</div>
			@else
				<div class="alert alert-info p-1" role="alert">
					@foreach($client->comments as $comment)
						<div 
							class="alert alert-light p-1 mb-1" 
							role="alert"
						>
							<small> 
								Комментарий к книге <b>{{ $comment->books['title'] }}</b> | 
								{{ Carbon::createFromFormat('Y-m-d H:i:s', $comment->updated_at)->format('d F, Y') }}
							</small>
						</div>
						<div
							class="alert alert-warning" 
							role="alert"
						>
							{{ $comment->text }}
							@if (Gate::allows('delete-this-comment', $comment))
			                    <div class="mb-0 mt-2">
			                          <form class="mb-0" action="{{ route('delete.comment', ['id' => $comment->id]) }}" method="POST">
			                            @csrf
			                            <button 
			                              type="submit" 
			                              class="btn-sm btn-primary"
			                              name="id"
			                              value="{{ $comment->id }}"
			                            >
			                              <i class="bi bi-basket"></i>
			                              @lang('Удалить')
			                            </button>
			                          </form>
			                        </div>
                      		@endif
						</div>
					@endforeach
				</div>
			@endif
		</div>
		<!-- end 9 -->

	</div>
</div>
@endsection



@section('footer')
	@include('layouts.footer')
@endsection