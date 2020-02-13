@extends('layouts.main')

@section('title', 'Товар'.'-'.$product)

@section('content')


<h1>{{ $product }}</h1>
<h2>{{ $product->category->name }}</h2>
<p>Цена: <b>{{ $product->price }} руб.</b></p>
<img src="{{ Storage::url($product->image) }}">
<p>{{ $product->description }}</p>
@endsection