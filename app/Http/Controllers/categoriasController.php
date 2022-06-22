<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class categoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = categoria::all();
        return view('Categorias.index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categorias.create');
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
        $request->validate([
            'categoria' => 'required|max:255|unique:categorias',
            'description' => 'max:255'
        ]);

        $categoria = new categoria();
        $categoria->categoria = $request->categoria;
        $categoria->descripcion = $request->description;
        if (isset($request->cboEstado)) {
            $categoria->estado = 'ACTIVO';
        } else {
            $categoria->estado = 'INACTIVO';
        }
        //dd($categoria);
        $categoria->save();

        return redirect()->route('categorias.create')->with('success', 'Registro exitoso');
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
        $categoria = categoria::find($id);
        //dd($categoria);
        return view('Categorias.show', ['categoria' => $categoria]);
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
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'categoria' => 'required|max:255',
            'description' => 'max:255'
        ]);

        $categoria = categoria::find($id);
        $categoria->categoria = $request->categoria;
        $categoria->descripcion = $request->description;
        if (isset($request->cboEstado)) {
            $categoria->estado = 'ACTIVO';
        } else {
            $categoria->estado = 'INACTIVO';
        }
        $categoria->save();

        return redirect()->route('categorias.index')->with('success', 'Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //No se podrá eliminar las categorías       

    }
}
