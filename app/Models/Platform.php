<?php

namespace App\Models;

use App\Models\Card;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends Model
{
    /** @use HasFactory<\Database\Factories\PlatformFactory> */
    use HasFactory;

    public function card(){
        $this->hasOne(Card::class);
    }
}
