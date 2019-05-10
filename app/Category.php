<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Any post may have many categories
    // Any category may be applied to many posts
    // A many to many relationship
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    // to get categories by name in the url instead of id number
    public function getRouteKeyName()
    {
        return 'name';
    }

}
