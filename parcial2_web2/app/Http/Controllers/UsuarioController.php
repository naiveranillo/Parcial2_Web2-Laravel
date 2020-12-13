<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        //
        $usuarios = User::paginate(5);

        return view("usuarios.index", compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.crear');
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
        $datosUsuarios = request()->except('_token');

        $registro = User::where('cedula', $datosUsuarios['cedula'])->get()->first(); //busque el primer registro que coincida con el dato cedula.

        if (empty($registro)) {
 
            $datosUsuarios['password'] = password_hash($datosUsuarios['password'], PASSWORD_DEFAULT); //agrego la inscriptacion de la contraseña
            User::insert($datosUsuarios); //inserto en la tabla
            return redirect()->route('usuarios.create')->with('Mensaje','Usuario agregado con exito');

        }else{

            return redirect()->route('usuarios.create')->with('Error','Error!, la cedula ya existe');
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
        //
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
        $usuario = User::find($id);

        return view('usuarios.edit', compact('usuario'));
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
        //
        $request['password']=password_hash($request['password'], PASSWORD_DEFAULT);

        $this->validate($request,[
            'name'=> 'required',
            'cedula'=> 'required',
            'rol'=>'required',
            'password'=>'required'
        ]);
        User::find($id)->update([
            'name' => request('name'),
            'cedula' => request('cedula'),
            'rol' => request('rol'),
            'password'=> request('password'),
        ]);
        return redirect()->route('usuarios.index')
            ->with('Mensaje', 'Usuario correctamente editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuario = User::findOrFail($id);
        User::destroy($id); //Eliminar registro

        return redirect()->route('usuarios.index')->with('Mensaje','Usuario Eliminado con exito');

    }
}
