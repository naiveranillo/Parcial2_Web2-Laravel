@extends('layouts.app')

@section('content')
	
<div class="container">
	
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-center"><h5>{{ __('Editar Libro') }}</h5></div>

				{{-- @if(count($errors)>0)
					<div class="alert alert-danger" role="alert">
						<ul>
							@foreach($errors->all() as $error)
								<li>
									{{ $error }}
								</li>
							@endforeach
						</ul>	
					</div>
				@endif --}}
				<div class="card-body">
					<form class="form-horizontal" action="{{ url('/libros/'.$libro->id) }}" method="post">
                        @csrf
                        @method('PATCH')
						<br><br>
						<div class="form-group col-md-6 offset-md-3">
							<label class="control-label" for="isbn">{{ 'Codigo ISBN' }}</label>
							<input readonly class="form-control {{ $errors->has('isbn')?'is-invalid':'' }}" type="text" name="isbn" id="isbn" value="{{ isset($libro->ISBN)?$libro->ISBN:old('isbn') }}">
							{!! $errors->first('isbn','<div class="invalid-feedback">:message</div>') !!}
						</div>
						<div class="form-group col-md-6 offset-md-3">
							<label class="control-label" for="nombre">{{ 'Titulo' }}</label>
							<input class="form-control {{ $errors->has('nombre')?'is-invalid':'' }}" type="text" name="nombre" id="nombre" value="{{ isset($libro->nombre)?$libro->nombre:old('nombre') }}">
							{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
						</div>
						<div class="form-group col-md-6 offset-md-3">
							<label class="control-label" for="categoria">{{ 'Categoria' }}</label>
							<input class="form-control {{ $errors->has('categoria')?'is-invalid':'' }} " type="text" name="categoria" id="categoria" value="{{ isset($libro->categoria)?$libro->categoria:old('categoria') }}">
							{!! $errors->first('categoria','<div class="invalid-feedback">:message</div>') !!}
						</div>
						<div class="form-group col-md-6 offset-md-3">
							<label class="control-label" for="num_paginas">{{ 'Cantidad Paginas' }}</label>
							<input class="form-control {{ $errors->has('num_paginas')?'is-invalid':'' }}" type="number" min="0" name="num_paginas" id="num_paginas" value="{{ isset($libro->num_paginas)?$libro->num_paginas:old('num_paginas') }}">
							{!! $errors->first('num_paginas','<div class="invalid-feedback">:message</div>') !!}
						</div>
						<div class="form-group col-md-6 offset-md-3 text-center">
							<input class="btn btn-success" type="submit" value="Actualizar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    
	
</div>
@endsection