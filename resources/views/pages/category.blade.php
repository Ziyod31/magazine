@extends('layouts.main')

@section('title', 'Категория'.'-'.$category->name)

@section('content')
<div class="container">
    <div class="starter-template">
        <h1>
            {{ $category->name }} {{ $category->products->count() }}
        </h1>
        <p>{{$category->description}}</p>
        <div class="row">
            @foreach($category->products as $product)
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="labels">
                    </div>
                    <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
                    <div class="caption">
                        <h3>{{$product->name}}</h3>
                        <p>{{$product->price}} руб.</p>
                        <p>
                            <a href="{{ route('basket')}}"
                            class="btn btn-primary"
                            role="button">В корзину</a>

                            <a href="{{ route('product', [$product->category->code, $product->code]) }}"
                                class="btn btn-default" 
                            role="button">Подробнее</a>
                        </p>
                        <p> {{$product->category->name }}</p> 
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection