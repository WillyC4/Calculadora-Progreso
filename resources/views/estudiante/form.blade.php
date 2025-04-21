<div class="card p-4 shadow-lg bg-white rounded-lg">
    <h2 class="text-lg font-medium text-gray-900 text-center font-bold">
        {{ $formMode === 'edit' ? 'Editar Estudiante' : 'Crear Nuevo Estudiante' }}
    </h2>

    <div class="text-center">
        <a href="{{ route('estudiante.index') }}" class="btn btn-primary mt-4">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <!-- Campo Nombre -->
    <div class="mt-4">
        <label for="nombre" class="font-medium text-gray-700">Nombre</label>
        <input class="form-control" id="nombre" name="nombre" type="text"
               value="{{ old('nombre', $estudiante->nombre ?? '') }}" required>
        @error('nombre')
            <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Campo Nota Progreso 1 -->
    <div class="mt-4">
        <label for="nota_progreso_1" class="font-medium text-gray-700">Nota Progreso 1</label>
        <input class="form-control" id="nota_progreso_1" name="nota_progreso_1" type="number" step="0.01" min="0" max="10.00"
               value="{{ old('nota_progreso_1', $estudiante->nota_progreso_1 ?? '') }}" required>
        @error('nota_progreso_1')
            <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Campo Nota Progreso 2 -->
    <div class="mt-4">
        <label for="nota_progreso_2" class="font-medium text-gray-700">Nota Progreso 2</label>
        <input class="form-control" id="nota_progreso_2" name="nota_progreso_2" type="number" step="0.01" min="0" max="10.00"
               value="{{ old('nota_progreso_2', $estudiante->nota_progreso_2 ?? '') }}" required>
        @error('nota_progreso_2')
            <p class="text-danger mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Campo Mínima Nota Progreso 3 (Solo lectura) -->
    <div class="mt-4">
        <label for="minima_nota_progreso_3" class="font-medium text-gray-700">Mínima Nota Progreso 3 (Calculado):</label>
        <p class="border rounded-md bg-gray-100 px-3 py-2 text-gray-700">
            {{ isset($estudiante) ? round((120 - (5 * $estudiante->nota_progreso_1) - (7 * $estudiante->nota_progreso_2)) / 8, 2) : 0 }}
        </p>
    </div>

    <!-- Botón de Enviar -->
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> {{ $formMode === ' edit' ? ' Actualizar' : ' Crear' }}
        </button>
    </div>
</div>