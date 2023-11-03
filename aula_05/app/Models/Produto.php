<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Znck\Eloquent\Relations\BelongsToThrough;
use \Znck\Eloquent\Traits\BelongsToThrough as TraitBelongsToThrough;

class Produto extends Model
{
    use HasFactory,TraitBelongsToThrough;

    protected $fillable = [
        'nome',
        'descricao',
        'qtd_estoque',
        'preco',
        'importado'
    ];

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function regiao(): BelongsToThrough
    {
        return $this->belongsToThrough(
            Regiao::class,
            [
                Estado::class,
                Fornecedor::class
            ],
            null,
            '',
            [
                Regiao::class=>'regiao_id',
                Fornecedor::class=>'fornecedor_id'
            ]
        );
    }

    public function promocoes()
    {
        return $this->belongsToMany(Promocao::class)
                    ->withPivot('desconto')
                    ->withTimestamps();
    }
}
