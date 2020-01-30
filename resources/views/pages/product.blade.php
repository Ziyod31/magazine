@extends('layouts.main')

@section('content')
<div class="container">
	<div class="starter-template">
		<h1>{{$product->name}}</h1>
		<h2>{{$product->category->name}}</h2>
		<p>Цена: <b>{{$product->price}} руб.</b></p>
		<img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
		<p>{{$product->description}}</p>
	</div>
</div>
@endsection