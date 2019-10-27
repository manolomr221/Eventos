@extends('layouts.app')

@section('content')
<section id="content">
 <div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="background: blue">
          <div class="col-md-12">
            {{$eventos->categoria}}
          </div>
        </div>
        <div class="col-md-10">
           <div class="container">
                <img class="imagenUsuario" style="width:100% ;height:500px; margin-left"  src="{{ asset( 'uploads/'.$eventos->foto)}}" alt="Imagen Usuario"> 
           </div>
           <div class="container" style="background: pink">
                <div class="card">
                Nombre:
                {{$eventos->nombre}}
                </div>
                <div class="card">
                descripcion:
                {{$eventos->descripcion}}
                </div>
                <div class="card">
                lugar:
                {{$eventos->lugar}}
                </div>
           </div>
        </div>
    </div>
 </div>   
</section>

@endsection
