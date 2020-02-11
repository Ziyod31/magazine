@extends('layouts.master')

@section('titile', 'Категория'.'-'.$category->name)

@section('content')

<div class="col-md-12">
	<h1>Категория - {{ $category->name }}</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>#id</th>
				<th>Код</th>
				<th>Название</th>
				<th>Описание</th>
				<th>Колицество товаров</th>
				<th>Картинка</th>
			</tr>
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->code }}</td>
				<td>{{ $category->name }}</td>
				<td>{{ $category->description }}</td>
				<td>{{ $category->products->count() }}</td>
				<td><img src="{{ Storage::url($category->image) }}" height="50px"></td>
			</tr>
		</tbody>
	</table>
</div>
@endsection