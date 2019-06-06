<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;
    use Carbon\Carbon;

    class Post extends Model {

        protected $with = ['categories'];

        protected $fillable = [
            'title', 'content', 'created_at', 'updated_at', 'user_id', 'category_id'
        ];

        public function user()
        {
            return $this->belongsTo('App\User');
        }

        // Any post may have many categories
        // Any category may be applied to many posts
        // A many to many relationship
        public function categories()
        {
            return $this->belongsToMany('App\Category', 'category_post');
        }

    }