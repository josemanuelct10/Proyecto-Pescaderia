<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    use HasFactory;

    // Se especifica la tabla asociada al modelo
    protected $table = 'proveedores';

    // Se especifican los campos que no se pueden asignar en masa
    protected $guarded = [];

    // Se especifican los campos que se pueden llenar con create() o update()
    protected $fillable = ['nombre', 'direccion', 'telefono', 'categoria', 'cif' ];

    // Relación uno a muchos con los pescados (un proveedor puede tener varios pescados)
    public function pescados(): HasMany{
        return $this->hasMany(Pescado::class);
    }

    // Relación uno a muchos con los mariscos (un proveedor puede tener varios mariscos)
    public function mariscos(): HasMany{
        return $this->hasMany(Marisco::class);
    }
}
