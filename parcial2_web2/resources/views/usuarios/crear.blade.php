@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h5>{{ __('Registrar Usuario') }}</h5></div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/usuarios') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group col-md-6 offset-md-3">
                            <label for="name" class="control-label">{{ __('Nombre') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        <div class="form-group col-md-6 offset-md-3">
                            <label for="cedula" class="control-label">{{ __('Cédula') }}</label>
                            <input min="0" id="cedula" type="number" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula">

                            @error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 offset-md-3">
                            <label for="rol" class="control-label">{{ __('Rol') }}</label>
                            <select name="rol" class="form-control">
                                <option value="administrador">Administrador</option>
                                <option value="usuario">Usuario</option>
                            </select>

                            @error('rol')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 offset-md-3">
                            <label for="password" class="control-label">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!--<div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>--->

                        <div class="form-group col-md-6 offset-md-3 text-center">
							<input class="btn btn-success" type="submit" value="Agregar">
						</div>
                    </form>
                </div>
            </div>
            @if(Session::has('Mensaje'))
                <script>
                    toastr["success"]("{{ Session::get('Mensaje') }}", "Exito");
                </script>
                {{-- <div class="alert alert-success">
                    {{ Session::get('Mensaje') }}
                </div> --}}
            @else
                @if(Session::has('Error'))
                    <script>
                        toastr["error"]("{{ Session::get('Error') }}", "Error");
                    </script>
                    {{-- <div class="alert alert-danger">
                        {{ Session::get('Error') }}
                    </div> --}}
                @endif
            @endif
        </div>
    </div>
</div>
@endsection
