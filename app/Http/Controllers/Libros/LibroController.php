<?php

namespace App\Http\Controllers\Libros;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros=Libro::query()->paginate(5);
       // dd($libros);
        return view('Libros.index',compact('libros'))
                            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores =Autor::all()->pluck('nombre','id');
        return view('Libros.create',compact('autores'));
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
            'titulo'=>'required',
            'editorial'=>'required'

        ]);
        if($validacion->fails()){
            return redirect()->route('libros.create')->with('error','Faltan campos requeridos')
                                                      ->withErrors($validacion);
        }
        $libros=Libro::create($request->all());
        $libros->autores()->sync($request->input('autor'));
        return redirect()->route('libros.index')->with('success','Libro Registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('Libros.show',compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        return view('Libros.edit',compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $validacion=Validator::make($request->all(),[
            'titulo'=>'required',
            'editorial'=>'required'
        ]);
        if($validacion->fails()){
            return redirect()->route('libros.edit')->with('error','Faltan campos requeridos')
                                                      ->withErrors($validacion);
        }
        $libro->update($request->all());
        return redirect()->route('libros.index')->with('success','Libro Registrado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('success','Libro Eliminado correctamente');
    }
}
