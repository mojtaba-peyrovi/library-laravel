<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    public function path()
    {
        $path = 'authors/'. $this->id;
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function fullName()
    {
        $name = $this->name;
        $lastname = $this->last_name;
        return $name .' '. $lastname;
    }


}
