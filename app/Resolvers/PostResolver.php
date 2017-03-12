<?php
/**
 * Created by PhpStorm.
 * User: praveen
 * Date: 3/12/17
 * Time: 7:22 AM
 */

namespace App\Resolvers;


use App\Post;

class PostResolver extends ModelResolver
{
    private $post;
    protected $postTypes = [
        'audio',
//        'big-slider',
        'gallery',
        'link',
        'quote',
        'standard',
        'video'
    ];
    
    public static function getTypes()
    {
        return (new static())->postTypes;
    }
    
    private function __construct(Post $post = null)
    {
        $this->post = $post;
    }
    
    public function resolve(Post $post)
    {
        /*
        switch ($post->type) {
            case 'audio':
        }
        */
    }
    
    public static function resolvePost(Post $post = null)
    {
        if (is_null($post)) {
            return new static();
        } else return (new static())->resolve($post);
    }
    
    public static function resolvePosts(Array $posts)
    {
        $resolved = array();
        
        $self = new static();
        
        foreach ($posts as $post) {
            $resolved[] = $self->resolve($post);
        }
        
        return $resolved;
    }
    
    public static function generateLink(Post $post = null)
    {
        if ( ! $post) {
            return url('posts');
        }
        
        return config('app.url') . "/post/" . $post->name;
    }
}