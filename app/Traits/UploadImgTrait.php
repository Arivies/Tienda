<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Image;

trait UploadImgTrait{

    public function CargaArchivo($archivo,$directorio){

       /* $file=$archivo;
        $imagen=time().'-'.$file->getClientOriginalName(); 
        \Storage::disk('articulos')->put($imagen,  \File::get($file));
        return $imagen;*/
        $file=time().'-'.$archivo->getClientOriginalName();
        $archivo->storeAS($directorio,$file);
        return $file; 

    }

    public function ObtieneRuta($ruta){       
        //return Storage::disk($disco)->url($ruta);
        return Storage::disk('local')->url($ruta);
        
    }

    public function EliminaArchivio($ruta){
         return Storage::disk('local')->delete($ruta);
    }
}