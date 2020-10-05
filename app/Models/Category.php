<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category'
    ];

    protected $hidden = [
        'id', 'pivot' , 'created_at', 'updated_at'
    ];

    public function books(){
        return $this->belongsToMany(Book::class);
    }
}
