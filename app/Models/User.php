<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [];

    // Los campos que se pueden llenar con create() o update()
    protected $fillable = [
        'name',
        'email',
        'password',
        'dni',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'categoria_usuario_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relación de pertenencia a categoría de usuario (cada usuario pertenece a una categoría de usuario)
    public function categoriaUsuario(): BelongsTo {
        return $this->belongsTo(CategoriaUsuario::class);
    }

    // Relación uno a muchos con facturas (un usuario puede tener varias facturas)
    public function facturas(): HasMany {
        return $this->hasMany(Factura::class);
    }

    // Relación uno a muchos con mariscos (un usuario puede tener varios mariscos)
    public function mariscos(): HasMany {
        return $this->hasMany(Marisco::class);
    }

    // Relación uno a muchos con pescados (un usuario puede tener varios pescados)
    public function pescados(): HasMany {
        return $this->hasMany(Pescado::class);
    }
}
