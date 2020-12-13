<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['libros'] = Libro::paginate(5);
        return view('libros.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libros.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'isbn' => 'required|string|max:20',
            'nombre' => 'required|string|max:100',
            'categoria' => 'required|string|max:100',
            'num_paginas' => 'required|string'
        ];
        $mensaje = ['required' => ':attribute es requerido'];
        $this->validate($request,$campos,$mensaje);
        $datosLibro = request()->except('_token');

        $libro = Libro::where('ISBN', $datosLibro['isbn'])->get()->first();
        
        if(empty($libro)){
            $campos = [
                'isbn' => 'required|string|max:20',
                'nombre' => 'required|string|max:100',
                'categoria' => 'required|string|max:100',
                'num_paginas' => 'required|string'
            ];
            $mensaje = ['required' => ':attribute es requerido'];
            $this->validate($request,$campos,$mensaje);
            Libro::insert($datosLibro);
            return redirect('libros/create')->with('Mensaje', 'Libro agregado');
        }else{
            return redirect('libros/create')->with('Error', 'El codigo ISBN ya esta registrado');
        }

        

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::where('id', '=', $id)->get()->first();

        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'nombre' => 'required|string|max:100',
            'categoria' => 'required|string|max:100',
            'num_paginas' => 'required|string'
        ];
        $mensaje = ['required' => ':attribute es requerido'];
        $this->validate($request,$campos,$mensaje);

        $datosLibro = request()->except('_token','_method'); //trae todo menos token y method

        Libro::where('id', '=', $id)->update($datosLibro); //actualizando datos, por medio del id

        //$persona=persona::findOrFail($id); // trayendo todos los datos para retornarlo a la vista

        //return view('personas.edit', compact('persona')); 

        return redirect('libros')->with('Mensaje','Libro Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Libro::destroy($id);

       

        //return redirect('personas');
        return redirect('libros')->with('Mensaje','Libro Eliminado');
    
    }
}
