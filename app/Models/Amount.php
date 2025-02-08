<?php

namespace App\Models;

use App\Models\AmountCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Amount extends Model
{
    /** @use HasFactory<\Database\Factories\AmountFactory> */
    use HasFactory;

   public function amountCard(){
    return $this->hasMany(AmountCard::class);
   }
}
