@extends('layouts.app')

@section('content')
<section id="content">
   
    <div class="container">
        <div class="row">
         <!--   <div class="col-md-4"></div> -->
            <div class="col-md-8 offset-md-2 ">
                    
            <div class="card">
                <div class="card-header text-center bg-info   "><strong>Registrar Evento</strong></div>
                <form action="/Admin/registrar/evento" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="nombreEvento">Nombre del Evento</label>
                        <input type="text" required="" name="nombre" class="form-control " id="nombreEvento" placeholder="co co co co como se llama esta mierda">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descripcion</label>
                        <textarea class="form-control" required="" name="descripcion" id="exampleFormControlTextarea1" placeholder="de que se trata esta mierda?" rows="3"></textarea>
                    </div>
                    <div class=" form-group custom-file">
                        <input required="" type="file"  lang="es">
                       
                    </div>
                    
                    <div class="row">
                    <div class="col-md-6 ">
                    <label for="exampleFormControlInput1">fecha del Evento</label>
                        <input type="date" required="" class="form-control"  name="fecha" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                        <div class="col-md-6">
                            <label for="exampleFormControlInput1">Categoria del Evento</label>
                            <input type="text"  required="" name="categoria" class="form-control" id="exampleFormControlInput1" placeholder="Categoria de Esta Mamada">
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
