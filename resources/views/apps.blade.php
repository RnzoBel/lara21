
@extends('adminlte::page')

@section('title', 'Mi Perfil')

@section('content_header')
    <h1>Aplicativos Municipales</h1>
@stop


@section('content')
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

<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            @foreach ($aplicaciones as $aplicacion)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>{{$aplicacion->appnombre}}</b></h2>
                        <p class="text-muted text-sm"><b>Descripciónn: </b> {{$aplicacion->apdesc}} </p>
                        
                    </div>
                    <div class="col-5 text-center">
                        <img class="loguitos" src="{{'../../img/'.$aplicacion->idaplicacion.'.png'}}" alt="Lanzar aplicacion Municipal">
                        
                    </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                    @if($aplicacion->getAgregada->count() > 0 )
                        @foreach ($aplicacion->getAgregada as $item)
                        
                            @if($item->estado == 1)
                                <a href="#" class="btn btn-sm btn-primary disabled" >
                                    <i class="fas fa-user"></i> Agregada
                                </a>
                            @endif
              
                        @endforeach
                          @else 
                            <a href="{{route('auth.setAppUsu', [$aplicacion->idaplicacion])}}" class="btn btn-sm btn-primary">
                                <i class="fas fa-user"></i> agregar
                            </a>
                          @endif
                    </div>
                </div>
                </div>
            </div>
            @endforeach
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
