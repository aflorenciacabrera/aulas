<?php

namespace App\Http\Controllers;

use App\Models\Edificio;
use Illuminate\Http\Request;

class EdificioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edificios = Edificio::all();
       
        return view('edificio.panel', compact('edificios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edificio.carga');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new Edificio;
        $a->nombre = $request->nombre;
        $a->save();
        return redirect(url('edificios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function show(Edificio $edificio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function edit(Edificio $edificio)
    {
        //
       
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $edif = Edificio::findOrFail($id);
        $edif->nombre = $request->nombre;
        $edif->save();

        return redirect(url('/edificios'));
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edificio  $edificio
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {

        $edif = Edificio::findOrFail( $id);
        $edif->delete();
        return redirect(url( '/edificios'))->with('status','El Edificio a sido ELIMINADo');
    }
}
