<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Profil extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    protected $table = 'profils';
    protected $primarykey = 'id';
    protected $fillable = [
        'nom', 'email', 'image', 'password'
    ];
    public function publication()
    {
        return  $this->hasMany(Publication::class);
    }
    public function comments()
    {
        return $this->hasMany(Commentaire::class, 'profil_id');
    }
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password; // Assurez-vous que cela correspond au nom de votre colonne de mot de passe
    }


    public function getRememberToken()
    {
        return null; // not used
    }

    public function setRememberToken($value)
    {
        // not used
    }

    public function getRememberTokenName()
    {
        return null; // not used
    }
}
