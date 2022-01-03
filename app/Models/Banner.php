<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'img_banner'
    ];
    public function toArray()
    {
        $toArray = parent::toArray();
        $toArray['img_banner'] = $this->img_banner;
        return $toArray;
    }
    public function getPicturePathAttribute()
    {
        return url('') . Storage::url($this->attributes['img_banner']);
    }
}
