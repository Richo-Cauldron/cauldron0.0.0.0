<?php

namespace App\Models\Cauldron;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function brewpiles()
    {
        return $this->belongsToMany(Brewpile::class);
    }
}
