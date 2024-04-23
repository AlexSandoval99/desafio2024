<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmPerfil extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'adm_perfiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adm_rol_id',
        'user_id',
        'activo',
        'descripcion',
    ];

    public function rol()
    {
        return $this->belongsTo(AdmRol::class, 'adm_rol_id');
    }

    public function user()
    {
        return $this->belongsTo(Usuario::class, 'user_id');
    }
}
