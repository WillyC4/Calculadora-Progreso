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
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @endif
        
        <!-- Formulario de edición -->
        <form method="POST" action="{{ route('estudiante.update', $estudiante->id) }}" class="mt-4">
            {{ method_field('PATCH') }}
            @csrf()
            @include('estudiante.form', ['formMode' => 'edit'])
        </form>
    </div>



</x-app-layout>