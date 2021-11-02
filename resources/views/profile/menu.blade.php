<div 
	class="alert alert-info p-1" role="alert"
>
	<div 
		class="alert alert-light p-1 mb-1 text-center" 
		role="alert"
	>
		<b> {{ $client->login ?? $client->email }} </b>
			<small> ({{ $client->full_user_real_name() }}) </small>
	</div>
	<img src="
	{{
		session()->has('ava')
		?
		'../'.$client->getImage()
		:
		$client->getImage()
	}}
	" width="100%">
				
	@if ($client->id == auth()->user()->id)
		<div class="alert alert-light mt-1 mb-1 p-2" role="alert">
			<a 
				href="{{ route('user.bonus', ['client' => $client->email]) }}"
				class="text-decoration-none text-dark"
			>
				<i class="bi bi-cash"></i> Бонусы
			</a>
		</div>
		<div class="alert alert-light mt-1 mb-0 p-2" role="alert">
			<a 
				href="{{ route('user.coins', ['client' => $client->email]) }}"
				class="text-decoration-none text-dark"
			>
				<i class="bi bi-cash-coin"></i> BMcoins
			</a>
		</div>
	@endif

</div>