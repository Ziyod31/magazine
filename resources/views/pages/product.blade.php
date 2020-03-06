@extends('layouts.main')

@section('title', 'Товар'.'-'.$product->name)

@section('content')
<h1>{{ $product->name }}</h1>
<h2>{{ $product->category->name }}</h2>
<p>Цена: <b>{{ $product->price }} руб.</b></p>
<img src="{{ Storage::url($product->image) }}">
<p>{{ $product->description }}</p>

@if($product->isAvailable())
<form action="{{ route('basket-add', $product) }}" method="POST">
	@csrf
	<button type="submit"
	class="btn btn-primary"
	role="button">В корзину</button>
	
</form>
@else
<h4>Товар не доступе</h4>
<span>Сообщить мне, когда товар в наличии:</span>
<div class="warning" style="color: red">
@if($errors->get('email'))
{!! $errors->get('email')[0] !!}
@endif
</div>
<form method="POST" action="{{ route('subscribe', $product) }}">
	@csrf
	<input type="text" name="email">
	<button type="submit">Отрпавить</button>
</form>
@endif
@endsection