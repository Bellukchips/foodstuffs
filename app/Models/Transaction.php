<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\FoodStuffs;
class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'total',
        'quantity',
        'id_foodstuffs',
        'transaction_status',
        'transaction_date',
        'resi_code',
        'payment_method'
    ];

    /**
     * this is function for create relation
     * between tables
     */
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function foodstuffs(){
        return $this->belongsTo(FoodStuffs::class,'id_foodstuffs');
    }
}
