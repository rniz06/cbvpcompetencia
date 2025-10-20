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

    protected $fillable = ['tipo_id','fecha_hora_inicio','fecha_hora_fin','duracion_segundos', 'creadoPor', 'actualizadoPor'];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id');
    }
    
    public function concursantes()
    {
        return $this->hasMany(CompetenciaConcursante::class, 'competencia_id');
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
