<?php

namespace App\Http\Controllers\Articulos;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$articulos=Articulo::all();
        $articulos=Articulo::query()->paginate(5);
        return view('Articulos.index',compact('articulos'))
                                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Articulos.create');
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
                                'articulo'=> 'required',
                                'categoria'=> 'required',
                                'cantidad'=> 'required',
                                'precio'=> 'required'
                            ]);
            if($validacion->fails()){
                    return redirect()->route('articulos.index')->with('error','Todos los campos son requeridos');
            } 
        Articulo::create($request->all());
        return redirect()->route('articulos.index')->with('success','Articulo agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        return view('Articulos.show',compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        return view('Articulos.edit',compact('articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulo $articulo)
    {
        
        $validacion=Validator::make($request->all(),[
            'articulo'=> 'required',
            'categoria'=> 'required',
            'cantidad'=> 'required',
            'precio'=> 'required'
        ]);
        if($validacion->fails()){
        return redirect()->route('articulos.index')->with('error','Todos los campos son requeridos');
        } 
        $articulo->update($request->all());
        return redirect()->route('articulos.index')->with('success','Articulo actualizado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulo $articulo)
    {
        $articulo->delete();
        return redirect()->route('articulos.index')->with('correcto','Articulo eliminado correctamente');

    }
}
