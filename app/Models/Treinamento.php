<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treinamento extends Model
{
    use HasFactory;

    protected $table = "treinamento";
    protected $fillable = [
        'instrutor',
        'empresa',
        'funcionario',
        'norma',
        'descricao',
        'st_treinamento_id',
        'data',
        'validade'
    ];

    public function situacao()
    {
        return $this->belongsTo(Situacao::class);
    }
}
