<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['titulo', 'nombre', 'fecha', 'texto'];
    public $timestamps = false;

    public function imagenes(){
        return $this->hasMany('App\Models\Imagen', 'posts_id', 'id');
    }
}