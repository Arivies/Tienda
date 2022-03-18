<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Image;

trait UploadImgTrait{

    public function CargaImagen($archivo,$nombre){

        //$file=$request->file('imagen');
        $file=$archivo;//->file($nombre);
        $imagen=time().'-'.$file->getClientOriginalName(); 
        \Storage::disk('articulos')->put($imagen,  \File::get($file));
        return $imagen;
    }


}




