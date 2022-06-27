<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spicialiter extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
