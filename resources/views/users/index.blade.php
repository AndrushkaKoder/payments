@extends('template')


@section('content')

	<section class="users">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>Сотрудники</h2>
				</div>
			</div>
			@if($users)
				<div class="row">
					<div class="col-12">
						<table class="table">
							<thead>
							<tr>
								<th scope="col">E-mail</th>
								<th scope="col">Действие</th>
							</tr>
							</thead>
							<tbody>
							@foreach($users as $user)
								<tr>
									<td>
										<a href="{{ $user->getUrl() }}">{{ $user->email }}</a>
									</td>
									<td>
										<a href="{{ route('users.calculation', ['id' => $user->id]) }}">
											Рассчитать зарплату за период
										</a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@else
				<p>Сотрудников нет</p>
			@endif

			<div class="row">
				<div class="col-12 d-flex flex-column justify-content-start align-items-start">
					<a href="/" class="btn btn-dark mb-3">Назад</a>
					<a href="{{ route('users.add') }}" class="btn btn-primary mb-3">Добавить сотрудника</a>
					<a href="{{ route('users.payoff') }}" class="btn btn-success mb-3">Выплатить зарплату за период</a>
				</div>
			</div>
		</div>
	</section>

@endsection
