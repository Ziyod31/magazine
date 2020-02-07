@extends('layouts.master')

@section('title', 'Создать категорию')

@section('content')
<div class="col-md-12">
	<h1>Редактировать категорию - <b>1</b></h1>
	<h1>Добавить категорию</h1>
	<form method="POST" enctype="multipart/form-data" action="{{ route('categories.store') }}">
		@csrf
		<div class="form-row">
			<div class="col">
				<label for="code">Код:</label>
				<input type="text" class="form-control" name="code">
			</div>
			<div class="col">
				<label for="name">Название:</label>
				<input type="text" class="form-control" name="name">
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="description">Описание:</label>
			<textarea class="form-control" id="description" rows="3" name="description"></textarea>
		</div>
		<div class="form-group">
			<label for="exampleFormControlFile1">Картинка:</label>
			<input type="file" class="form-control-file" id="image" name="image">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>
@endsection