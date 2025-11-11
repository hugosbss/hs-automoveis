<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    use HasFactory;

    protected $table = 'cores';

    protected $fillable = ['nome'];

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }
}
