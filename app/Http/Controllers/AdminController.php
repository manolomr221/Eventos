<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/Admin/registrar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function eventos(){
        $eventos = DB::table('eventos')->select('*')->get();
       return view('/Admin/eventos',['eventos'=>$eventos]);
    }

     public function crearEvento(Request $request){
         DB::table('eventos')->insert([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha' =>$request->fecha,
            'foto' => $request->foto,
            'categoria' => $request->categoria,
        ]);
     
        return redirect()->route('eventos');
     }

     
}