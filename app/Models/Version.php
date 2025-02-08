<?php

// namespace App\Models;

// use App\Models\Card;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

// class Version extends Model
// {
//     /** @use HasFactory<\Database\Factories\VersionFactory> */
//     use HasFactory;

//     public function card(){
//         $this->hasMany(Card::class);
//     }

// }


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    protected $table = 'versions';

    public function cardVersions()
    {
        return $this->hasMany(CardVersion::class);
    }
}
