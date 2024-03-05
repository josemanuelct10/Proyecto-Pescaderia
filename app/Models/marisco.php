<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Marisco extends Model
{
    use HasFactory;

    // Se especifican los campos que se pueden llenar con create() o update()
    protected $fillable = ['nombre', 'descripcion', 'origen', 'precioKG', 'cantidad', 'categoria','cocido', 'fechaCompra', 'imagen', 'user_id', 'proveedor_id'];

    // Relación de pertenencia a usuario (cada marisco pertenece a un usuario)
    public function usuario(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // Relación de pertenencia a proveedor (cada marisco pertenece a un proveedor)
    public function proveedor(): BelongsTo {
        return $this->belongsTo(Proveedor::class);
    }
}
