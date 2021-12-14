@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@php( $password_email_url = View::getSection('password_email_url') ?? config('adminlte.password_email_url', 'password/email') )
@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop
@if (config('adminlte.use_route_url', false))
    @php( $password_email_url = $password_email_url ? route($password_email_url) : '' )
@else
    @php( $password_email_url = $password_email_url ? url($password_email_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.password_reset_message'))

@section('auth_body')

    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
            
        </div>
    @endif

    <form action="{{ url('reset_password_without_token') }}" method="get">
        {{ csrf_field() }}

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="text" name="usu_cntcuit" class="form-control {{ $errors->has('usu_cntcuit') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="Ingrese CUIT" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('usu_cntcuit'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('usu_cntcuit') }}</strong>
                </div>
            @endif
        </div>

        {{-- Send reset link button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-share-square"></span>
            {{ __('adminlte::adminlte.send_password_reset_link') }}
        </button>

    </form>

@stop
