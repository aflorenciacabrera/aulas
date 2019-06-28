<?php

namespace App\Http\Controllers;

use App\Models\Piso;
use Illuminate\Http\Request;

class PisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pisos = Piso::all();
        return view('piso.panel', compact('pisos'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('piso.carga');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new Piso;
        $a->nombre = $request->nombre;
        $a->save();
        return redirect(url('pisos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piso  $piso
     * @return \Illuminate\Http\Response
     */
    public function show(Piso $piso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piso  $piso
     * @return \Illuminate\Http\Response
     */
    public function edit(Piso $piso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piso  $piso
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request, $id)
    {
        $piso = Piso::findOrFail($id);
        $piso->nombre = $request->nombre;
        $piso->save();
        return redirect(url('/pisos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piso  $piso
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {
        $piso = Piso::findOrFail($id);
        $piso->delete();
        return redirect(url('/pisos'))->with('status','El Piso a sido ELIMINADO');
    }
}
