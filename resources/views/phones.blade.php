
@extends('adminlte::page')

@section('title', 'Telefonos Utiles')

@section('content_header')
    <h1>Hola, {{Session::get('Contribuyente')}}</h1>
@stop

@section('content')
<div class="row">
<div class="col-md-12 col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h1 class="card-title">Telefonos Utiles.</h1>            
        </div>     
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <h1><i class="fas fa-phone"></i></h1>
                </div>
                <div class="col-md-5 col-lg-5">
                    <h1>0800-555-055</h1>
                </div>
                <div class="col-md-5 col-lg-5">
                    <h1>Resistencia Responde</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <h1><i class="fas fa-phone"></i></h1>
                </div>
                <div class="col-md-5 col-lg-5">
                    <h1>3624 - 458201</h1>
                </div>
                <div class="col-md-5 col-lg-5">
                    <h1>Informes</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <h1><i class="fas fa-phone"></i></h1>
                </div>
                <div class="col-md-5 col-lg-5">
                    <h1>3624 - 458200</h1>
                </div>
                <div class="col-md-5 col-lg-5">
                    <h1>Habilitaciones Comerciales</h1>
                </div>
            </div>
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
