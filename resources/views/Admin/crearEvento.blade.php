@extends('layouts.app')

@section('content')
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
 
    <link href="/css/bootstrap.min.css" rel="stylesheet">

<section id="content">
   

    
    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                   Crear Evento
                </div>
                <div class="panel-body">
                <form action="/Admin/registrar/evento" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombre" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripcion</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="descripcion" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Fecha</label>
                            <div class="col-sm-10">
                            <input type="datetime-local" class="form-control" name="fecha" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Imagen Evento</label>
                            <div class="col-sm-10">
                            <input type="file" class="form-control" name="foto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">categoria</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="categoria" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Lugar</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control"  name="lugar" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">costo</label>
                            <div class="col-sm-10">
                            <input type="number" class="form-control" name="costo" >
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
  </section>

@endsection
