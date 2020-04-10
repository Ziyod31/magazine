@extends('layouts.master')

@isset($property)

@section('title', 'Редактировать свойства'.'_'.$property->name)

@else

@section('title', 'Создать свойства')

@endisset

@section('content')
<div class="col-md-12">
	@isset($property)
	<h1>Редактировать свойства - <b>{{ $property->name }}</b></h1>
	@else
	<h1>Добавить свойства</h1>
	@endisset
	<form method="POST" enctype="multipart/form-data"

	@isset($property)
	action="{{ route('properties.update', $property) }}"
	@else
	action="{{ route('properties.store') }}"
	@endisset
	>	
	@isset($property)
	@method('PUT')
	@endisset
	
	@csrf
	<div class="form-row">
		<div class="col">
			<label for="name">Название:</label>
			<input type="text" class="form-control" name="name" value="@isset($property) {{$property->name}} @endisset">
		</div>
	</div>
	<br>

	<button type="submit" class="btn btn-success">Сохранить</button>
</form>
</div>
@endsection