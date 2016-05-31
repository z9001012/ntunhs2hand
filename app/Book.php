<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'total',
        'sales',
        'depart_id',
        'isnew',
        'author',
        'price',
        'type',
        'onsale',
        'name',
        'img',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function depart()
    {
        return $this->belongsTo(depart::class);
    }
    public function depart2Know()
    {
        if($this->depart_id == "1")
        {
            return "資管系";
        }
        else if($this->depart_id=="2")
        {
            return "護理系";
        }
        else if($this->depart_id=="3")
        {
            return "生死系";
        }
        else if($this->depart_id=="4")
        {
            return "健管系";
        }
        else if($this->depart_id=="5")
        {
            return "運保系";
        }
        else if($this->depart_id=="6")
        {
            return "幼保系";
        }
        else
        {
            return "不分類";
        }
    }
}
