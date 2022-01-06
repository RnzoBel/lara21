
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Hola, {{Session::get('Contribuyente')}}</h1>
@stop

@section('content')
<div class="row">
<div class="col-md-8 col-lg-8">
        @if (Session::has('success'))
        <div class="card card-success">
            <div class="card-header">
                <h1 class="card-title"> <li>{!! Session::get('success') !!}</li></h1>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        
        @endif  
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h1 class="card-title">Mis Aplicativos.</h1>            
            <div class="card-tools">
                <a href="{{route('showapps')}}" class="btn btn-block btn-outline-primary btn-sm">Agregar Aplicativos</a>
                <span class="badge badge-info" ></span>
            </div>
        </div>
            
        
        <div class="card-body"> 

           



                @if ($permisos->count() > 0)
            @foreach ($permisos as $item)
            <a target="_blank" href="{{route('auth.setTrabajaServyApp', [$item->idaplicacion])}}" class="card-link">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">{{$item->getAplicacion->appnombre}}</h5><br>
                        <img class="img-responsive" src="{{'img/'.$item->idaplicacion.'.png'}}" width="90" height="90" alt="Lanzar aplicacion Municipal"><br>
                    </div>
                </div>
              </div>
            </a>

                <div class="col-md-4"> 
                    <a target="_blank" href="{{route('auth.setTrabajaServyApp', [$item->idaplicacion])}}" class="urlapps">
                        <span class="img-container">
                            <!--LA IMAGEN DEBE ESTAR GUARDADA CON EL ID COMO NOMBRE EN LA CARPETA IMG -->
                           <img class="img-responsive" src="{{'img/'.$item->idaplicacion.'.png'}}" width="90" height="90" alt="Lanzar aplicacion Municipal">
                           
                        </span>
                        <p>{{$item->getAplicacion->appnombre}}</p>   
                    </a>  
                </div>
            @endforeach
            @else
            <span>no tiene aplicativos agregados</span>
            @endif
        
        </div>
    </div>
</div>
<div class="col-md-4 col-lg-4" >
    <div class="card card-outline card-danger">
        <div class="card-header">
            <h1 class="card-title">Avisos.</h1>
        </div>
        <div class="card-body">
           <p class="">sada</p>          
        </div>
    </div>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
