@extends('layouts.master')

@isset($category)

@section('title', 'Редактировать категорию'.'_'.$category->name)

@else

@section('title', 'Создать категорию')

@endisset

@section('content')
<div class="col-md-12">
	@isset($category)
	<h1>Редактировать категорию - <b>{{ $category->name }}</b></h1>
	@else
	<h1>Добавить категорию</h1>
	@endisset
	<form method="POST" enctype="multipart/form-data"

	@isset($category)
	action="{{ route('categories.update', $category) }}"
	@else
	action="{{ route('categories.store') }}"
	@endisset
	>	
	@isset($category)
	@method('PUT')
	@endisset
	
	@csrf
	<div class="form-row">
		<div class="col">
			<label for="code">Код:</label>
			<input type="text" class="form-control" name="code" value="@isset($category) {{$category->code}} @endisset">
		</div>
		<div class="col">
			<label for="name">Название:</label>
			<input type="text" class="form-control" name="name" value="@isset($category) {{$category->name}} @endisset">
		</div>
	</div>
	<br>
	<div class="form-group">
		<label for="description">Описание:</label>
		<textarea class="form-control" id="description" rows="3" name="description">@isset($category) {{$category->description}} @endisset</textarea>
	</div>
	<div class="form-group">
		<label for="exampleFormControlFile1">Картинка:</label>
		<input type="file" class="form-control-file" id="image" name="image" value="@isset($category) {{$category->image}} @endisset">
	</div>
	<button type="submit" class="btn btn-success">Сохранить</button>
</form>
</div>
@endsection