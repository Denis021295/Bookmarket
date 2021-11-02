<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">О нас</h4>
          <p class="text-muted">Хорошие книги по доступной цене. Именно у нас Вы найдете то, что Вам действительно нужно</p>
        </div>

        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Категории</h4>
          <ul class="list-unstyled">
            <li>
              <a href="{{ route('all.authors') }}" class="text-white">Авторы</a>
            </li>
            <li>
              <a href="{{ route('all.genres') }}" class="text-white">Жанры</a>
            </li>
            <li>
              <a href="{{ route('all.publishers') }}" class="text-white">Издательства</a>
            </li>
          </ul>

          <div class="text-light">
            @if(Auth::check())
              <i class="bi bi-person"></i>
              <a 
                href="{{ route('profile.user', ['client' => auth()->user()->email]) }}"
                class="text-decoration-none text-light" 
              >
                {{ auth()->user()->login ?? auth()->user()->email }}
              </a>
                @if(auth()->user()->is_admin)
                  <br>
                  <a 
                    class="text-decoration-none text-light"
                    href="{{ route('admin') }}"
                  > 
                    <i class="bi bi-gear"></i>
                    Админ панель 
                  </a>
                  <br>
                @endif
                <br>
              <a 
                class="text-decoration-none text-light" 
                href="{{ route('basket') }}"
              >
                <i class="bi bi-bag"></i> 
                Корзина 
              </a>
              <br>
              <a 
                class="text-decoration-none text-light" 
                href="{{ route('settings') }}"
              >
                <i class="bi bi-gear-wide"></i>
                Настройки
              </a>
              <br>
              <a 
                class="text-decoration-none text-light" 
                href="{{ route('logout') }}"
              > 
                <i class="bi bi-power"></i>
                Logout 
              </a>
            @elseif(!Auth::check())
              <a 
                class="text-decoration-none text-light"
                href="{{ route('login') }}"
              > 
                <i class="bi bi-person-circle"></i>
                Вход 
              </a> 
              <br>
              <a
                class="text-decoration-none text-light"
                href="{{ route('register') }}"
              > 
                <i class="bi bi-person-plus"></i>
                Регистрация 
              </a>
              <br>
            @endif


        <form
          action="{{ route('search.books') }}"
          method="POST"
          class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 mt-3"
        >
          @csrf
          <input 
            type="search" 
            class="form-control-dark p-1" 
            placeholder="Search..." 
            aria-label="Search"
            name="q"
            width="80%"
            required 
          >
          <button 
            type="submit" 
            class="btn btn-warning"
            width="20%"
          >
            <i class="bi bi-search"></i>
            поиск
          </button>
        </form>


          </div>
        </div>

      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
        <svg 
        	xmlns="http://www.w3.org/2000/svg" 
        	width="50" 
        	height="50" 
        	fill="currentColor" 
        	class="bi bi-book px-2" 
        	viewBox="0 0 16 16"
        >
  			<path 
  				d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"
  			/>
		</svg>
        <strong>BookMarket</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>