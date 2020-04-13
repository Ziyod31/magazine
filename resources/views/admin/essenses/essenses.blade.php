@extends('layouts.master')

@section('title', 'Товарные предложения')

@section('content')
<div class="col-md-12">
	<h1>Товарные предложения</h1>
	<h3>{{ $product->name }}</h3>
	<table class="table">
		<tbody>
			<tr>
				<th>#</th>
				<th>Товарное предложение(свойства)</th>
				<th>Цена</th>
				<th>Количество</th>
				<th>Действие</th>
			</tr>
			@foreach($essenses as $essense)
			<tr>
				<td>{{$essense->id}}</td>
				<td>{{$essense->options->map->name->implode(', ')}}</td>
				<td>{{$essense->price}}</td>
				<td>{{$essense->count}}</td>
				<td>
					<div class="btn-group" role="group">
						<form action="{{ route('essense.destroy', [$product, $essense]) }}" method="post">
							@csrf
							<a type="button" href="{{route('essense.show', [$product, $essense])}}" class="btn btn-success">Открыть</a>
							<a type="button" href="{{route('essense.edit', [$product, $essense])}}" class="btn btn-warning">Редактировать</a>
							@method('DELETE')
							<input type="submit" class="btn btn-danger" value="Удалить">
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $essenses->links() }}
	<a href="{{ route('essense.create', $product) }}" class="btn btn-success" type="button">Добавить свойства</a>
</div>
@endsection