<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AlquilerAndamios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AlquilerAndamiosFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */

      //creamos un contructor nuevo
    function __construct()
    {
        $this->middleware('permission:ver-alquiler | crear-alquiler | editar-alquiler | borrar-alquiler', ['only'=>['index']]);

        $this->middleware('permission:crear-alquiler', ['only'=>['create','store']]);
        //editar
        $this->middleware('permission:editar-alquiler', ['only'=>['edit','update']]);
        //borrar
        $this->middleware('permission:borrar-alquiler', ['only'=>['destroy']]);
    }
    public function index()
    {
        /* $alquiler = AlquilerAndamios::paginate(5); */ 
        return view('frm_alquiler_adamios.index', /* compact('alquiler') */);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frm_alquiler_adamios.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'Nombre_de_persona_o_empresa' => 'required',
            'Detalle' => 'required',
            'Modulos' => 'required',
            'Retraso_de_entrega' => 'required',
            'Numero_de_comprobante' => 'required|integer',
            'Ingresos' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        AlquilerAndamios::create($request->all());
        return redirect()->route('frm_alquiler_andamios.index');
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
    public function edit(AlquilerAndamios $alquiler)
    {
        return view('frm_alquiler_adamios.editar', compact('alquiler'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlquilerAndamios $alquiler)
    {
        request()->validate([
            'Nombre_de_persona_o_empresa' => 'required',
            'Detalle' => 'required',
            'Modulos' => 'required',
            'Retraso_de_entrega' => 'required',
            'Numero_de_comprobante' => 'required|integer',
            'Ingresos' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/'
        ]);
        $alquiler->update($request->all());
        return redirect()->route('frm_alquiler_andamios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AlquilerAndamios $alquiler)
    {
        $alquiler->delete();
        return redirect()->route('frm_alquiler_andamios.index');
    }
}
