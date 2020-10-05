<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author'
    ];

    protected $hidden = [
        'id','pivot' , 'created_at', 'updated_at'
    ];

    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
