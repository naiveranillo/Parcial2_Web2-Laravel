@extends('layouts.app')

@section('content')
<div class="container">
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
	
	<div class="card">
		<div class="card-header">
			<h2 class="text-center mt-3">Listado de Libros</h2>
		</div>
		<div class="card-body">
			<table class="table table-light table-hover">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Codigo ISBN</th>
						<th>Titulo</th>
						<th>Categoria</th>
						<th>N. de Paginas</th>
						@if(Auth::user()->rol == 'administrador')
							<th>Acciones</th>
						@endif
					</tr>
				</thead>
		
				<tbody>
					@foreach($libros as $libro)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $libro->ISBN }}</td>
						<td>{{ $libro->nombre }}</td>
						<td>{{ $libro->categoria }}</td>
						<td>{{ $libro->num_paginas }}</td>
						@if(Auth::user()->rol == 'administrador')
							<td><a class="btn btn-primary" href="{{ url('/libros/'.$libro->id.'/edit') }}">Editar</a>
		
								<form action="{{ url('/libros/'.$libro->id) }}" method="post" style="display: inline;">
								@csrf
								@method('delete')
								<button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
							</form></td>
		
							
						@endif
					</tr>
					@endforeach
				</tbody>
		
			</table>
			
			{{ $libros->links() }}
		</div>
	</div>
	
</div>
@endsection