<?php
use App\Post;
use App\Resolvers\PostResolver;

/**
 * Created by PhpStorm.
 * User: praveen
 * Date: 3/12/17
 * Time: 9:44 AM
 */

function postLink(Post $post = null) {
    return PostResolver::generateLink($post);
}