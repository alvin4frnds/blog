<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public function comment()
    {
        return $this->hasOne(Comment::class);
    }
    
    public function post()
    {
        return $this->hasOne(Post::class);
    }
    
    public function getMetaAttribute($value)
    {
        return unserialize($value);
    }
    
    public function setMetaAttribute($value)
    {
        $this->attributes['meta'] = serialize($value);
    }
}
