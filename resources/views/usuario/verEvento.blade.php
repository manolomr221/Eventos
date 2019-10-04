@extends('layouts.app')

@section('content')
<section id="content">
   
    <div class="container">
        <div class="row">
         <!--   <div class="col-md-4"></div> -->
            <div class="col-md-8 offset-md-2 ">
                    
            <div class="card">
                <div class="card-header text-center bg-info   "><strong>Editar Evento</strong></div>
                <form class="form-horizontal" action="/Admin/evento/{{$eventos->id}}/guardarCambios" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="nombreEvento">Nombre del Evento</label>
                        <input type="text" value="{{$eventos->nombre}}" name="nombre"  class="form-control " id="nombreEvento">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion"  value="{{$eventos->descripcion}}" rows="3">
                    </div>

                    <div class=" form-group custom-file">
                     <div class="row">
                   </div>    
                   <img class="imagenUsuario" src="{{ asset( 'uploads/'.$eventos->foto)}}" alt="Imagen Usuario">                    
                       
                    </div>

                    <div class=" form-group custom-file">
                        <input  value="{{$eventos->foto}}"type="file"  lang="es">
                       
                    </div>
                    
                    <div class="row">
                    <div class="col-md-6 ">
                    <label for="exampleFormControlInput1">fecha actual del Evento</label>
                        <input type="datetime" readonly value="{{$eventos->fecha}}" class="form-control"  name="fecha" id="exampleFormControlInput1" >
                    </div>
                    <div class="col-md-6">
                            <label for="exampleFormControlInput1">Nueva fecha del Evento</label>
                            <input type="date"   name="fechaNueva" class="form-control" id="exampleFormControlInput1" >
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlInput1">Categoria del Evento</label>
                            <input type="text"  value="{{$eventos->categoria}}" name="categoria" class="form-control" id="exampleFormControlInput1" >
                        </div>
                    </div> <br>
                   
                    <div class="form-group">
                        <button type="submit" class="col-md-6 offset-md-3 btn btn-success">Submit</button>
                    </div>
                   
                </form>
                <div class="card-body">
                   
                </div>
            </div>
              
            </div>
        </div>
    </div>
  </section>

@endsection
