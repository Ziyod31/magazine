@extends('layouts.main')

@section('title', 'Категория' . '-' . $category->name)

@section('content')
<h1>
    {{ $category->name }} {{ $category->products->count() }}
</h1>
<p>{{$category->description}}</p>
<div class="row">
    @foreach($category->products as $product)
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="labels">
            </div>
            <img src="{{ Storage::url($product->image)}}" alt="iPhone X 64GB">
            <div class="caption">
                <h3>{{$product->name}}</h3>
                <p>{{$product->price}} руб.</p>
                <p>
                 <form action="{{ route('basket-add', $product) }}" method="POST">
                    @csrf
                    <button type="submit"
                    class="btn btn-primary"
                    role="button">В корзину</button>

                    <a href="{{ route('product', [$product->category->code, $product->code]) }}"
                        class="btn btn-default" 
                        role="button">Подробнее
                    </a>
                </form>
            </p>
            <p> {{$product->category->name }}</p> 
        </div>
    </div>
</div>
@endforeach
</div>
@endsection

