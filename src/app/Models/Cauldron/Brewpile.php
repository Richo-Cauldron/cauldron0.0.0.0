<?php

namespace App\Models\Cauldron;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brewpile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function cards()
    {
        return $this->belongsToMany(Card::class);
    }
}
