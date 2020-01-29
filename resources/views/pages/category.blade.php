@extends('layouts.main')

@section('content')
<div class="container">
    <div class="starter-template">
        <h1>
            {{ $category->name }}
        </h1>
        <p>{{$category->desc}}</p>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <div class="labels">
                    </div>
                    <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
                    <div class="caption">
                        <h3>iPhone X 64GB</h3>
                        <p>71990 руб.</p>
                        <p>
                            <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
                                Не доступен
                                <a href="http://internet-shop.tmweb.ru/mobiles/iphone_x_64"
                                class="btn btn-default"
                                role="button">Подробнее</a>
                                <input type="hidden" name="_token" value="rMtuVrVQbe1bNb2bZx0i3WFtTHrQqtOGA4zjdLRf">            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection