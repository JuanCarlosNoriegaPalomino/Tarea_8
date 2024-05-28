<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inquilino;
use App\Models\Renta;

class Alquiler extends Model
{
    use HasFactory;

    protected $fillable = ['monto', 'fecha_inicio', 'fecha_fin'];
    protected $table = 'alquileres';

    public function inquilinos()
    {
        return $this->belongsToMany(Inquilino::class);
    }

    public function rentas()
    {
        return $this->hasMany(Renta::class);
    }
}
