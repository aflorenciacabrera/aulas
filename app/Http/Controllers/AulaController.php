<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Edificio;
use Illuminate\Http\Request;
use App\Models\Caracteristica;
use App\Models\Piso;
class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aulas = Aula::all();
        $caracteristicas = Caracteristica::all();
        $edificios = Edificio::all();
        $pisos = Piso::all();
        return view('aula.panel', compact('aulas','caracteristicas','edificios','pisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id'); 
        $caracteristicas = Caracteristica::orderBy('nombre', 'ASC')->get(); 
         $edificios = Edificio::orderBy('nombre', 'ASC')->get();
        //return view('admin.posts.create', compact('categories', 'tags'));
        $pisos = Piso::all();
        return view('aula.carga', compact('caracteristicas','edificios','pisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $a = new Aula;

        $a->piso_id = $request->piso_id;
        $a->edificio_id = $request->edificio_id;
        $a->nombre = $request->nombre;
        $a->capacidad = $request->capacidad;
        $a->save();

        $a->caracteristicas()->attach($request->get('caracteristicas'));

        return redirect(url('aulas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function show(Aula $aula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function edit(Aula $aula)
    {
              $aula = Aula::findOrFail($id);
              $caracteristicas = Caracteristica::orderBy('nombre', 'ASC')->get(); 
              $edificios = Edificio::orderBy('nombre', 'ASC')->get();
              $pisos = Piso::all();

        return view('aula.panel', compact('caracteristicas','edificios','pisos'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            /*$aula = Aula::findOrFail($id);
            $aula->fill($request->all())->save();

            $aula->caracteristicas()->sync($request->get('caracteristicas'));
             return redirect(url('/aulas'));*/

        $aula = Aula::findOrFail($id);
        $aula->fill($request->all())->save();

      // ------- Relacion post y las etiquetas ------
         //con sync lo que digo es que se sincronice perfectamente la relacion entre post y etiquetas
         //detach para eliminar la relacion---- sync es la combinacion perfecta entre attach y detach
         $aula->caracteristicas()->sync($request->get('caracteristicas'));
        return redirect(url('/aulas'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aula  $aula
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $aula = Aula::findOrFail( $id);
        $aula->delete();
        return redirect(url( '/aulas'))->with('status','El Aula fue eliminada con exito');
    }
}
