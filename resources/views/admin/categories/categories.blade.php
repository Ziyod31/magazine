@extends('layouts.master')

@section('title', 'Категории')

@section('content')
<div class="col-md-12">
	<h1>Категории</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>#</th>
				<th>Код</th>
				<th>Название</th>
				<th>Действие</th>
			</tr>
			@foreach($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->code}}</td>
				<td>{{$category->name}}</td>
				<td>
					<div class="btn-group" role="group">
						<form action="#" method="post">
							@csrf
							<a type="button" href="{{route('categories.show', $category)}}" class="btn btn-success">Открыть</a>
							<a type="button" href="{{route('categories.update', $category)}}" class="btn btn-warning">Редактировать</a>
							<a type="button" href="#" class="btn btn-danger">Удалить</a>
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a href="{{ route('categories.create') }}" class="btn btn-success" type="button">Добавить категорию</a>
</div>
@endsection