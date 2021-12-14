
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
            <ul class="aplicativos">
            @foreach ($permisos as $item)
                <li class="col-4"> 
                    
                    <a target="_blank" href="{{route('auth.setTrabajaServyApp', [$item->idaplicacion])}}" class="urlapps">
                        <span class="img-container">
                            
                            <img class="ImgLogos" src="{{'img/'.$item->idaplicacion.'.png'}}" alt="Lanzar aplicacion Municipal">
                        </span>
                        <span><p>{{$item->getAplicacion->appnombre}}</p></span>
                    </a>  
                </li>
            @endforeach
        </ul>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
