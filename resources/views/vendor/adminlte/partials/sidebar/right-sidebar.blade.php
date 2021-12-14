<aside class="control-sidebar control-sidebar-dark" style="overflow: auto;">
    @yield('right-sidebar')
     <center><h4 class="mt-4">  Aplicativos Municipales</h4></center>
     <br>
     @foreach ($aplicaciones as $aplicacion)
     
     <div class="row apps">  
      <div class="col-md-4">
        <img class="loguitos" src="{{'img/'.$aplicacion->idaplicacion.'.png'}}" alt="Lanzar aplicacion Municipal">
        @if($aplicacion->getAgregada->count() > 0 )
          @foreach ($aplicacion->getAgregada as $item)
            @if($item->estado == 1)
              <center><span class="badge badge-info" >agregada</span></center>
             
              
            @endif
              
          @endforeach
        @else 
          <a href="{{route('auth.setAppUsu', [$aplicacion->idaplicacion])}}" ><center><span class="badge badge-primary" >agregar</span></center></a>
        @endif
      </div>
      <div class="col-md-8">
        <h5>{{$aplicacion->appnombre}}</h5>
        <p>{{$aplicacion->apdesc}}</p>
      </div>
    </div>
    @endforeach
    <footer>
      {{ $aplicaciones->links() }}
    </footer>
    
 <!-- /.control-sidebar -->
</aside>
