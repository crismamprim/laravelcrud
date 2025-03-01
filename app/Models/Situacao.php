<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    use HasFactory;

    protected $table = 'situacao_treinamento';
    protected $fillable = [
        'nome',
        'cor'
    ];

    public function treinamento()
    {
        return $this->hasMany(Treinamento::class);
    }
}
