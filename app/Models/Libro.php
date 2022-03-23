<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    //protected $table="autores";
    protected $fillable=['titulo','editorial'];


    //Relacion Muchos A Muchos
    public function autores(){
        return $this->belongsToMany('App\Models\Autor');
    }
}
