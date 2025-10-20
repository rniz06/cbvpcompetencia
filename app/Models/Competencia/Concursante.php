<?php

namespace App\Models\Competencia;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Concursante extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable, SoftDeletes;

    protected $table = 'competencia.COM_CONCURSANTES';

    protected $fillable = ['nombrecompleto', 'creadoPor', 'actualizadoPor'];

    public function resultados()
    {
        return $this->hasMany(Resultado::class, 'concursante_id');
    }

    /**
     * Busqueda por campo nombrecompleto.
     */
    #[Scope]
    protected function buscarNombrecompleto(Builder $query, $search = null): void
    {
        $query->when($search, function (Builder $query, string $search) {
            $query->whereLike('nombrecompleto', "%{$search}%");
        });
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
