<?php

namespace App\Models;

use App\Models\AmountCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Card;

class Amount extends Model
{
    /** @use HasFactory<\Database\Factories\AmountFactory> */
    use HasFactory;

   public function amountCard(){
    return $this->hasMany(AmountCard::class);
   }
   public function card(){
   return $this->belongsToMany(Card::class);
   }
}
