<main>
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height: auto;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <span class="fs-4"> <i class="bi bi-book"></i> BookMarket</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{ route('admin') }}" class="nav-link active" aria-current="page">
          <i class="bi bi-house"></i>
          Главная
        </a>
      </li>
      <li>
        <a href="{{ route('books.index') }}" class="nav-link link-dark">
          <i class="bi bi-list"></i>
          Книги
        </a>
      </li>
      <li>
        <a href="{{ route('authors.index') }}" class="nav-link link-dark">
          <i class="bi bi-list"></i>
          Авторы
        </a>
      </li>
      <li>
        <a href="{{ route('publishers.index') }}" class="nav-link link-dark">
          <i class="bi bi-list"></i>
          Издательства
        </a>
      </li>
      <li>
        <a href="{{ route('genres.index') }}" class="nav-link link-dark">
          <i class="bi bi-list"></i>
          Жанры
        </a>
      </li>
      <li>
        <a href="{{ route('languages.index') }}" class="nav-link link-dark">
          <i class="bi bi-list"></i>
          Языки
        </a>
      </li>
    </ul>
    <hr>


    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person-circle px-2"></i>
        <strong> {{Auth::user()->email}} </strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
      </ul>
    </div>
  </div>
  </main>