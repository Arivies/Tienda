<?php

namespace App\Http\Controllers\Autores;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use App\Models\Libro;
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
        //dd($autores);
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
        $libros =Libro::all()->pluck('titulo','id');
        return view('Autores.create',compact('libros'));
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

        $autores=Autor::create($request->all());
        $autores->libros()->sync($request->input('libros',[]));
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
        $libros=Libro::all()->pluck('titulo','id');
        $autore->load('libros');
        return view('Autores.edit',compact('autore','libros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autore)
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
        $autore->update($request->all());
        $autore->libros()->sync($request->input('libros',[]));


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
