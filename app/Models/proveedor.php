<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedores';

    protected $guarded = [];

    protected $fillable = ['nombre', 'direccion', 'telefono', 'categoria', 'cif' ];

    public function pescados():HasMany{
        return $this->hasMany(pescado::class);
    }

    public function mariscos():HasMany{
        return $this->hasMany(marisco::class);
    }

}
