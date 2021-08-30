<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name','sticker_id'];

    public function sticker(){
        return $this->belongsTo('App\Models\Sticker');
    }

}
