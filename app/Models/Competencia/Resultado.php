<?php

namespace App\Models\Competencia;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Resultado extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    protected $table = 'competencia.COM_RESULTADOS';

    protected $fillable = ['competencia_id','concursante_id','fecha_hora_inicio','fecha_hora_fin','duracion_segundos', 'creadoPor', 'actualizadoPor'];

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'competencia_id');
    }

    public function concursante()
    {
        return $this->belongsTo(Concursante::class, 'concursante_id');
    }

    protected function casts(): array
    {
        return [
            'fecha_hora_inicio' => 'date',
            'fecha_hora_fin'    => 'boolean',
        ];
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
