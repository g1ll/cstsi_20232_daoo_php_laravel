<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use \Znck\Eloquent\Relations\BelongsToThrough;
use \Znck\Eloquent\Traits\BelongsToThrough as TraitBelongsToThrough;

class Fornecedor extends Model
{
    use HasFactory, TraitBelongsToThrough;

    protected $table = 'fornecedores';
    protected $fillable = [
        "nome",
        "cnpj",
        "email",
        "estado_id",
        "telefone",
        "endereco"
    ];

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class);
    }

    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class);
    }

    public function regiao(): BelongsToThrough
    {
        return $this->belongsToThrough(
            Regiao::class,
            Estado::class,
            null,
            '',
            [Regiao::class => 'regiao_id']
        );
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }
}
