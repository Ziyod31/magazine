@extends('layouts.master')

@section('titile', 'Свойства'.'-'.$property->name)

@section('content')

<div class="col-md-12">
	<h1>Свойства - {{ $property->name }}</h1>
	<table class="table">
		<tbody>
			<tr>
				<th>#id</th>
				<th>Название</th>
			</tr>
			<tr>
				<td>{{ $property->id }}</td>			
				<td>{{ $property->name }}</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection