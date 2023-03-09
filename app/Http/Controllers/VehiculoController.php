<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Vehiculo;
use App\Models\PersonaVehiculo;
use App\Http\Requests\VehiculoRequest;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Vehiculoindex = DB::table('vehiculos')->get();
        return view('personas.vehiculos.index')->with('Vehiculoindex', $Vehiculoindex);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Persona = Persona::all();
        return view('personas.vehiculos.create')->with('Persona', $Persona);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehiculoRequest $request)
    {
        $vehiculo = new Vehiculo;
        $vehiculo->placa               = $request->placa;
        $vehiculo->marca               = $request->marca;
        $vehiculo->modelo              = $request->modelo;
        $vehiculo->npuertas            = $request->npuertas;
        $vehiculo->tipovh              = $request->tipovh;
        $vehiculo->save();

        $personavehiculo = new PersonaVehiculo;
        $personavehiculo->identificacion         = $request->identificacion;
        $personavehiculo->placa                  = $request->placa;
        $personavehiculo->vhactual               = '1';
        $personavehiculo->save();

        flash('Vehiculo creado satisfactoriamente con su propietario')->success();
        return redirect()->route('personas.index');
    }

    public function listarvehiculos(Request $request)
    {
        if ($request->ajax()) {
            $personaveh = DB::table('personasvehiculos')
                ->join('personas', 'personas.identificacion', '=', 'personasvehiculos.identificacion')
                ->join('vehiculos', 'vehiculos.placa', '=', 'personasvehiculos.placa')
                ->select('personasvehiculos.*', 'personas.*', 'vehiculos.*')
                ->where('personasvehiculos.identificacion', '=', $request->id)
                ->get();
            return $personaveh;
        }   
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
        $vehiculo = DB::table('vehiculos')
            ->where('vehiculos.placa', '=', $id)
            ->get();
        $Vehiculo = $vehiculo[0];
        return view('personas.vehiculos.edit')->with('Vehiculo', $Vehiculo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculo::where('placa', $id)->get()->first();
        $vehiculo->marca               = $request->marca;
        $vehiculo->modelo              = $request->modelo;
        $vehiculo->npuertas            = $request->npuertas;
        $vehiculo->tipovh              = $request->tipovh;
        $vehiculo->save();

        flash('Vehiculo '.$id.' actualizado satisfactoriamente')->success();
        return redirect()->route('vehicle.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();
        
        flash('Vehiculo eliminado satisfactoriamente')->success();
        return redirect()->route('vehicle.index');
    }
}
