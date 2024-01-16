@extends('template')

@section('content')
	<section class="home">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h5>Тестовое задание по расчету заработной платы</h5>
					<p>Для корректного запуска приложения сделать:</p>
					<ul>
						<li>Создать БД "payments"</li>
						<li>Выполнить миграции</li>
						<li>Выполнить команду "php artisan run"</li>
						<li>
							<strong>API маршруты доступны для запросов.</strong>
							Для POST запросов передавать параметры из ТЗ.
						</li>
					</ul>
					<a href="{{ route('users') }}">к списку сотрудников</a>
				</div>
			</div>
		</div>
	</section>
@endsection
