@extends('layouts.master')

@isset($category)

@section('title', 'Редактировать товар'.'_'.$product->name)

@else

@section('title', 'Создать товар')

@endisset

@section('content')
<div class="col-md-12">
	@isset($product)
	<h1>Редактировать товар - <b>{{ $product->name }}</b></h1>
	@else
	<h1>Добавить товар</h1>
	@endisset
	<form method="POST" enctype="multipart/form-data"

	@isset($product)
	action="{{ route('products.update', $product) }}"
	@else
	action="{{ route('products.store') }}"
	@endisset
	>	
	@isset($product)
	@method('PUT')
	@endisset
	
	@csrf
	<div class="form-row">
		<div class="col">
			<label for="code">Код:</label>
			<input type="text" class="form-control" name="code" value="{{ old('code', isset($product) ? $product->code : null) }}">
		</div>
		<div class="col">
			<label for="name">Название:</label>
			<input type="text" class="form-control" name="name" value="{{ old('name', isset($product) ? $product->name : null) }}">
		</div>
	</div>
	<br>
	<div class="form-group">
		<label for="category_id">Категория:</label>
		<select class="form-control" id="category_id" name="category_id">
			@foreach($categories as $category)
			<option value="{{ $category->id }}"
				@isset($product)
				@if($product->category_id == $category->id)
				selected
				@endif
				@endisset
				>{{ $category->name }}</option>
				@endforeach
			</select>
		</div>
		<br>
		<div class="form-row">
			<div class="col">
				<label for="code">Цена:</label>
				<input type="text" class="form-control" name="price" value="{{ old('price', isset($product) ? $product->price : null) }}">
			</div>
			<div class="col">
				<label for="name">Колицество:</label>
				<input type="text" class="form-control" name="count" value="{{ old('count' isset($product) ? $product->count : null) }}">
			</div>
		</div>
		<br>
		<div class="form-group">
			<label for="description">Описание:</label>
			<textarea class="form-control" id="description" rows="3" name="description">@isset($product) {{$product->description}} @endisset</textarea>
		</div>
		<div class="form-group">
			<label for="exampleFormControlFile1">Картинка:</label>
			<input type="file" class="form-control-file" id="image" name="image" value="@isset($product) {{$product->image}} @endisset">
		</div>
		<button type="submit" class="btn btn-success">Сохранить</button>
	</form>
</div>
@endsection