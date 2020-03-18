<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<p>Категории товаров</p>
				<ul>
					@foreach($categories as $category)
					<li><a href="{{ route('category', $category->code) }}">{{$category->name}}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="col-lg-6">
				<p>Самые популярные товары</p>
				<ul>
					@foreach($bestProducts as $best)
					<li><a href="{{ route('product', [$best->category->code, $best->code]) }}">{{$best->name}}</a></li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</footer>