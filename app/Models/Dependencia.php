<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $table = 'Dependencias';          // Nombre real de la tabla
    protected $primaryKey = 'IdDependencia';    // PK de tu tabla
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;                // No usas created_at/updated_at

    protected $fillable = [
        'Nombre',
        'TotalAlumnos',
        'RequisitosTexto',
        'Direccion',
        'ContactoNombre',
        'ContactoPuesto',
        'Telefono',
        'CorreoContacto',
        'Activa',
    ];
}
