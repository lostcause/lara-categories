<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['name'];

    public function texts()
    {
        return $this->hasMany(\App\Text::class);
    }
}
