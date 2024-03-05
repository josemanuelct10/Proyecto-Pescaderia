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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $guarded = [];

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

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function categoriaUsuario():BelongsTo{
        return $this->belongsTo(CategoriaUsuario::class);
    }

    public function facturas():HasMany{
        return $this->hasMany(Factura::class);
    }

    public function mariscos():HasMany{
        return $this->hasMany(marisco::class);
    }

    public function pescados():HasMany{
        return $this->hasMany(pescado::class);
    }


}
