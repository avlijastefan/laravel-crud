<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {
    protected $fillable = [
        'name', 'published' ,'price'
    ];
        
    public function author() {
        return $this->belongsTo(Author::class);
    }
}
