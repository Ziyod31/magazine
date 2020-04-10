@extends('layouts.master')

@section('titile', 'Товар'.'-'.$product->name)

@section('content')

<div class="col-md-12">
	<h1>Товар - {{ $product->name }}</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>#id</th>
				<th>Код</th>
				<th>Название</th>
				<th>Описание</th>
				<th>Категория</th>
				<th>Цена</th>
				<th>Колицество</th>
				<th>Лейбл</th>
				<th>Картинка</th>
			</tr>
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->code }}</td>
				<td>{{ $product->name }}</td>
				<td>{{ $product->description }}</td>
				<td>{{ $product->category->name }}</td>
				<td>{{ $product->price }}</td>
				<td>{{ $product->count }}</td>
				<td>
					@if($product->isNew())
					<span class="badge badge-success">Новинка</span>
					@endif
					@if($product->isRecommend())
					<span class="badge badge-danger">Рекомендуем</span>
					@endif
					@if($product->isHit())
					<span class="badge badge-warning">Хит продаж</span>
					@endif
				</td>
				<td><img src="{{ Storage::url($product->image)" height="50px"></td>
			</tr>
		</tbody>
	</table>
</div>
@endsection