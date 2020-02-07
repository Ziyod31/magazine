<div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('index') }}">Интернет Магазин</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('index') }}">Все товары</a></li>
            <li ><a href="{{ route('cats') }}">Категории</a>
            </li>
            <li ><a href="{{route('basket')}}">В корзину</a></li>
            <li><a href="/reset">Сбросить проект в начальное состояние</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            @guest
            <li><a href="{{ route('login') }}">Войти</a></li>
            <li><a href="{{ route('register') }}">Регистрация</a></li>
            @endguest

            @auth
            <li><a href="{{ route('order') }}">Админка</a></li>
            <li><a href="{{ route('logout') }}">Выйти</a></li>
            @endauth

        </ul>
    </div>
</div>