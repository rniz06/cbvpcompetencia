<?php

namespace App\Models\Competencia;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Resultado extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    protected $table = 'competencia.COM_RESULTADOS';

    protected $fillable = [
        'competencia_id',
        'concursante_id',
        'fecha_hora_inicio',
        'fecha_hora_fin',
        'duracion_segundos',
        'escala',
        'torre',
        'mazo',
        'arrastre',
        'victima',
        'total',
        'creadoPor',
        'actualizadoPor'
    ];

    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'competencia_id');
    }

    public function concursante()
    {
        return $this->belongsTo(Concursante::class, 'concursante_id');
    }

    /**
     * Busqueda por campo departamento_solicitante_id.
     */
    #[Scope]
    protected function buscarCompetenciaId(Builder $query, $search = null): void
    {
        $query->when($search, function (Builder $query, string $search) {
            $query->where('competencia_id', $search);
        });
    }

    /**
     * Busqueda por campo departamento_solicitante_id.
     */
    #[Scope]
    protected function buscarConcursanteId(Builder $query, $search = null): void
    {
        $query->when($search, function (Builder $query, string $search) {
            $query->where('concursante_id', $search);
        });
    }

    protected function casts(): array
    {
        return [
            'fecha_hora_inicio' => 'datetime:America/Asuncion',
            'fecha_hora_fin'    => 'datetime:America/Asuncion',
            'escala'            => 'datetime:America/Asuncion',
            'torre'             => 'datetime:America/Asuncion',
            'arrastre'          => 'datetime:America/Asuncion',
            'mazo'              => 'datetime:America/Asuncion',
            'victima'           => 'datetime:America/Asuncion',
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
