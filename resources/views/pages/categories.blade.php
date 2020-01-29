@extends('layouts.main')

@section('content')
<div class="row">
	<h1>Все категории</h1>
</div>
<hr>
@foreach($categories as $cat)
<div class="col-sm-6 col-md-4">
	<div class="thumbnail">
		<img src="{{$cat->image}}">
		<div class="caption">
			<h3><a href="{{ route('category') }}">{{$cat->name}}</a></h3>
			<p>{{$cat->desc}}</p>
		</div>
	</div>
</div>
@endforeach
@endsection