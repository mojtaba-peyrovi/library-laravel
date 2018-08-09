<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Book extends Model
{
    protected $guarded = [];

    public function path()
    {
        return 'books/'. $this->id;
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function is_new()
    {
        $now = Carbon::now();
        $days_ago = $now->diffInDays($this->created_at);
        if ($days_ago <= 7) {
            return True;
        }else {
            return False;
        }
    }
}
