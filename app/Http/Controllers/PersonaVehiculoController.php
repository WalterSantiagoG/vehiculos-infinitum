<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonaVehiculo;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;

class PersonaVehiculoController extends Controller
{
    public function cambiarpropietario(Request $request, $placa)
    {
        //Consulta para verificar si la persona ya es propietario del vehiculo
        $existe_ident_placa_actual = PersonaVehiculo::where('identificacion', $request->identificacion)->where('placa', $placa)->where('vhactual', '1')->get()->first();

        //Si no es propietario ingresa para la asignacion del vehiculo, de lo contrario ingresa al else y le retorna que ya es propietario de este vehiculo
        if (is_null($existe_ident_placa_actual)) {

            //Verifica si la persona ya ha tenido anteriormente este vehiculo asignado para solo cambiarle el estado a asignado en el historial y no crear un nuevo registro
            //De lo contrario ingresa al else y crea el registro asignando a la persona como propietario
            $existe_ident_placa = PersonaVehiculo::where('identificacion', $request->identificacion)->where('placa', $placa)->where('vhactual', '0')->get()->first();

            if ($existe_ident_placa) {
                $existe_ident_placa->vhactual = '1';
                $existe_ident_placa->save();
            }else{
                $personveh = new PersonaVehiculo;
                $personveh->identificacion     = $request->identificacion;
                $personveh->placa              = $placa;
                $personveh->vhactual           = '1';
                $personveh->save();
            }
            
            //Luego de asignar a la persona como nuevo propietario estado 1, colocamos a la persona anterior como no propietario en estado 0
            $vhactual = PersonaVehiculo::where('placa', $placa)->where('identificacion','<>', $request->identificacion)->update([
                'vhactual' => '0'
            ]);

            flash('Vehiculo '.$placa.' asignado a su nuevo propietario '.$request->identificacion.' satisfactoriamente')->success();
            return redirect()->route('personas.index');

        }else{
            flash('Vehiculo '.$placa.' no fue reasignado, esta persona ya es el propietario(a) del vehiculo')->error();
            return redirect()->route('personas.index');
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($persona,$placa)
    {
        $Personavehi = DB::table('personasvehiculos')
                ->join('personas', 'personas.identificacion', '=', 'personasvehiculos.identificacion')
                ->join('vehiculos', 'vehiculos.placa', '=', 'personasvehiculos.placa')
                ->select('personasvehiculos.*', 'personas.*', 'vehiculos.*')
                ->where('personasvehiculos.identificacion', '=', $persona)
                ->where('personasvehiculos.placa', '=', $placa)
                ->get();
        $Personavehic = $Personavehi[0];
        $Persona = Persona::all();
        return view('personas.personasvehiculos.edit')->with('Personavehic', $Personavehic)->with('Persona', $Persona);
    }
}
