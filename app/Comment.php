<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function attachment()
    {
        return $this->belongsTo(Attachment::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
