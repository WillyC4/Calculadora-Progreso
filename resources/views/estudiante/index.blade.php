<x-app-layout>
    <x-slot name="header">
        <nav class="navbar">
            <span class="navbar-brand">Calculadora de Progresos</span>
            <a href="{{ route('welcome') }}" class="btn btn-custom">
                <i class="fas fa-arrow-left"></i> Volver a Inicio
            </a>
        </nav>
    </x-slot>

    <div class="container mt-4">
        <div class="card p-4 shadow-lg bg-white rounded-lg">
            <h2 class="text-lg font-medium text-black text-center font-bold">Estudiantes</h2>

            <!-- Botón para agregar estudiante -->
            <div class="text-right my-3">
                <a href="{{ route('estudiante.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Agregar Nuevo
                </a>
            </div>

            <!-- Mensajes Flash -->
            @if (session()->has('flash_message'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('flash_message') }}
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
            @endif

            <!-- Tabla de Estudiantes -->
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Nota Progreso 1</th>
                        <th>Nota Progreso 2</th>
                        <th>Mínima Nota Progreso 3</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($estudiante as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->nota_progreso_1 }}</td>
                        <td>{{ $item->nota_progreso_2 }}</td>
                        <td>{{ round((120 - (5 * $item->nota_progreso_1) - (7 * $item->nota_progreso_2)) / 8, 2) }}</td>
                        <td>
                            <a href="{{ route('estudiante.show', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Ver
                            </a>
                            <a href="{{ route('estudiante.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form method="POST" action="{{ route('estudiante.destroy', $item->id) }}" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Confirmar eliminación?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="mt-4">
                {!! $estudiante->appends(['search' => Request::get('search')])->render() !!}
            </div>
        </div>
    </div>
</x-app-layout>