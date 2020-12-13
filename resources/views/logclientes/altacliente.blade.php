@extends('layouts.master')

@section('titulo')
@if((isset($clientes)) and (is_object($clientes)))
    modificacion de datos de usuario
    @php
    $title1='modificacion de datos de usuario';
    $nombre_cliente=$clientes->nombre_cliente;
    $apellido_cliente=$clientes->apellido_cliente;
    $direccion_cliente=$clientes->direccion_cliente;
    $codigo_postal_cliente=$clientes->codigo_postal_cliente;
    $telefono_cliente=$clientes->telefono_cliente;
    $idcliente=$clientes->idcliente;
    @endphp
    @else
    alta de un nuevo usuario
    @php
    $title1='alta de un nuevo usuario';
    $nombre_cliente='';
    $apellido_cliente='';
    $direccion_cliente='';
    $codigo_postal_cliente='';
    $telefono_cliente='';
    $idcliente='';
    @endphp
    @endif
@stop

@section('content')
<div></div>
<form action="{{isset($clientes) ?  action('ClientesController@update') : action('ClientesController@save')}}" method="post" >
        {{csrf_field()}}
        @if((isset($clientes)) and (is_object($clientes)))
        <input type="hidden" name="idcliente" value="{{$idcliente}}">
        @endif
        <label for="nombre_cliente">Nombre</label>
        <input type="text" name="nombre_cliente" value="{{$nombre_cliente}}">
        <br>
        <label for="apellido_cliente">Apellido</label>
        <input type="text" name="apellido_cliente" value="{{$apellido_cliente}}">
        <br>
        <label for="direccion_cliente">Direccion</label>
        <input type="text" name="direccion_cliente" value="{{$direccion_cliente}}">
        <br>
        <label for="codigo_postal_cliente">Codig postal</label>
        <input type="text" name="codigo_postal_cliente" value="{{$codigo_postal_cliente}}">
        <br>
        <label for="telefono_cliente">Telefono</label>
        <input type="text" name="telefono_cliente" value="{{$telefono_cliente}}">
        <br>
        <input type="submit" value="submit">
    </form>
@stop