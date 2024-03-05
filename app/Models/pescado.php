<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pescado extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'origen', 'precioKG', 'cantidad', 'fechaCompra','categoria', 'imagen', 'user_id', 'proveedor_id'];

    public function usuario():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function proveedor():BelongsTo{
        return $this->belongsTo(proveedor::class);
    }

    public function lineas(): HasMany{
        return $this->hasMany(linea::class);
    }

}
