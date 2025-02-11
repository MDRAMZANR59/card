<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Card;


class Version extends Model
{
    protected $table = 'versions';

    public function card(){
        return $this->belongsToMany(Card::class);
    }

    public function cardVersions()
    {
        return $this->hasMany(CardVersion::class);
    }
   
}
