@extends('layouts.master')

@section('title', 'Свойства')

@section('content')
<div class="col-md-12">
	<h1>Свойства</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>#</th>
				<th>Название</th>
				<th>Действие</th>
			</tr>
			@foreach($properties as $property)
			<tr>
				<td>{{$property->id}}</td>
				<td>{{$property->name}}</td>
				<td>
					<div class="btn-group" role="group">
						<form action="{{ route('properties.destroy', $property) }}" method="post">
							@csrf
							<a type="button" href="{{route('properties.show', $property)}}" class="btn btn-success">Открыть</a>
							<a type="button" href="{{route('properties.edit', $property)}}" class="btn btn-warning">Редактировать</a>
							<a type="button" href="{{route('options.index', $property)}}" class="btn btn-secondary">Добавить значение</a>
							@method('DELETE')
							<input type="submit" class="btn btn-danger" value="Удалить">
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a href="{{ route('properties.create') }}" class="btn btn-success" type="button">Добавить свойтсва</a>
</div>
@endsection