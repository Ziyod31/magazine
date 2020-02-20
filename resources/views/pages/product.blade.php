@extends('layouts.main')

@section('title', 'Товар'.'-'.$product->name)

@section('content')
<h1>{{ $product->name }}</h1>
<h2>{{ $product->category->name }}</h2>
<p>Цена: <b>{{ $product->price }} руб.</b></p>
<img src="{{ Storage::url($product->image) }}">
<p>{{ $product->description }}</p>
<form action="{{ route('basket-add', $product) }}" method="POST">
	@csrf
	@if($product->isAvailable())
	<button type="submit"
	class="btn btn-primary"
	role="button">В корзину</button>
	@else
	Товар не доступен
	@endif
</form>
@endsection