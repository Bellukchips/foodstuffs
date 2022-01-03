<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user','name','type_partner','address','is_open'
    ];

    /**
     * function for create relation
     * between table user and partner
     */
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

}
