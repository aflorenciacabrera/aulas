<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Caracteristica;
use validate;
class CaracteristicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caracteristicas = Caracteristica::all();
        return view('caracteristica.panel', compact('caracteristicas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('caracteristica.carga');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $request->validate(['nombre' => 'required|exists:caracteristicas,nombre|alpha|max:255']);

       $caracteristica = Caracteristica::create([
                                                'nombre' => $request['nombre'],
                                                'descripcion' => $request['descripcion']]);
         return redirect()->route('caracteristicas.index')
        ->with('info', 'Caracteristica de un Aula fue creada con exito');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function show(Caracteristica $caracteristica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function edit(Caracteristica $caracteristica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $caracteristica = Caracteristica::findOrFail($id);
        $caracteristica->fill($request->all())->save();

         return redirect(url('/caracteristicas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $caracteristica = Caracteristica::findOrFail( $id);
        $caracteristica->delete();
        return redirect(url( '/caracteristicas'))->with('status','La caracteristica fue eliminada con exito');
    }
}
