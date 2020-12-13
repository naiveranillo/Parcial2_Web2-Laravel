@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="contenido col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h3>{{ __('Bienvenido') }}</h3></div>

                    <div class="card-body ">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4 class="text-center"><b>{{ __(Auth::user()->name )  }}</b> <br> <span class="span">{{ __(' Estas en la pagina de inicial')}}</span> </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection