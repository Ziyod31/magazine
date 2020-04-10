@extends('layouts.master')

@isset($option)

@section('title', 'Редактировать вариант свойства'.'_'.$option->name)

@else

@section('title', 'Создать вариант свойства')

@endisset

@section('content')
<div class="col-md-12">
	@isset($option)
	<h1>Редактировать вариант свойства - <b>{{ $option->name }}</b></h1>
	@else
	<h1>Добавить вариант свойства для:</h1>
	<h3>{{ $property->name}}</h3> 
	@endisset
	<form method="POST" enctype="multipart/form-data"

	@isset($option)
	action="{{ route('options.update', [$property, $option]) }}"
	@else
	action="{{ route('options.store', $property) }}"
	@endisset
	>	
	@isset($option)
	@method('PUT')
	@endisset
	
	@csrf
	<div class="form-row">
		<div class="col">
			<label for="name">Название:</label>
			<input type="text" class="form-control" name="name" value="@isset($option) {{$option->name}} @endisset">
		</div>
	</div>
	<br>
	<button type="submit" class="btn btn-success">Сохранить</button>
</form>
</div>
@endsection