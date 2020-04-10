@extends('layouts.master')

@isset($essense)

@section('title', 'Редактировать свойства товара'.'_'.$essense->name)

@else

@section('title', 'Создать свойства товара')

@endisset

@section('content')
<div class="col-md-12">
	@isset($essense)
	<h1>Редактировать свойства товара - <b>{{ $essense->name }}</b></h1>
	@else
	<h1>Создать свойства товара</h1>
	@endisset

	<form method="POST"

	@isset($essense)
	action="{{ route('essense.update', [$product, $essense]) }}"
	@else
	action="{{ route('essense.store', $product) }}"
	@endisset
	>	
	@isset($essense)
	@method('PUT')
	@endisset
	@csrf

	@foreach($product->properties as $property)
	<div class="form-group">
		<label for="property">{{ $property->name }}:</label>
		<select class="form-control" name="property_id[{{$property->id}}]">
			@foreach($property->options as $option)
			<option value="{{ $option->id }}"
				@isset($essense)
				@if($essense->options->contains($option->id))
				selected
				@endif
				@endisset
				>{{ $option->name }}
			</option>
			@endforeach
		</select>
	</div>
	@endforeach
	<br>
	<div class="form-row">
		<div class="col">
			<label for="code">Цена:</label>
			<input type="text" class="form-control" name="price" value="{{ old('price', isset($essense) ? $essense->price : null) }}">
		</div>
		<div class="col">
			<label for="name">Количетва:</label>
			<input type="text" class="form-control" name="count" value="{{ old('count', isset($essense) ? $essense->count : null) }}">
		</div>
	</div>
	<br>
	<button type="submit" class="btn btn-success">Сохранить</button>
</form>
</div>
@endsection