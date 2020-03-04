<h3>Уважаемый <b>{{ $name }},</b></h3>
<p>Ваш Заказ на сумму {{ $fullPrice }} создан</p>

<table>
	<tbody>
		@foreach($order->products as $product)
		<tr>
			<td><img height="56px" src="{{ Storage::url($product->image) }}"></td>
			<td><a href="{{ route('product', [$product->category->code, $product->code]) }}">{{$product->name}}</a></td>
			<td><span class="badge">{{ $product->count }}</span>
				<div class="btn-group form-inline">
					{!! $product->description !!}
				</div>
			</td>
			<td>{{$product->price}}</td>
			<td>{{$product->getPriceCount()}} руб.</td>
		</tr>
		@endforeach
	</tbody>
</table>