@extends('layouts.main')

@section('title', 'Корзина')

@section('content')
<div class="container">
	<div class="starter-template">
		<h1>
			Корзина
		</h1>
		<p>Оформление заказа</p>
		<div class="panel">
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>Картинка</th>
						<th>Название</th>
						<th>Колицество</th>
						<th>Цена</th>
						<th>Стоимость</th>
					</tr>
				</thead>
				<tbody>
					@foreach($order->products as $product)
					<tr>
						<td><img height="56px" src="{{ Storage::url($product->image) }}"></td>
						<td><a href="{{ route('product', [$product->category->code, $product->code]) }}">{{$product->name}}</a></td>
						<td><span class="badge">{{ $product->countOrder }}</span>
							<div class="btn-group form-inline">
								<form action="{{ route('basket-remove', $product)}}" method="post">
									@csrf
									<button type="submit" class="btn btn-danger">
										<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
									</button>
								</form>
								<form action="{{ route('basket-add', $product)}}" method="post">
									@csrf
									<button type="submit" class="btn btn-success">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</button>
								</form>
							</div>
						</td>
						<td>{{$product->price}}</td>
						<td>{{$product->price * $product->countOrder}} руб.</td>
					</tr>
					@endforeach
					<br>
					<tr>
						<td colspan="4">Общая стоимость:</td>
						<td>{{ $order->getFullPrice() }} руб.</td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="btn-group pull-right" role="group">
				<a href="{{ route('basket-place') }}" type="buton" class="btn btn-success">Оформить заказ</a>
			</div>
		</div>
	</div>
</div>
@endsection