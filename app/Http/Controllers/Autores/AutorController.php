<?php

namespace App\Http\Controllers\Autores;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores=Autor::query()->paginate(5);

        return view('Autores.index',compact('autores'))
                            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Autores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacion=Validator::make($request->all(),[
            'nombre'=>'required',
            'telefono'=>'required',
            'correo'=>'required'
        ]);
        if($validacion->fails()){
            return redirect()->route('autores.create')->with('error','Faltan campos requeridos')
                                                      ->withErrors($validacion);
        }
        Autor::create($request->all());
        return redirect()->route('autores.index')->with('success','Autor Registrado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autore)
    {
        return view('Autores.show',compact('autore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autore)
    {
        return view('Autores.edit',compact('autore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        $validacion=Validator::make($request->all(),[
            'nombre'=>'required',
            'telefono'=>'required',
            'correo'=>'required'
        ]);
        if($validacion->fails()){
            return redirect()->route('autores.edit')->with('error','Faltan campos requeridos')
                                                      ->withErrors($validacion);
        }
        $autor->update($request->all());
        return redirect()->route('autores.index')->with('success','Autor Registrado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autore)
    {
        $autore->delete();
        return redirect()->route('autores.index')->with('success','Autor Eliminado correctamente');
    }
}
