
@extends('adminlte::page')

@section('title', 'Mi Perfil')

@section('content_header')
    <h1>Mi Perfil</h1>
@stop
@section('content')
<div class="row">
  <!--CARD HEADER-->
  <div class="card card-primary card-outline card-outline-tabs">
    <div class="card-header p-0 border-bottom-0">
      <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="user-profile-tab" data-toggle="pill" href="#user-profile" role="tab" aria-controls="user-profile" aria-selected="true">Perfil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="user-level-tab" data-toggle="pill" href="#user-level" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Nivel de acceso</a>
        </li>
      </ul>
    </div>
    <!--BODY-->
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-three-tabContent">
        <div id="user-profile" class="tab-pane fade active show"  role="tabpanel" aria-labelledby="user-profile-tab">
          <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="card">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle" src="/img/avatar-user.png" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{$Usuario->getContribuyente->cntnombre}}</h3>
                        <p class="text-muted text-center">{{$Usuario->usu_cntcuit}}</p>        
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            Contribuyente: <b> {{$Usuario->getContribuyente->cntnombre}}</b> 
                          </li>
                          <li class="list-group-item">
                            CUIT: <b> {{$Usuario->usu_cntcuit}}</b> 
                          </li>
                          <li class="list-group-item">
                            Documento: <b> {{$Usuario->getContribuyente->cntdocum}}</b> 
                          </li>
                        </ul>
                      </div>
                      <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-8 col-lg-8" >
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Datos de contacto.</h1>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">N° Tel </label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" value="{{$Usuario->usu_cntcel}}" placeholder="{{$Usuario->usu_cntcel}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label"><i class="fab fa-facebook-square"></i></label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" placeholder="{{$Usuario->usu_face}}">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label"><i class="fab fa-twitter-square"></i></label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" placeholder="{{$Usuario->usu_twitter}}">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label"><i class="fab fa-instagram"></i></label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" placeholder="{{$Usuario->usu_instagram}}">
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Correo Electronico</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" value="{{$Usuario->usu_cntemail}}" placeholder="{{$Usuario->usu_cntemail}}">
                            </div>
                        </div>  
                        <a href="#" class="btn btn-primary btn-block"><b>Actualizar cambios</b></a>        
                    </div>
                </div>
            </div>
          </div>
        </div>
        
        <div class="tab-pane fade" id="user-level" role="tabpanel" aria-labelledby="user-level-tab">
          <div class="col-md-12">
            <div class="callout ">
                <h5>Basico</h5>
                <p>Usted ha validado su cuenta por medio de su correo electrónico.</p>
            </div>
            <div class="callout callout-success">
              <h5>Por Aplicación</h5>
              <p>Usted ha validado su cuenta por medio de alguna de las aplicaciones que validan identidad.</p>
            </div>
            <div class="callout">
              <h5>Presencial</h5>
              <p>Usted ha validado su cuenta presencialmente.</p>
            </div>
          </div>
          <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
            Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
          </div>
          <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
            Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
          </div>
        </div>
      </div>
      <!-- /.card -->
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
