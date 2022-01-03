<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image_categories'
    ];
    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['image_categories'] = $this->image_categories;
        return $toArray;
    }
    public function getPicturePathAttribute()
    {
        return url('') . Storage::url($this->attributes['image_categories']);
    }
}
