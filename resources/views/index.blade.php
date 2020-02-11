@extends('layouts.main')

@section('title', 'Главная страница')

@section('content')
<div class="row">
    <h1>Все товары</h1>
    <form method="GET" action="http://internet-shop.tmweb.ru">
        <div class="filters row">
            <div class="col-sm-6 col-md-3">
                <label for="price_from">Цена от
                    <input type="text" name="price_from" id="price_from" size="6" value="">
                </label>
                <label for="price_to">до
                    <input type="text" name="price_to" id="price_to" size="6"  value="">
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="hit">
                    <input type="checkbox" name="hit" id="hit" > Хит
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="new">
                    <input type="checkbox" name="new" id="new" > Новинка
                </label>
            </div>
            <div class="col-sm-2 col-md-2">
                <label for="recommend">
                    <input type="checkbox" name="recommend" id="recommend" > Рекомендуем
                </label>
            </div>
            <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-primary">Фильтр</button>
                <a href="http://internet-shop.tmweb.ru" class="btn btn-warning">Сброс</a>
            </div>
        </div>
    </form>
</div>
<hr>
@foreach($products as $product)
<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
        </div>
        <img src="{{ Storage::url($product->image)}}" alt="{{$product->name}}">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} руб.</p>
            <p>
                <form action="{{ route('basket-add', $product) }}" method="POST">
                    @csrf
                    <button type="submit"
                    class="btn btn-primary"
                    role="button">В корзину</button>

                    <a href="{{ route('product', [$product->category->code, $product->code]) }}"
                        class="btn btn-default" 
                        role="button">Подробнее
                    </a>
                </form>
            </p>
            <p> {{$product->category->name }}</p> 
        </div>
    </div>
</div>
@endforeach
{{ $products->links() }}
@endsection