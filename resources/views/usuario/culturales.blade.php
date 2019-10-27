@extends('layouts.app')
@section('content')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<style>
img{

}
.ima:hover {
  -webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    -ms-transform: scale(1.2);
    transform: scale(1.2)
}


</style>
  <!-- Eventos  -->
  <section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Eventos Academicos</h2>
          <div class="input-group">
              <input type="text" class="form-control" id="texto" placeholder="Ingrese nombre">
              <div class="input-group-append"><span class="input-group-text">Buscar</span></div>
          </div>
          <div id="resultados" class="bg-light border"></div>
          <br>
        </div>
      </div>
      <div class="row">
      @if (count($eventos))
      @foreach($eventos as $evento)
      <div class="col-md-4 col-sm-6 portfolio-item" style="border-left: 2px solid orange;">
          <a class="portfolio-link" data-toggle="modal" href="#evento{{$evento->id}}">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content" >
                
              </div>
            </div>
            <img class="portafolio-img ima" style="width:80%;height:80%;" src="/uploads/{{$evento->foto}}" alt="">
          </a>
          <div class="portfolio-caption">
            <p  class="portafolio-text">{{$evento->nombre}}</p>
            <p class="text-muted" style="word-wrap: break-word;">{{$evento->descripcion}}</p>
          </div>
          <br>
        </div>
          <!-- Modal -->
          <div class="portfolio-modal modal fade"  style="background-image:url('http://vinculacion.cs.buap.mx/wp-content/uploads/2017/06/8.jpg');background-position: center;" id="evento{{$evento->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" >
      <div class="modal-content" style="background:#e0ebeb">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <div class="modal-body">
                <!--  Detalles -->
                <h4 class="text-uppercase" style="text-align:center" >Informacion de evento</h4>
                <img class="img-fluid d-block mx-auto" style="width:100%;height:80%; border: 2px solid orange;border-radius: 12px;"  src="/uploads/{{$evento->foto}}" alt="">
                <h4 class="item-intro" style="text-align:center">{{$evento->nombre}}</h4>
                <p>{{$evento->descripcion}}</p>
                <ul class="list-inline">
                  <li>Categoria: {{$evento->categoria}}</li>
                  <li>Lugar: {{$evento->lugar}}</li>
                  <li>Fecha: {{$evento->fecha}}</li>
                  <li>Costo: {{$evento->costo}}</li>
                </ul>
                <button class="btn btn-primary col-md-12" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        @endforeach
        @else
        <div class="col-md-8 offset-2 col-sm-12 portfolio-item">
          <a class="portfolio-link" data-toggle="modal">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content">
              <h4 class="text-center">Error 404: No hay Eventos Registrados</h4> 
              </div>
            </div>
            <img class="img-fluid" style="width:100%;height:80%;" src="https://media2.giphy.com/media/xU9TT471DTGJq/giphy.gif" alt="">
          </a>
          <div class="portfolio-caption">
            <p class="text-muted"></p>
          </div>
        </div>
        @endif
      </div>
    </div>
  </section>

  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="/js/jqBootstrapValidation.js"></script>
  <script src="/js/contact_me.js"></script>
  <script src="/js/agency.min.js"></script>             
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