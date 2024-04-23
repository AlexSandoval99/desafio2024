<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_persona_id',
        'name',
        'email',
        'password',
        'activo',
        'bloqueado',
    ];

    /**
     * Get the admin persona associated with the user.
     */
    public function adminPersona()
    {
        return $this->belongsTo(AdmPersona::class, 'admin_persona_id');
    }
}
