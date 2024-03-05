<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factura extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Se especifican los campos que se pueden llenar con create() o update()
    protected $fillable = [
        'precioFinal',
        'metodoPago',
        'horaRecogida',
        'user_id'
    ];

    // Relación de pertenencia a usuario (cada factura pertenece a un usuario)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relación uno a muchos con las líneas de factura (cada factura puede tener varias líneas)
    public function lineas(): HasMany {
        return $this->hasMany(Linea::class);
    }
}
