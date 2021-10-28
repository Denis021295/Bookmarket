<!doctype html>
<html lang="en">
@include('layouts.head')
<body>

@include('layouts.menu')

<div id="app">


<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a 
            class="nav-item nav-link active" 
            id="nav-home-tab" 
            data-toggle="tab" 
            href="#nav-home" 
            role="tab" 
            aria-controls="nav-home" 
            aria-selected="true"
        >
            Контактные данные <span class="badge bg-secondary">new</span>
        </a>
        <a 
            class="nav-item nav-link text-dark" 
            id="nav-profile-tab" 
            data-toggle="tab" 
            href="#nav-profile" 
            role="tab" 
            aria-controls="nav-profile" 
            aria-selected="false"
        >
            Пароль <span class="badge bg-secondary">new</span>
        </a>
    </div>
</nav>





<div 
    class="tab-content" 
    id="nav-tabContent"
>
    <div 
        class="tab-pane fade show active" 
        id="nav-home" role="tabpanel" 
        aria-labelledby="nav-home-tab"
    >
    <br>
            <div class="container mt-15">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                        <form 
                            action="{{ route('upd.user', ['id'=>Auth::user()->id]) }}" 
                            class="form-signin" 
                            enctype="multipart/form-data" 
                            method="POST"
                        >
                            @csrf
                            <div align='center'></div>
                                <h1 class="h3 mb-3 font-weight-normal" align="center">
                                    <i class="bi bi-book"></i>
                                    BookMarket
                                </h1>

                                @if (!Auth::user()->login)
                                <input 
                                    type="text" 
                                    name='login' 
                                    id="inputLogin" 
                                    class="form-control mb-1" 
                                    placeholder="Login"
                                    value="{{ old('login') }}"
                                >
                                @endif

                                <input 
                                    type="text" 
                                    name='first_name' 
                                    id="inputName" 
                                    class="form-control mb-1" 
                                    placeholder="Имя"
                                    value="{{ old('first_name') }}"
                                >

                                <input 
                                    type="text" 
                                    name='last_name' 
                                    id="inputLM" 
                                    class="form-control mb-1" 
                                    placeholder="Фамилия"
                                    value="{{ old('last_name') }}"
                                >

                                <div class="mb-3">
                                    <input 
                                        class="form-control form-control-sm" 
                                        id="formFileSm" 
                                        type="file"
                                        name="poster"
                                    >
                                </div>

                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                                <button
                                    class="btn btn-xs btn-primary btn-block"
                                    type="submit"
                                > 
                                    Сохранить 
                                </button>
                                

                                <div class="mt-5">
                                  @if ($errors->any())
                                    <div class="alert alert-danger">
                                      <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                      </ul>
                                    </div>
                                  @endif

                                  @if(session()->has('error'))
                                    <div class="alert alert-danger">
                                      {{ session('error') }}
                                    </div>
                                  @endif

                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                      {{ session('success') }}
                                    </div>
                                  @endif
                                </div>

                        </form>
                    </div>
                </div>
            </div>
    </div>



	
	

        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"> <br>
            <div class="container mt-15">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4">
                            <div align='center'></div>
                                <h1 class="h3 mb-3 font-weight-normal" align="center">
                                    <i class="bi bi-book"></i>
                                    BookMarket
                                </h1>

                                <form 
                                    action="{{ route('upd.password', ['id'=>Auth::user()->id]) }}"
                                    class="form-signin" 
                                    method="POST"
                                >
                                    @csrf

                                    <input 
                                        type="password" 
                                        name='currentpassword' 
                                        class="form-control mb-1" 
                                        placeholder="Текущий пароль" 
                                        required
                                    >

                                    <input 
                                        type="password" 
                                        name='password' 
                                        class="form-control mb-1" 
                                        placeholder="Новый пароль" 
                                        required
                                    >

                                    <input 
                                        type="password" 
                                        name='password_confirmation' 
                                        class="form-control mb-1" 
                                        placeholder="Повторите новый пароль" 
                                        required
                                    >

                                    <button 
                                        class="btn btn-xs btn-primary btn-block mt-3" 
                                        type="submit"
                                    >
                                        Изменить пароль
                                    </button>
                                </form>
                                

                                <div class="mt-5">
                                  @if ($errors->any())
                                    <div class="alert alert-danger">
                                      <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                      </ul>
                                    </div>
                                  @endif

                                  @if(session()->has('error'))
                                    <div class="alert alert-danger">
                                      {{ session('error') }}
                                    </div>
                                  @endif

                                @if(session()->has('success'))
                                    <div class="alert alert-success">
                                      {{ session('success') }}
                                    </div>
                                  @endif
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




</div>


<!-- Bootstrap -->
<script 
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
    crossorigin="anonymous"
></script>

<script 
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"
></script>

<script 
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
    crossorigin="anonymous"
></script>

</body>
</html>