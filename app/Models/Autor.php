<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected $table="autores";
    protected $fillable=['nombre','correo','telefono'];


    //Relacion Muchos A Muchos
    public function libros(){
        return $this->belongsToMany('App\Models\Libro');
    }
}
