<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'book_id'
    ];

}
