<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=DB::table('clientes')
        ->orderBy('apellido_cliente','asc')
        ->get();
        return view('logclientes.showclientes',['clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logclientes.altacliente');
    }


    public function save(Request $request)
    {
        $clientes=DB::table('clientes')->insert([
            'nombre_cliente'=>$request->input('nombre_cliente'),
            'apellido_cliente'=>$request->input('apellido_cliente'),
            'direccion_cliente'=>$request->input('direccion_cliente'),
            'codigo_postal_cliente'=>$request->input('codigo_postal_cliente'),
            'telefono_cliente'=>$request->input('telefono_cliente')
            ]);
            return redirect()->action('ClientesController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes=DB::table('clientes')
        ->where('idcliente','=',$id)
        ->first();
        return view('logclientes.altacliente',['clientes'=>$clientes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $clientes=DB::table('clientes')
        ->where('idcliente','=',$request->input('id'))
        ->update([
            'nombre_cliente'=>$request->input('nombre_cliente'),
            'apellido_cliente'=>$request->input('apellido_cliente'),
            'direccion_cliente'=>$request->input('direccion_cliente'),
            'codigo_postal_cliente'=>$request->input('codigo_postal_cliente'),
            'telefono_cliente'=>$request->input('telefono_cliente')
            ]);
            return redirect()->action('ClientesController@index')
            ->with('status','usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes=DB::table('clientes')
        ->where('idcliente','=',$id)
        ->delete();

            return redirect()->action('ClientesController@index')
            ->with('status','usuario eliminado');
    }
}
