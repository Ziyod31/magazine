@extends('layouts.master')

@section('title', 'Заказ №' . $order->id)

@section('content')
<div class="py-4">
	<div class="container">
		<div class="justify-content-center">
			<div class="panel">
				<h1>Заказ №{{$order->id}}</h1>
				<p>Заказчик: <b>{{$order->name}}</b></p>
				<p>Номер телефона: <b>{{$order->phone}}</b></p>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Картинка</th>
							<th>Название</th>
							<th>Количество</th>
							<th>Цена</th>
							<th>Стоимость</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order->products as $product)
						<tr>
							<td><img height="56px" src="{{ Storage::url($product->image) }}"></td>
							<td>
								<a href="{{ route('product', [$product->category->code, $product->code]) }}">{{$product->name}}</a>
							</td>
							<td><span class="badge">{{$product->pivot->count}}</span></td>
							<td>{{$product->pivot->price}} {{ $order->currency->symbol }}</td>
							<td>{{$product->getPriceCount() }} {{ $order->currency->symbol }}</td>
						</tr>
						@endforeach
						<tr>
							<td colspan="4">Общая стоимость:</td>
							<td>{{$order->sum }} {{ $order->currency->symbol }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>			
@endsection