@extends('layouts.master')

@section('title', 'Все продукты')

@section('content')
<div class="col-md-12">
	<h1>Продукты</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>#</th>
				<th>Код</th>
				<th>Название</th>
				<th>Категория</th>
				<th>Цена</th>
				<th>Количество</th>
				<th>Действие</th>
			</tr>
			@foreach($products as $product)
			<tr>
				<td>{{$product->id}}</td>
				<td>{{$product->code}}</td>
				<td>{{$product->name}}</td>
				<td>{{$product->category->name}}</td>
				<td>{{$product->price}}</td>
				<td>{{$product->count}}</td>
				<td>
					<div class="btn-group" role="group">
						<form action="{{ route('products.destroy', $product) }}" method="post">
							@csrf
							<a type="button" href="{{route('products.show', $product)}}" class="btn btn-success">Открыть</a>
							<a type="button" href="{{route('products.edit', $product)}}" class="btn btn-warning">Редактировать</a>
							@method('DELETE')
							<input type="submit" class="btn btn-danger" value="Удалить">
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $products->links() }}
	<a href="{{ route('products.create') }}" class="btn btn-success" type="button">Добавить категорию</a>
</div>
@endsection