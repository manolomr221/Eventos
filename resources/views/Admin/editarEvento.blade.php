@extends('layouts.app')
@section('content')

<link href="/css/bootstrap.min.css" rel="stylesheet">

    <div class="container-fluid" >
      <div class="row">
        <div class=" col-md-2 sidebar"    style="background-image: url('https://i.pinimg.com/originals/7b/b5/1b/7bb51b73896ba29e6a76d6e3faf3f290.jpg')">
          
          <ul class="nav ">
          <li  ><a style="margin-top:30px; font-size:18px; color:white" href="{{ url('/home') }}">Registrar Evento</a></li>
          <li ><a style="margin-top:20px; font-size:17px; color:white" href="{{ url('/eventos') }}">Eventos Registrados</a></li>
        
          </ul>
         
        </div>
        <div class="col-md-8 offset-md-1 " >
         <div class="offset-md-">
             <br>
         <div class="panel panel-primary">
                <div class="panel-heading text-center">
                   Editar Evento
                </div>
                <div class="panel-body">
                <form action="/Admin/evento/{{$eventos->id}}/guardarCambios" method="POST"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$eventos->nombre}}" name="nombre" >
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="exampleFormControlTextarea1"  class="col-sm-2 control-label">Descripcion</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$eventos->descripcion}}" name="descripcion"   rows="3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control" value="{{$eventos->fecha}}" name="fecha" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Imagen Actual</label>
                            <img class="imagenUsuario" style="width:60% ;height:500px; margin-left"  src="{{ asset( 'uploads/'.$eventos->foto)}}" alt="Imagen Usuario">                    
                        </div>
                       
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nueva Imagen Evento</label>
                            <div class="col-sm-10">
                            <input  name="foto" type="file"  lang="es">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                            <input  value="{{$eventos->foto}}" name="fotoActual" type="hidden"  lang="es">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">categoria</label>
                            <div class="col-sm-10">
                                <select required class="form-control" name="categoria">
                                <option value="">Selecciona una categoria</option> 
                                <option value="academico" >academico</option>
                                <option value="cultural">cultural</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Lugar</label>
                            <div class="col-sm-10">
                            <input type="text" value="{{$eventos->lugar}}" class="form-control"  name="lugar" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">costo</label>
                            <div class="col-sm-10">
                            <input type="number" value="{{$eventos->costo}}" class="form-control" name="costo" >
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button id="guardarCambios" type="submit" class="btn btn-success form-control" >Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         </div>
      </div>
    </div>

  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
    <script src="/js/bootstrap.min.js"></script>
    


@endsection
