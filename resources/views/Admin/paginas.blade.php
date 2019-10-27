<section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
      @if (count($eventos))
      @foreach($eventos as $evento)
        <div class="col-md-4 col-sm-6 portfolio-item" style="border-left: 2px solid orange;">
          <a class="portfolio-link" data-toggle="modal" href="#evento{{$evento->id}}">
            <div class="portfolio-hover">
              <div class="portfolio-hover-content" >
                
              </div>
            </div>
            <img class="img-fluid" style="width:80%;height:80%;" src="/uploads/{{$evento->foto}}" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>{{$evento->nombre}}</h4>
            <p class="text-muted">{{$evento->descripcion}}</p>
            <br>
          </div>
         
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
