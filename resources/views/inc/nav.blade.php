<div class="container">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('index') }}">Интернет Магазин</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li @routeActive('index')><a href="{{ route('index') }}">Все товары</a></li>
            <li @routeActive('cat*')><a href="{{ route('cats') }}">Категории</a>
            </li>
            <li @routeActive('basket')><a href="{{route('basket')}}">В корзину</a></li>
            @admin
            <li><a href="{{ route('reset') }}">Сбросить проект в начальное состояние</a></li>
            @endadmin

            <li class="dropdown">
                <a href="{{ route('currency', $currency->code) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cur</a>
                <ul class="dropdown-menu">
                    <li><a href="#">$</a></li>
                </ul>
            </li>

        </ul>
    </div>

    <ul class="nav navbar-nav navbar-right">
        @guest
        <li><a href="{{ route('login') }}">Войти</a></li>
        <li><a href="{{ route('register') }}">Регистрация</a></li>
        @endguest

        @auth
        @admin
        <li><a href="{{ route('order.index') }}">Админка</a></li>
        @else
        <li><a href="{{ route('orders.index') }}">Мои Заказы</a></li>
        @endadmin

        <li><a href="{{ route('logout') }}">Выйти</a></li>
        @endauth

    </ul>
</div>
</div>