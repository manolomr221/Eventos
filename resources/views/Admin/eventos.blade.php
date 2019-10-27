@extends('layouts.app')

@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" /> <!--Se necestia este metadato para poder hacer AJAX, se envia el csrf_token al server para validar que si existe la sesion -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<div class="container-fluid" >
  <div  class="row" style="height:650px;">
  <div class=" col-md-2 sidebar"    style="background-image: url('https://i.pinimg.com/originals/59/71/b6/5971b6ff0f900f92d27a64cec0c7f2ab.jpg')">
        <ul class="nav ">
        <li  ><a style="margin-top:30px; font-size:18px; color:white" href="{{ url('/home') }}">Registrar Evento</a></li>
        <li ><a style="margin-top:20px; font-size:17px; color:white" href="{{ url('/eventos') }}">Eventos Registrados</a></li>
        </ul>   
    </div>
    <div class="col-md-4" style="">
        <div class="text-center title">Eventos</div>
            <div  style="background:" class="col-md-10 ">
                <div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="text" class="form-control" id="texto" placeholder="Ingrese nombre">
                            <div class="input-group-append"><span class="input-group-text">Buscar</span></div>
                        </div>
                        <div id="resultados" class="bg-light border"></div>
                    </div>
                </div>
                <br>

                <div style="background:none"  class="row" id="datos">
                    @if (count($eventos))
                        <table class="table table-striped">
                            <thead>  
                            <tr>
                                <th>#</th>
                                <th>nombre</th>
                                <th>descripcion</th>
                                <th>fecha</th>
                                <th>categoria</th>
                                <th>lugar</th>
                                <th>costo</th>
                                <th>Eliminarr</th>
                                <th>Editar</th>
                                <th></th>
                            </tr>
                            </thead>
                        <tbody>
                        
                            @foreach($eventos as $evento)
                                <tr>
                                    <th>{{$evento->id}}</th>
                                    <th>{{$evento->nombre}}</th>
                                    <th>{{$evento->descripcion}}</th>
                                    <th>{{$evento->fecha}}</th>
                                    <th>{{$evento->categoria}}</th>
                                    <th>{{$evento->lugar}}</th>
                                    <th>{{$evento->costo}}</th>
                                    <th><i class="fa fa-trash" aria-hidden="true" value="{{$evento->id}}" style="font-size:48px;color:red"></i></th>
                                    <th><i class="fa fa-pencil-square" aria-hidden="true" value="{{$evento->id}}" style="font-size:48px;color:orange"></i></th>
                                </tr>
                            @endforeach
                            
                        </tbody>
                        </table>
                    @else
                        <table class="table table-hover" id="registros">
                        <thead>  
                                <tr>
                                    <th>#</th>
                                    <th>nombre</th>
                                    <th>descripcion</th>
                                    <th>fecha</th>
                                    <th>categoria</th>
                                    <th>Eliminarr</th>
                                    <th>Editar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>No hay registros</th>   
                                </tr>

                            </tbody>
                        </table>

                    @endif
   
            </div>
        </div>
    </div>
</div>

<!-- modal seguridad eliminar evento-->
<div class="modal fade" id="eliminarEvento" tabindex="-1" role="dialog" aria-labelledby="Eliminar Evento">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
           <p class="lead" style="text-align:center;">¿Estas seguro de eliminar éste Evento?</p>
      </div>
      <div class="modal-footer">
        <form method="POST" action="" id="eliminarEvento">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger" style="width:240px;">SI</button>
        </form>
        <button type="button" class="btn btn-success" style="width:50%;" data-dismiss="modal">NO</button>
      </div>
    </div>
  </div>
</div>

<script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>
 $(document).ready(function(){
        $('i.fa-pencil-square').click(function(){
           window.location.href = '/Admin/evento/'+$(this).attr('value')+'/editar';
        });
         $('i.fa-trash').click(function(){
           
           $('#eliminarEvento').modal('show');
           $('form#eliminarEvento').attr('action','/Admin/evento/'+$(this).attr('value')+'/eliminar');
         });
    });



    window.addEventListener('load',function(){
        document.getElementById("texto").addEventListener("keyup", function(){
            console.log(document.getElementById("texto").value)
            if((document.getElementById("texto").value.length)>=1)
               {
                fetch(`/eventos/buscador?texto=${document.getElementById("texto").value}`,{
                    method:'get'
                })
                .then(response  =>  response.text() )
                .then(html      =>  {   document.getElementById("resultados").innerHTML = html  })
             var  element= document.getElementById("datos")
            element.style.display = 'none'
               }
              
            else
               {
                if((document.getElementById("texto").value.length)==0 || document.getElementById("texto").value ===""){
                 
                 document.getElementById("datos").style.display=""
                 
                document.getElementById("resultados").innerHTML = "";
                }
                //document.getElementById("resultados").innerHTML = $reg
               }
        })
    });  
</script>


@endsection