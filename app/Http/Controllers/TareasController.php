<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $tarea->creada_por = Auth::user()->name;
        $tarea->save();
        return redirect('/tareas');
    }
    function index(){
        $tareas = Tarea::all();
        return view('listado',compact('tareas'));
    }
    function cambiar($id){
        $tarea = Tarea::findOrFail($id);
        $user =  Auth::user();
        if($tarea->estado=='1'){
            $tarea->estado ='0';
            //tengo que quitar los puntos al usuario si no se ha resuelto y ponerla a null
            $user = User::findOrFail($tarea->resuelve);
            $tarea->resuelve = null; 
             if($tarea->prioridad ==="urgente"){
                $user->points-=3;
             }else if($tarea->prioridad==="alta"){
                $user->points-=2;
               
             }else{
                $user->points-=1;
             }

        }else{
             $tarea->estado ='1';
             if($tarea->prioridad ==="urgente"){
                $user->points+=3;
             }else if($tarea->prioridad==="alta"){
                $user->points+=2;
               
             }else{
                $user->points+=1;
             }
             $tarea->resuelve = $user->name;


        }
        $user->save();
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
