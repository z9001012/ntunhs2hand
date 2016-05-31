<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QA extends Model
{
    protected $table = "QAs";

    protected $fillable = ["user_id","book_id","answer","question"];

    public function user()
    {
        //這問題是只屬於一個買家的
        return $this->belongsTo(User::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
