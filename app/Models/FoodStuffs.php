<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeFoodStuffs;
use App\Models\Partner;
class FoodStuffs extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name','price','desc','id_partner','thumbnail','id_categorie'
    ];

    /**
     * this is function for create relation
     * between tables
     *
     * @return void
     */
   
    public function partner(){
        return $this->belongsTo(Partner::class,'id_partner');
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class,'id_categorie');
    }
}
