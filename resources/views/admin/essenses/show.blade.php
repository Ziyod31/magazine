@extends('layouts.master')

@section('titile', 'Товарное предложение'.'-'.$essense->name)

@section('content')

<div class="col-md-12">
	<h1>Товарное предложение - {{ $product->name }}</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>#id</th>
				<th>Свойства</th>
				<th>Цена</th>
				<th>Колицество</th>
			</tr>
			<tr>
				<td>{{ $essense->id }}</td>
				<td>{{ $essense->options->map->name->implode(', ') }}</td>
				<td>{{ $essense->price}}</td>
				<td>{{ $essense->count }}</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection