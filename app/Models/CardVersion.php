<?php

// namespace App\Models;

// use App\Models\Card;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

// class CardVersion extends Model
// {
//     /** @use HasFactory<\Database\Factories\CardVersionFactory> */
//     use HasFactory;

//     public function card(){
//         return $this->belongsToMany(Card::class);
//     }
// }



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardVersion extends Model
{
    protected $table = 'card_versions';

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
    // public function cardc()
    // {
    //     return $this->belongsToMany(Card::class);
    // }
    public function version()
    {
        return $this->belongsTo(Version::class);
    }
}
