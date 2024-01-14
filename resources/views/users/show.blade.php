@extends('template')

@section('content')

	<div class="container">
		<div class="row row-gap-3">
			<div class="col-12">
				<h3>Сотрудник: {{ $user->email }}</h3>
			</div>
			@if($user->transactions->count())
				<div class="col-12">
					<table class="table">
						<thead>
						<tr>
							<th scope="col">Часы</th>
							<th scope="col">Заработано (&#8381;)</th>
						</tr>
						</thead>
						<tbody>
						@foreach($user->transactions as $transaction)
							<tr>
								<td>{{ $transaction->hours }}</td>
								<td>{{ $transaction->price }} </td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			@else
				<p>Нет отработанных часов</p>
			@endif

			<hr>
			<div class="col-12">
				<a href="{{ route('users') }}" class="btn btn-dark">Назад</a>
			</div>
			<div class="col-md-6">
				@if ($errors->any())
					<div class="col-12">
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					</div>
				@endif
				<h5>Добавить часы</h5>
				<form action="{{ route('users.addHours') }}" method="post" class="w-25">
					@csrf
					<input type="number" name="hours" class="form-control mb-3" placeholder="Часы">
					<input type="hidden" name="employee_id" value="{{ $user->id }}">
					<button type="submit" class="btn btn-primary">Добавить часы</button>
				</form>
			</div>
		</div>
	</div>

@endsection
