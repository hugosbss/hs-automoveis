<?php

namespace App\Models;

use Iluminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'modelo',
        'cor',
        'ano',
        'quilometragem',
        'valor',
        'descricao',
        'usuario_id',
    ];

    public function fotos()
    {
        return $this->hasMany(FotoVeiculo::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
