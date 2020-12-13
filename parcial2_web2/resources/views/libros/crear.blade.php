@extends('layouts.app')

@section('content')
	
<div class="container">
	
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-center"><h5>{{ __('Agregar Libro') }}</h5></div>
				@if(Session::has('Mensaje'))
					<script>
						toastr["success"]("{{ Session::get('Mensaje') }}", "Exito");
					</script>
				@else
					@if(Session::has('Error'))
						<script>
							toastr["error"]("{{ Session::get('Error') }}", "Error");
						</script>
					@endif
				@endif
				<div class="card-body">
					<form class="form-horizontal" action="{{ route('libros.store') }}" method="post">
						@csrf
						
						<div class="form-group col-md-6 offset-md-3">
							<label class="control-label" for="isbn">{{ 'Codigo ISBN' }}</label>
							<input class="form-control {{ $errors->has('isbn')?'is-invalid':'' }}" type="text" name="isbn" id="isbn" value="{{ old('isbn') }}">
							{!! $errors->first('isbn','<div class="invalid-feedback">:message</div>') !!}
						</div>
						<div class="form-group col-md-6 offset-md-3">
							<label class="control-label" for="nombre">{{ 'Nombre' }}</label>
							<input class="form-control {{ $errors->has('nombre')?'is-invalid':'' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
							{!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
						</div>
						<div class="form-group col-md-6 offset-md-3">
							<label class="control-label" for="categoria">{{ 'Categoria' }}</label>
							<input class="form-control {{ $errors->has('categoria')?'is-invalid':'' }} " type="text" name="categoria" id="categoria" value="{{ old('categoria') }}">
							{!! $errors->first('categoria','<div class="invalid-feedback">:message</div>') !!}
						</div>
						<div class="form-group col-md-6 offset-md-3">
							<label class="control-label" for="num_paginas">{{ 'Cantidad Paginas' }}</label>
							<input class="form-control {{ $errors->has('num_paginas')?'is-invalid':'' }}" type="number" min="0" name="num_paginas" id="num_paginas" value="{{ old('num_paginas') }}">
							{!! $errors->first('num_paginas','<div class="invalid-feedback">:message</div>') !!}
						</div>
						<div class="form-group col-md-6 offset-md-3 text-center">
							<input class="btn btn-success" type="submit" value="Agregar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    
	
</div>
@endsection