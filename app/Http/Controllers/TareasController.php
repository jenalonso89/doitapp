<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareasController extends Controller
{
    //
    function init(){
         return view('init');
    }
    function create(Request $request){
        $tarea = new Tarea();
        $tarea->nombre = $request->nombre;
        $tarea->prioridad = $request->prioridad;
        $tarea->estado = $request->estado;
        $tarea->save();
        return redirect('/tareas');
    }
    function index(){
        $tareas = Tarea::all();
        return view('listado',compact('tareas'));
    }
    function cambiar($id){
        $tarea = Tarea::findOrFail($id);
        if($tarea->estado=='1'){
            $tarea->estado ='0';
        }else{
             $tarea->estado ='1';
        }
        $tarea->save();
        return redirect('/tareas');
    }
    function  editar($id){
        $tarea = Tarea::findOrFail($id);
        return view('edit',compact('tarea'));
    }
    function  update(Request $request, $id){
        $tarea = Tarea::findOrFail($id);
        $tarea->nombre = $request->nombre;
        $tarea->prioridad = $request->prioridad;
        $tarea->estado = $request->estado;
        $tarea->save();
        return redirect("/tareas");
    }
    function delete($id){
        $tarea = Tarea::findOrFail($id);
        if($tarea->estado=='1'){
            $tarea->delete();
            return redirect("/tareas");
        }else{
            return redirect()->back()->with('error', 'La tarea no esta completada.');
        }
    }
}
