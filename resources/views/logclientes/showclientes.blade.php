@extends('layouts.master')


@section('titulo')  
clientes
@stop

@section('main')
<div><a href="{{action('ClientesController@create')}}">crear usuario <img src="{{url('https://image.flaticon.com/icons/png/512/72/72648.png')}}"></a></div>
{{session('status') ?? ''}}
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Direccion</th>
      <th scope="col">Codigo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Actualizar</th>
      <th scope="col">Borrar</th>
    </tr>
  </thead>
  <tbody>
  @foreach($clientes as $user)
    <tr>
      <th scope="row">{{$user->idcliente}}</th>
      <td>{{$user->nombre_cliente}}</td>
      <td>{{$user->apellido_cliente}}</td>
      <td>{{$user->direccion_cliente}}</td>
      <td>{{$user->codigo_postal_cliente}}</td>
      <td>{{$user->telefono_cliente}}</td>
      <td><a href="{{action('ClientesController@show',['id'=>$user->idcliente])}}"><img src="{{url('https://ps.w.org/automatic-safe-update/assets/icon-256x256.png?rev=2090952')}}"></a></td>
      <td><a href="{{action('ClientesController@destroy',['id'=>$user->idcliente])}}"><img src="{{url('https://alisteducation.com/wp-content/uploads/2012/06/delete.png')}}"></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@stop
