<?php

namespace App\Models\Competencia;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Competencia extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    protected $table = 'competencia.COM_COMPETENCIAS';

    protected $fillable = ['competencia', 'creadoPor', 'actualizadoPor'];

    public function resultados()
    {
        return $this->hasMany(Resultado::class, 'competencia_id');
    }

    public function concursantes()
    {
        return $this->belongsToMany(Concursante::class, 'resultados');
                    //->withPivot(['dorsal', 'tiempo_total', 'milisegundos', 'posicion', 'inicio', 'fin'])
                    //->withTimestamps();
    }

    /*
    |---------------------------------------
    | RELACIONES DE AUDITORIA DE LA TABLA
    |---------------------------------------
    */
    public function creadoPor()
    {
        return $this->belongsTo(User::class, 'creadoPor');
    }

    public function actualizadoPor()
    {
        return $this->belongsTo(User::class, 'actualizadoPor');
    }
}
