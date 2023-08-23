<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'is_active',
        'categoria_id',
        'imagen',
    ];

    public function precio_format(){
        return '$' . number_format($this->precio, 2, ',', '.');
    }

    public function categoria(){
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }
}
