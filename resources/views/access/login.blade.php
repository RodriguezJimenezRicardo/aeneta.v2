@extends('layouts.access')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center fw-bold">Iniciar sesión</div>
                <div class="card-body">
                    {!! Form::open(['url' => '/login', 'method' => 'POST']) !!}
                    @csrf
                    <div class="mb-3 row">
                        {{ Form::label('email', 'Correo electrónico', ['class' => 'form-control-label']) }}
                        {{ Form::email('email', session('email'), ['class' => 'form-control']) }}
                    </div>
                    <div class="mb-3 row">
                        {{ Form::label('password', 'Contraseña', ['class' => 'form-control-label']) }}
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12 d-flex justify-content-center">
                            {{ Form::submit('Entrar', ['class' => 'btn btn-principal rounded-pill col-md-12']) }}
                        </div>
                    </div>
                    <div>
                        ¿No tienes una cuenta? <a class="link-opacity-10-hover" href="/register">Registrarme</a><br><br>
                        ¿Olvidaste tu contraseña? <a class="link-opacity-10-hover" href="/recover/password">Reestablecer
                            contraseña</a>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
