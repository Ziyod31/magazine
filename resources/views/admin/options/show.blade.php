@extends('layouts.master')

@section('titile', 'Вариант свойства'.'-'.$option->name)

@section('content')

<div class="col-md-12">
	<h1>Вариант свойства - {{ $option->name }}</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>#id</th>
				<th>Свойства</th>
				<th>Название</th>
			</tr>
			<tr>
				<td>{{ $option->id }}</td>
				<td>{{ $option->property->name }}</td>
				<td>{{ $option->name }}</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection