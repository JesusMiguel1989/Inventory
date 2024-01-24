<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $timestamps = false; // Evita ese campo
    use HasFactory;

    // Cambia el nombre de la tabla a usar en el modelo
    protected $table = 'products';
}
