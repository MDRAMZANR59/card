<?php
namespace App\Models;
use App\Models\Card;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardVersion extends Model
{
    protected $table = 'card_versions';

    protected $fillable = ['version_id', 'card_id'];

    public function card(){
        return $this->belongsTo(Card::class);
    }
   
    public function version(){
        return $this->belongsTo(Version::class);
    }
}
