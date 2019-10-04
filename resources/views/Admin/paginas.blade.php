@if (count($eventos))

        <table class="table table-hover" id="registros">
                        <thread>
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
                    @else
                    <table class="table table-hover" id="registros">
                        <thread>
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
                        </thread>
                        <tbody>
                        
                           
                                <tr>
                                    <th>No hay registros</th>
                                   
                                </tr>
                          
                            
                        </tbody>
                    </table>
                    

@endif
