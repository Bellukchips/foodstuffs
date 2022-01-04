<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partner;
use Illuminate\Support\Facades\Storage;

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
    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['thumbnail'] = $this->thumbnail;
        return $toArray;
    }
    public function getPicturePathAttribute()
    {
        return url('') . Storage::url($this->attributes['thumbnail']);
    }
}
