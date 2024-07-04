<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $table = 'publications';
    protected $fillable = [
        'titre',  'text', 'image', 'profil_id'
    ];
    public function profil()
    {
        return $this->belongsTo(Profil::class, 'profil_id');
    }
    public function comments()
    {
        return $this->hasMany(Commentaire::class, 'publication_id');
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }
}
