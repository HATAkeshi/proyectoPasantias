<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//new
use App\Models\Cursos;

class CursosFormController extends Controller
{

    //creamos un contructor nuevo
    function __construct()
    {
        $this->middleware('permission:ver-cursos | crear-cursos | editar-cursos | borrar-cursos', ['only'=>['index']]);

        $this->middleware('permission:crear-cursos', ['only'=>['create','store']]);
        //editar
        $this->middleware('permission:editar-cursos', ['only'=>['edit','update']]);
        //borrar
        $this->middleware('permission:borrar-cursos', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* return response()->view('fromularios.frm_carpinteria')->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0'); */

        /* $cursos = Cursos::paginate(5); */ 
        return view('frm_cursos.index', /* compact('cursos') */);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frm_cursos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'Dueño_de_la_obra' => 'required',
            'Nombre_de_persona_pago total' => 'required',
            'Detalle_de_curso' => 'required',
            'Numero_de_comprobante' => 'required|integer',
            'Ingresos' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        Cursos::create($request->all());
        return redirect()->route('frm_cursos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cursos $cursos)
    {
        return view('frm_cursos.editar', compact('cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cursos $cursos)
    {
        request()->validate([
            'Nombre_de_persona_anticipo_y_porcentaje_de_anticipo' => 'required',
            'Nombre_de_persona_pago total' => 'required',
            'Detalle_de_curso' => 'required',
            'Numero_de_comprobante' => 'required|integer',
            'Ingresos' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        $cursos->update($request->all());
        return redirect()->route('frm_cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cursos $cursos)
    {
        $cursos->delete();
        return redirect()->route('frm_cursos.index');
    }
}
