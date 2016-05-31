<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class depart extends Model
{
    protected $table = 'depart';

    protected $fillable = [
            'name'
    ];


    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
