<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Imagen extends Model
{
    use HasFactory;
    protected $table = 'imagenes';
    protected $primaryKey = 'id';
    protected $fillable = ['posts_id', 'imagen', 'link'];
    public $timestamps = false;

    public function post(){
        return $this->belongsTo('App\Models\Post', 'posts_id', 'id');
    }
}