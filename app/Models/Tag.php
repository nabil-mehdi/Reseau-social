<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $fillable = [
        'description', 'publication_id'
    ];



    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
