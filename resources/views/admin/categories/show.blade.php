@extends('layouts.master')

@section('titile', 'Категория'.'-'.$category->name)

@section('content')
<div class="media">
	<img src="{{ $category->image }}" class="mr-3" alt="...">
	<div class="media-body">
		<h2 class="mt-0">{{$category->name}}</h2>
		<h5 class="mt-0">{{$category->code}}</h5>
		<p>{{$category->description}}</p>
		<p>{{$category->products->count()}}</p>
		<p>{{$category->id}}</p>
	</div>
</div>
@endsection