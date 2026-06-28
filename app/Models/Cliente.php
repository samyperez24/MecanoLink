<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    // Tu llave primaria real no se llama "id", sino "id_cliente"
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'direccion',
    ];
}