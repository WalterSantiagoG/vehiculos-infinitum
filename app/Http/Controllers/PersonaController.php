<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Requests\PersonaRequest;
use App\Http\Requests\UpdatePersonaRequest;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Persona = Persona::all();
        return view('personas.index')->with('Persona', $Persona);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaRequest $request)
    {
        $persona = new Persona($request->all());
        $persona->save();

        flash('Persona agregada satisfactoriamente')->success();
        return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::where('identificacion', $id)->get()->first();
        return view('personas.edit')->with('Persona', $persona);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonaRequest $request, $id)
    {
        $persona = Persona::where('identificacion', $id)->get()->first();
        $persona->nombres               = $request->nombres;
        $persona->apellidos             = $request->apellidos;
        $persona->fnacimiento           = $request->fnacimiento;
        $persona->profesion             = $request->profesion;
        $persona->casado                = $request->casado;
        $persona->ingresosm             = $request->ingresosm;
        $persona->save();

        flash('Persona '.$persona->nombres.' actualizado satisfactoriamente')->success();
        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);
        $persona->delete();

        flash('Usuario eliminado satisfactoriamente')->success();
        return redirect()->route('personas.index');
    }

    public function personasregistradas(Request $request)
    {
        $personas = Persona::all();
        return response()->json($personas);
    }
}
