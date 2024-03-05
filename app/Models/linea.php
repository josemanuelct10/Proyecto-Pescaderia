<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Linea extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'cantidad',
        'precioFila',
        'preparacion',
        'factura_id',
        'pescado_id',
        'marisco_id'
    ];

    public function factura(): BelongsTo
    {
        return $this->belongsTo(Factura::class);
    }

    public function pescado(): BelongsTo{
        return $this->belongsTo(pescado::class);
    }
    public function marisco(): BelongsTo{
        return $this->belongsTo(marisco::class);
    }
}
