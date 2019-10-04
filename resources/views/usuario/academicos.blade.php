@extends('layouts.app')

@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" /> <!--Se necestia este metadato para poder hacer AJAX, se envia el csrf_token al server para validar que si existe la sesion -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    @import url('http://fonts.googleapis.com/css?family=Julius+Sans+One');
    @import url('https://fonts.googleapis.com/css?family=Anton');
    body{
        padding: 0;
        margin: 0;
    }
    .margen{
        padding: 0;
        margin: 0;
    }
    .title{
        font-size: 20px;
    }
</style>

<div id="tour" class="bg-1">
  <div  class="container">
    <div class="col-md-12">
        <div class="text-center title">Eventos</div>
            <div  style="background:" class="col-md-10 offset-md-1">
                <div>
                    <div class="col-10">
                        <div class="input-group">
                            <input type="text" class="form-control" id="texto" placeholder="Ingrese nombre">
                            <div class="input-group-append"><span class="input-group-text">Buscar</span></div>
                        </div>
                        <div id="resultados" class="bg-light border"></div>
                    </div>
                </div>
                <br>
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
                <div style="background:none"  class="row" id="datos">
                    @if (count($eventos))
                        <table class="table table-striped">
                            <thead>  
                            <tr>
                                <th>#</th>
                                <th>Foto</th>
                                <th>nombre</th>
                                <th>fecha</th>
                               
                            </tr>
                            </thead>
                        <tbody>
                        
                            @foreach($eventos as $evento)
                                <tr>
                                    <th>{{$evento->id}}</th>
                                    <th> <a href="/comecaca"> <img style="height:120px; width:100px" src="/uploads/{{$evento->foto}}" alt="{{$evento->nombre}}" style="width:100%;"></a></th>
                                    <th>{{$evento->nombre}}</th>
                                    <th>{{$evento->fecha}}</th>
                                   
                                
                                   <br> <br>
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
                                    <th></th>
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







<script>


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