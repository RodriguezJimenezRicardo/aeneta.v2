@extends('layouts.access')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center fw-bold">Registro</div>
                <div class="card-body">
                    <div class="d-flex justify-content-center ">
                        <form action="{{ route('save.register') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <div class="col-md-12">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="form-label">Contraseña</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-12 d-flex justify-content-center">
                                    <button type="submit"
                                        class="btn btn-principal btn-lg rounded-pill col-md-12">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
