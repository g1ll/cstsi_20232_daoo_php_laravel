<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Znck\Eloquent\Relations\BelongsToThrough;
use Znck\Eloquent\Traits\BelongsToThrough as TraitBelongsToThrough;

class Produto extends Model
{
    use HasFactory;
    use TraitBelongsToThrough;

    protected $fillable = [
        'nome',
        'descricao',
        'qtd_estoque',
        'preco',
        'importado',
        'fornecedor_id'
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
                Regiao::class => 'regiao_id',
                Fornecedor::class => 'fornecedor_id'
            ]
        );
    }

    public function promocoes()
    {
        return $this->belongsToMany(Promocao::class)
                    ->withPivot('desconto')
                    ->withTimestamps();
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    static public function mediaType($mediaType='image'):Collection
    {
        return Produto::with([
            'media'=>fn($q)=>$q->where('type',$mediaType)])
            ->whereHas('media',fn($q)=>$q->where('type',$mediaType))
            ->get();
    }

}
