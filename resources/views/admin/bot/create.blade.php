@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Зарегистрировать бота</div>

                <div class="panel-body">
					<div class="content">
						<p>
							<a class="btn btn-link" href="{{ route('home') }}">Назад в админ панель</a>
						</p>
						@if(isset($token))
							<p>Ваш токен - <b>{{ $token }}</b></p>
						@else
							<p>
								<form method="post" action="{{ route('bot_token') }}" name="bot_reg">
									{{ csrf_field() }}
									<button type="submit" class="btn btn-default">Получить токен</button>
								</form>
							</p>
						@endif
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
