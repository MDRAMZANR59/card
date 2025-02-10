<?php

namespace App\Models;

use App\Models\Card;
use App\Models\Amount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AmountCard extends Model
{
    /** @use HasFactory<\Database\Factories\AmountCardFactory> */
    use HasFactory;

    public function card(){
       return $this->belongsTo(Card::class);
    }
    // public function cardc(){
    //    return $this->belongsToMany(Card::class);
    // }

    public function amount(){
        return $this->belongsTo(Amount::class);
    }
}
