@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/vanilla-calendar.css" />
    <script  type="text/javascript" src="/js/vanilla-calendar.js"> </script>
    <script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
   <style>
    .contenedor
      {
          position: relative;
          display: inline-block;
          text-align: center;
      }
      .texto-encima
      {
          position: absolute;
          top: 10px;
          left: 10px;
      }
   </style>   
  <div class="container all" style="background: none">
    <div class="row" style="background: none">
      <div class="col-md-4" style="background: none">
        <h2 style="font-size:20px; text-align:center">Fecha acutal</h2>
        <div id="myCalendar" class="vanilla-calendar" style="margin-bottom: 20px"></div>
      </div>
      <div class="col-md-8" style="background: none; width:100%;">
        <h2 style="text-align:center">Eventos para hoy:</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          
            <!-- Wrapper for slides -->
          <div class="carousel-inner">
         
            
          @if(count($eventos))
          <div class="item active">
           
           <a > <center> <img  src="http://www.buap.mx/sites/default/files/styles/slider_general/public/slider-carbonesact.png?itok=x2ueVXoy"style="width:100%; height:500px;"></center></a>
           <div class="carousel-caption">
               <h3 style="color:red">Bienvenido</h3>
               <p style="color:red">Estos son los eventos del dia</p>
           </div>
       </div>
            @foreach($eventos as $evento)
            
            <div class="item">
            <div class="carousel-caption">
                  <h3 style="color:black">{{$evento->nombre}}</h3>
                  <p>{{$evento->lugar}}</p>
              </div>
              <a href="/evento/{{$evento->id}}/ver"> <center> <img  src="/uploads/{{$evento->foto}}" alt="{{$evento->nombre}}" style="width:100%; height:500px;"></center></a>
              
            </div>
            @endforeach
            @else
            <div class="item active">
              <a > <center> <img  src="https://cdn.dribbble.com/users/1676373/screenshots/4177728/404.gif"  style="width:100%; height:500px;"></center></a>
              <div class="carousel-caption">
                  <h3 style="color:white">No hay eventos para este dia</h3>
                
              </div>
            </div>
           
            @endif

          </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div> <!-- fin carrousel -->
      </div>
    </div>
</div>
<script src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
      let pastDates = true, availableDates = false, availableWeekDays = false
      let calendar = new VanillaCalendar
      ({
          selector: "#myCalendar",
          months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          shortWeekday: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vier', 'Sáb'],
          onSelect: (data, elem) => 
          {
              console.log(data, elem)
          }
      })          
</script>
@endsection