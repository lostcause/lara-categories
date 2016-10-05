<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{

    protected $fillable = ['name', 'text'];

    public function category()
    {
        return $this->belongsTo(App\Category::class);
    }
}
