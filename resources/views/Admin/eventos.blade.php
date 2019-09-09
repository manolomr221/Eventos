@extends('layouts.app')

@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" /> <!--Se necestia este metadato para poder hacer AJAX, se envia el csrf_token al server para validar que si existe la sesion -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
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
    /*----- Nav Superior -----*/
    .navsup{
        height: 55px;
        background: #263238;
    }
    .imglogo{
        position: absolute;
        left: 0px;
        width: 5%;
        top: -3px;
    }
    .logo{
        color: #fff;
        font-size: 20px;
        font-family: 'Anton', sans-serif;
        letter-spacing: 3px;
        padding-top: 12px;
        padding-left: 70px;
    }
    .log{
        color: #06bb84;
        font-family: 'Anton', sans-serif;
        text-align: center;
    }
    /*----- Buscador -----*/
    .buscador{
        padding-top: 10px;
    }
    /*----- Banner -----*/
    .profesor{
        color: #06bb84;
        font-family: 'Anton', sans-serif;
        letter-spacing: 2px;
        font-size: 70px;
    }
    /*----- Iconos -----*/
    .iconpencil{
        color: #5cb85c;
        border-color: #4cae4c;
    }
    .icondelete{
        color: #d9534f;
        border-color: #d43f3a;
    }
    /*----- Menu -----*/
    @media (min-width: 768px) {
        .sidebar-nav .navbar .navbar-collapse {
            padding: 0;
            max-height: none;
        }
        .sidebar-nav .navbar ul {
            float: none;
        }
        .sidebar-nav .navbar ul:not {
            display: block;
        }
        .sidebar-nav .navbar li {
            float: none;
            display: block;
        }
        .sidebar-nav .navbar li a {
            padding-top: 12px;
            padding-bottom: 12px;
        }
            }
</style>
<meta name="csrf_token" content="{{ csrf_token() }}" /> <!--Se necestia este metadato para poder hacer AJAX, se envia el csrf_token al server para validar que si existe la sesion -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <div class="col-sm-9">
        <div>
            <p class="profesor">eventos</p>
        </div>
        <div>
            <div class="col-sm-8 buscador">
                <div class="input-group">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Buscar</button>
                    </span>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thread>
                            <tr>
                                <th>#</th>
                                <th>nombre</th>
                                <th>descripcion</th>
                                <th>fecha</th>
                                <th>categoria</th>
                                <th>Eliminar</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thread>
                        <tbody>
                            @foreach($eventos as $evento)
                                <tr>
                                    <th>{{$evento->id}}</th>
                                    <th>{{$evento->nombre}}</th>
                                    <th>{{$evento->descripcion}}</th>
                                    <th>{{$evento->fecha}}</th>
                                    <th>{{$evento->categoria}}</th>
                                    <th><i class="fa fa-trash" aria-hidden="true" value="{{$evento->id}}" style="font-size:48px;color:red"></i></th>
                                    <th><i class="fa fa-pencil-square" aria-hidden="true" value="{{$evento->id}}" style="font-size:48px;color:orange"></i></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
</script>
@endsection