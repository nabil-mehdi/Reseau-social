<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $table = 'commentaires';
    protected $fillable = [
        'text', 'profil_id', 'publication_id'
    ];
    public function profil()
    {
        return $this->belongsTo(Profil::class, 'profil_id');
    }
    public function publication()
    {
        return $this->belongsTo(Publication::class, 'publication_id');
    }
}
