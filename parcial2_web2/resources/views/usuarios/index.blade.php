@extends('layouts.app')
@section('content')
<div class="container">
    @if(Session::has('Mensaje'))
		<script>
			toastr["success"]("{{ Session::get('Mensaje') }}", "Exito");
		</script>
    @endif
    <div class="card">
        <div class="card-header">
            <h2 class="text-center mt-3">Listado de Usuarios</h2>
        </div>
        <div class="card-body">
            <table class="table table-light table-hover">
                <thead class="thead-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Nombre:</th>
                    <th>Cédula:</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                @foreach($usuarios as $usuario)
                    <tbody class="text-center">
                        @if(Auth::user()->cedula != $usuario->cedula)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th >{{ $usuario->name }}</th>
                                <td >{{ $usuario->cedula }}</td>
                                <td >{{ $usuario->rol }}</td>
                                <td >
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary">
                                        Editar
                                    </a>
            
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea Eliminar?')">
                                            Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endif    
                    </tbody>
                @endforeach
            </table>
            {{ $usuarios->links() }}
        </div>
    </div>
    
    
</div>



@endsection

