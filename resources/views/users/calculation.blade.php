@extends('template')

@section('content')

	<div class="container">
		<div class="row row-gap-3">
			<div class="col-12">
				<h3>Сотрудник: {{ $user->email }}</h3>
			</div>
			@if($salary)
				<div class="col-12">
					<p>Зарплата <a href="{{ $user->getUrl() }}">сотрудника</a> за период составляет:
					<span class="text-bg-success"> {{ $salary }}</span> &#8381;</p>
				</div>
			@else
				<p>Рабочие часы отсутствуют</p>
			@endif

			<hr>
			<div class="col-12">
				<a href="{{ route('users') }}" class="btn btn-dark">Назад</a>
			</div>
		</div>
	</div>

@endsection
