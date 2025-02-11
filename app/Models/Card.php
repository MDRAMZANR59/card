<?php

namespace App\Models;

use App\Models\Amount;
use App\Models\Version;
use App\Models\Platform;
use App\Models\AmountCard;
use App\Models\CardVersion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory;
    protected $table='cards';
    //acces platform data
    public function platform(){
        return $this->belongsTo(Platform::class);
    }
    public function varsion(){
        return $this->belongsToMany(Version::class);
    }
    public function amount(){
        return $this->belongsToMany(Amount::class);
    }

    public function AmountCard(){
       return $this->hasMany(AmountCard::class);
    }
   
    public function CardVersion(){
        return $this->hasMany(CardVersion::class);
    }
 

   
}
