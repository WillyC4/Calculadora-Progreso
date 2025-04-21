<x-app-layout>
    <x-slot name="header">
        <nav class="navbar">
            <span class="navbar-brand">Calculadora de Progresos</span>
            <a href="{{ route('estudiante.index') }}" class="btn btn-custom">
                <i class="fas fa-arrow-left"></i> Volver al Índice
            </a>
        </nav>
    </x-slot>

    <div class="container mt-4">
        <div class="card p-4 shadow-lg bg-white rounded-lg">
            <h2 class="text-lg font-medium text-gray-900 text-center font-bold">Detalles del Estudiante</h2>

            <div class="text-center">
                <a href="{{ route('estudiante.index') }}" class="btn btn-primary mt-4">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>

            <table class="table table-striped mt-4">
                <tr>
                    <td class="font-weight-bold">ID</td>
                    <td>{{ $estudiante->id }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nombre</td>
                    <td>{{ $estudiante->nombre }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nota Progreso 1</td>
                    <td>{{ $estudiante->nota_progreso_1 }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nota Progreso 2</td>
                    <td>{{ $estudiante->nota_progreso_2 }}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nota Mínima de Progreso 3</td>
                    <td>{{ round((120 - (5 * $estudiante->nota_progreso_1) - (7 * $estudiante->nota_progreso_2)) / 8, 2) }}</td>
                </tr>
            </table>

            <!-- Botón para editar -->
            <div class="text-center mt-4">
                <a href="{{ route('estudiante.edit', $estudiante->id) }}" class="btn btn-success">
                    <i class="fas fa-edit"></i> Editar Estudiante
                </a>
            </div>
        </div>
    </div>
</x-app-layout>