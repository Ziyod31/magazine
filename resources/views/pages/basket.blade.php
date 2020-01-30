@extends('layouts.main')

@section('title', 'Корзина')

@section('content')
<div class="container">
	<div class="starter-template">
		<h1>
			Корзина
		</h1>
		<p>Оформление заказа</p>
		<div class="panel">
			<table class="table table-stripped">
				<thead>
					<tr>
						<th>Название</th>
						<th>Колицество</th>
						<th>Цена</th>
						<th>Стоимость</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="#"><img height="56px" src="">name</a></td>
						<td><span class="badge">1</span>
							<div class="btn-group">
								<a href="" type="button" class="btn btn-danger">
									<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
								</a>
								<a href="" type="button" class="btn btn-success">
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								</a>
							</div>
						</td>
						<td>1000$</td>
						<td>1000$</td>
					</tr>
					<tr>
						<td colspan="3">Общая стоимость:</td>
						<td>1000$</td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="btn-group pull-right" role="group">
				<a href="" type="buton" class="btn btn-success">Оформить заказ</a>
			</div>
		</div>
	</div>
</div>
@endsection