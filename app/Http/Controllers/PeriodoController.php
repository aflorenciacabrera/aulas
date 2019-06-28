<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::all();
        return view('periodo.panel', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodo.carga');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new Periodo;
        $a->nombre = $request->nombre;
        $a->ano = $request->ano;
        $a->fecha_inicio = $request->fecha_inicio;
        $a->fecha_fin = $request->fecha_fin;
        $a->save();
        return redirect(url('periodos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit(Periodo $periodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $period = Periodo::findOrFail($id);
        $period->nombre = $request->nombre;
        $period->ano = $request->ano;
        $period->fecha_inicio = $request->fecha_inicio;
        $period->fecha_fin= $request->fecha_fin;
        $period->save();
        return redirect(url('/periodos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $periodo = Periodo::findOrFail( $id);
        $periodo->delete();
        return redirect(url( '/periodos'))->with('status','El Periodo a sido ELIMINAD0');
    }
}
