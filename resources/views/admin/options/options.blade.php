@extends('layouts.master')

@section('title', 'Варианты свойства')

@section('content')
<div class="col-md-12">
	<h1>Варианты свойства</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>#</th>
				<th>Свойства</th>
				<th>Название</th>
				<th>Действие</th>
			</tr>
			@foreach($options as $option)
			<tr>
				<td>{{$option->id}}</td>
				<td>{{$option->property->name}}</td>
				<td>{{$option->name}}</td>
				<td>
					<div class="btn-group" role="group">
						<form action="{{ route('options.destroy',[ $property, $option]) }}" method="post">
							@csrf
							<a type="button" href="{{route('options.show', [$property, $option])}}" class="btn btn-success">Открыть</a>
							<a type="button" href="{{route('options.edit', [$property, $option])}}" class="btn btn-warning">Редактировать</a>
							@method('DELETE')
							<input type="submit" class="btn btn-danger" value="Удалить">
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $options->links()}}
	<a href="{{ route('options.create', $property) }}" class="btn btn-success" type="button">Добавить опцию</a>
</div>
@endsection