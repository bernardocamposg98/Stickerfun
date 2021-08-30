<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sticker extends Model
{
    use HasFactory;
    protected $fillable = ['name','publisher','description','tray_image_file','publisher_email','publisher_website'];

    public function stickerpay(){
        return $this->hasMany('App\Models\Stickerpay');
    }
    public function tag(){
        return $this->hasMany('App\Models\Tag');
    }
}
