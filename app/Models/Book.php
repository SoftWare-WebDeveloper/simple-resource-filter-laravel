<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ISBN', 'title', 'price','author_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

}
