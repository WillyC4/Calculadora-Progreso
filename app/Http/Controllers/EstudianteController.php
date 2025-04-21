<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{

//------------------------------------------------ index -------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $estudiante = Estudiante::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('nota_progreso_1', 'LIKE', "%$keyword%")
                ->orWhere('nota_progreso_2', 'LIKE', "%$keyword%")
                ->orWhere('minima_nota_progreso_3', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $estudiante = Estudiante::latest()->paginate($perPage);
        }

        return view('estudiante.index', compact('estudiante'));
    }

//------------------------------------------------ create -------------------------------------------------

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('estudiante.create');
    }

//------------------------------------------------ store -------------------------------------------------

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        // Validaciones antes de almacenar datos, sin incluir minima_nota_progreso_3
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nota_progreso_1' => 'required|numeric|min:0|max:10.00',
            'nota_progreso_2' => 'required|numeric|min:0|max:10.00',
        ]);
    
        // Calcular minima_nota_progreso_3 antes de guardar
        $requestData = $request->all();
        $requestData['minima_nota_progreso_3'] = (120 - (5 * $request->nota_progreso_1) - (7 * $request->nota_progreso_2)) / 8;
    
        // Guardar los datos con el valor calculado
        Estudiante::create($requestData);
    
        return redirect()->route('estudiante.index')->with('flash_message', 'Estudiante agregado correctamente!');
    }

//------------------------------------------------ show -------------------------------------------------

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        return view('estudiante.show', compact('estudiante'));
    }

//------------------------------------------------ edit -------------------------------------------------

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        return view('estudiante.edit', compact('estudiante'));
    }

//------------------------------------------------ update -------------------------------------------------

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // Validaciones antes de actualizar datos (sin incluir minima_nota_progreso_3)
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nota_progreso_1' => 'required|numeric|min:0|max:10.00',
            'nota_progreso_2' => 'required|numeric|min:0|max:10.00',
        ]);
    
        // Buscar el estudiante
        $estudiante = Estudiante::findOrFail($id);
    
        // Calcular minima_nota_progreso_3 con la fórmula antes de actualizar
        $requestData = $request->all();
        $requestData['minima_nota_progreso_3'] = (120 - (5 * $request->nota_progreso_1) - (7 * $request->nota_progreso_2)) / 8;
    
        // Actualizar con los datos calculados
        $estudiante->update($requestData);
    
        return redirect()->route('estudiante.index')->with('flash_message', 'Estudiante actualizado correctamente!');
    }

//------------------------------------------------ destroy -------------------------------------------------

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Estudiante::destroy($id);

        return redirect('estudiante')->with('flash_message', 'Estudiante deleted!');
    }
}
