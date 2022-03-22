<?php

namespace App\Http\Controllers\Articulos;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\UploadImgTrait;


class ArticuloController extends Controller
{
    use UploadImgTrait; 
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
                                'precio'=> 'required',
                                'imagen'=>'image'
                            ]);
            if($validacion->fails()){
                return redirect()->route('articulos.create')->with('error','Alguno de los campos es incorrecto')
                                                            ->withErrors($validacion);
            } 
            $data=$request->all();
            if(!empty($request->file('imagen'))){  

                /*TOMA ARCHIVO DEL FORM Y LO MUEVE AL SERVIDOR, SE ENVIA EL ARCHIVO Y LA CARPETA GUARDAR, 
                LA FUNCION RETORNA EL NOMBRE DEL ARCHIVO CON UNA NOMENCLATURA PARA EVITAR REEMPLAZO*/
                $archivo=$request->file('imagen');
                $nombreImagen=$this->CargaArchivo($archivo,'articulos');

                /*SE ASIGNAN A UNA NUEVA VARIABLE PARA RENOMBRAR EL CAMPO DEL ARCHIVO*/          
                $data['imagen']=$nombreImagen;
            }

        Articulo::create($data);
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
        $ruta=$this->ObtieneRuta('articulos/');
        return view('Articulos.show',compact('articulo','ruta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
        $ruta=$this->ObtieneRuta('articulos/');
        return view('Articulos.edit',compact('articulo','ruta'));
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
            'precio'=> 'required',
            'imagen'=>'image'
        ]);
        if($validacion->fails()){
        return redirect()->route('articulos.index')->with('error','Todos los campos son requeridos');
        }
        
        $data=$request->all();
        if(!empty($request->file('imagen'))){      

            /*TOMA ARCHIVO DEL FORM Y LO MUEVE AL SERVIDOR, SE ENVIA EL ARCHIVO Y LA CARPETA GUARDAR, 
            LA FUNCION RETORNA EL NOMBRE DEL ARCHIVO CON UNA NOMENCLATURA PARA EVITAR REEMPLAZO*/
            $archivo=$request->file('imagen');
            $nombreImagen=$this->CargaArchivo($archivo,'articulos');

            /*SE ASIGNAN A UNA NUEVA VARIABLE PARA RENOMBRAR EL CAMPO DEL ARCHIVO*/            
            $data['imagen']=$nombreImagen; 

            /*SE ENVIA UN INPUT OCULTO CON EL NOMBRE DE LA IMG ANTERIOR, SE ENVIA A LA FUNCION 
            PARA ELIMINARLA Y EVITAR SOBRE ALMACENAMIENTO*/
            $img_anterior="articulos/".$request->input('ant_imagen');
            $this->EliminaArchivio($img_anterior);
        }
        $articulo->update($data);
        return redirect()->route('articulos.index')->with('success','Articulo editado correctamente');
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
        
        /*SE TOMA EL NOMBRE DE LA IMG DESDE LA BD, SE BUSCA LA IMG Y SE ELIMINA*/
        $img_eliminar="articulos/".$articulo->imagen;
        $this->EliminaArchivio($img_eliminar);

        return redirect()->route('articulos.index')->with('correcto','Articulo eliminado correctamente');

    }
}
