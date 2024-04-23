<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmDocumento extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'adm_documentos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_persona_id',
        'numero',
        'es_principal',
    ];

    /**
     * Get the admin persona that owns the document.
     */
    public function adminPersona()
    {
        return $this->belongsTo(AdmPersona::class, 'admin_persona_id');
    }
}
