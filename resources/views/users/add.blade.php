@extends('template')

@section('content')

	<div class="container">
		<div class="row row-gap-3">
			<div class="col-12">
				<h3>Добавление нового сотрудника</h3>
			</div>
			<div class="col-12">
				<form action="{{ route('users.create') }}" method="post" class="w-50 m-auto">
					@csrf
					<input type="email" name="email" class="form-control mb-3" placeholder="E-mail" required value="{{ request()->old('email') }}">
					<input type="password" name="password" class="form-control mb-3" placeholder="Пароль" required>
					<input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Подтверждение пароля" required>
					<a href="{{ route('users') }}" class="btn btn-dark">Назад</a>
					<button type="submit" class="btn btn-success">Добавить</button>
				</form>
			</div>
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
		</div>
	</div>

@endsection
