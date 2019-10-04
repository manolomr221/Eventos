<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
        $eventos = DB::table('eventos')->paginate(15);
       return view('/Admin/eventos',['eventos'=>$eventos]);
    }

     public function crearEvento(Request $request){
         if($request->hasFile('foto')){
             $file = $request->file('foto');
             $namefile= time().$file->getClientOriginalName();
             $file->move(public_path().'/uploads/',$namefile);
             
             DB::table('eventos')->insert([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha' =>$request->fecha,
                'foto' => $namefile,
                'categoria' => $request->categoria,
                'lugar' => $request->lugar,
                'costo' => $request->costo,
            ]);
         
            return redirect()->route('eventos');
         }else{
            DB::table('eventos')->insert([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'fecha' =>$request->fecha,
                'foto' => $request->foto,
                'categoria' => $request->categoria,
                'lugar' => $request->lugar,
                'costo' => $request->costo,
            ]);
         
            return redirect()->route('eventos');
         }
     
     }

     public function eliminarEvento(Request $request, $id)
     {
         DB::table('eventos')->where('id',$id)->delete();
          return redirect()->action('AdminController@eventos');
     }

     //funciones para editar eventos editarEvento, guardarCambiosEvento
     public function editarEvento(Request $request, $id)
     {
        $evento= DB::table('eventos')->select('*')->where('id', $id)->first();    
        return view('/Admin/editarEvento')->with('eventos',$evento);      
    }    
    public function guardarCambiosEvento(Request $request, $id)
    {
        if($request->fechaNueva == null || $request->fechaNueva == "")
        {
            DB::table('eventos')->where('id',$id)->update([
                'nombre' => $request->nombre,
                'descripcion'  => $request->descripcion,
                'fecha' => $request->fecha,
                'categoria'   => $request->categoria,
                'lugar' => $request->lugar,
                'costo' => $request->costo,
                ]);
                $evento = DB::table('eventos')->select('*')->where('id',$id)->first();
                return redirect()->action('AdminController@eventos');
        }
        else
        {
            DB::table('eventos')->where('id',$id)->update([
                'nombre' => $request->nombre,
                'descripcion'  => $request->descripcion,
                'fecha' => $request->fechaNueva,
                'categoria'   => $request->categoria,
                'lugar' => $request->lugar,
                'costo' => $request->costo,
                ]);
                $evento = DB::table('eventos')->select('*')->where('id',$id)->first();
                return redirect()->action('AdminController@eventos');
        }    
    }

    public function guardarImagen(Request $request, $id)
    {   
        /**
        * Aqui se hace la validacion de imagen
        *
        * Solo permite jpeg,png,jpg,bmp,tiff y gif
        *
        **/
        $this->validate($request, [
        'imagen' => 'mimes:jpeg,png,bmp,tiff |max:4096',
        ],
        $messages = [
            'required' => 'The :attribute field is required.',
            'mimes' => 'Solo se permiten imagenes en este campo. jpeg, png, bmp,tiff son formatos validos.'
        ]
        );
        
        /**
        * Aqui se hace la insercion a la BD y a la carpeta public/uploads
        *
        * En el .gitignore omitimos los cambios a esta carpeta
        *
        **/     
        $direccionImagen=base_path().'/public/uploads/';        
        $IMAGEN = "";
        if($request->hasFile('imagen'))
        {
            $IMAGEN = $request->file('imagen')->getClientOriginalName();
            $request->file('imagen')->move($direccionImagen, $IMAGEN);
        }else{
            $nombreImagen = NULL;
        }
        DB::table('users')->where('id',$id)->update([
            'foto' => $IMAGEN,            
        ]);           
        $info = DB::table('eventos')->select('*')->where('id',$id)->first();         
        return redirect()->action('AdminController@infoEvento',['id'=>$id]);
    }


    public function infoEvento(Request $request, $id){        
        $info = DB::table('eventos')->where('id',$id)->first();     
        return view('/info/evento',['info'=>$info]);       
    }

    //ultimo agregado
    public function buscador(Request $request){
        $eventos = DB::table('eventos')->where("nombre",'like',   '%'.$request->texto.'%'   )->take(10)->get();
        return view("Admin.paginas",compact("eventos"));        
    }

    public function paginacion(Request $request){
        $eventos = DB::table('eventos')->paginate(15);
    //return view('/Admin/eventos',['eventos'=>$eventos]);
        return view("Admin.paginas",compact("eventos"));        
    }
     
    public function welcome(){
        $eventos = DB::table('eventos')->orderBy('fecha', 'desc')
        ->get();
       return view('welcome',['eventos'=>$eventos]);
    }

    public function eventosAcademicos(){
        $eventos = DB::table('eventos')->where('categoria','academico')->get();
       return view('/usuario/academicos',['eventos'=>$eventos]);
    }

    public function verEvento(Request $request, $id)
    {
       $evento= DB::table('eventos')->select('*')->where('id', $id)->first();    
       return view('/usuario/verEvento')->with('eventos',$evento);      
   }    


}