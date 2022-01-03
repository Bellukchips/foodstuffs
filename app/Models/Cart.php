<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FoodStuffs;
use App\Models\User;
class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_foodstuffs',
        'id_user',
        'quantity',
        'total'
    ];

    /**
     * this function for create relation
     * between tables
     */
    public function foodstuffs(){
        return $this->belongsTo(FoodStuffs::class,'id_foodstuffs');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
