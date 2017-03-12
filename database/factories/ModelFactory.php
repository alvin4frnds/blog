<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Attachment;
use App\Comment;
use App\Post;
use App\Resolvers\PostResolver;
use App\Resolvers\TagResolver;
use App\Tag;

$featuredImages = array(
    'images/thumbs/about-us.jpg',
    'images/thumbs/concert.jpg',
    'images/thumbs/diagonal-building.jpg',
    'images/thumbs/diagonal-pattern.jpg',
    'images/thumbs/ferris-wheel.jpg',
    'images/thumbs/liberty.jpg',
    'images/thumbs/lighthouse.jpg',
    'images/thumbs/ottawa-bokeh.jpg',
    'images/thumbs/salad.jpg',
    'images/thumbs/shutterbug.jpg',
    'images/thumbs/usaf-rocket.jpg',
    'images/thumbs/wall-clock.jpg',
);

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => bcrypt('test1234'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Post::class, function (Faker\Generator $faker) use ($featuredImages) {
    
    $postTypes = PostResolver::getTypes();
    
    $title = $faker->sentence(5);
    
    $default = [
        'user_id'  => $faker->numberBetween(1, 9),
        'featured' => config('app.url') . "/" .$featuredImages[$faker->numberBetween(0, count($featuredImages) - 1)],
        'title'    => $title,
        'content'  => $faker->paragraph(2),
        'name'     => PostResolver::generateName($title),
    ];
    
    switch ($postTypes[$faker->numberBetween(0, count($postTypes) -1)]) {
        case 'gallery':
            $specific = [
                'type'          => 'gallery',
                'attachment_id' => 2,
            ];
            break;
        case 'audio':
            $specific = [
                'type'          => 'audio',
                'attachment_id' => 3,
            ];
            break;
        case 'video':
            $specific = [
                'type'          => 'video',
                'attachment_id' => 4,
            ];
            break;
        case 'link':
            $specific = [
                'type' => 'link',
                'content' => $faker->url,
            ];
            break;
        case 'quote':
            $specific = [
                'type' => 'quote',
                'content'  => $faker->paragraph(1),
            ];
            break;
        case 'standard':
            $specific = [
                'type' => 'standard',
            ];
            break;
        default:
            $specific = [
                'type' => 'none',
            ];
            break;
    }
    
    return array_merge($default, $specific);
});

$factory->define(Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id'       => $faker->numberBetween(1, 50),
        'user_id'       => $faker->numberBetween(1, 9),
        'attachment_id' => $faker->boolean(60) ? $faker->numberBetween(1, 20) : null,
        'share_count'   => $faker->numberBetween(0, 99),
        'agree_count'   => $faker->numberBetween(-40, 40),
    ];
});

$factory->define(Attachment::class, function (Faker\Generator $faker) use ($featuredImages) {
    return [
        'parent' => 0,
        'title'  => $faker->sentence(4),
        'url'    => config('app.url') ."/" .$featuredImages[$faker->numberBetween(0, count($featuredImages) - 1)],
        'meta'   => null,
        'mime'   => 'image/jpeg',
    ];
});

$factory->define(Tag::class, function (Faker\Generator $faker) {
    $title = $faker->sentence(2);
    
    return [
        'title'   => $title,
        'name'    => TagResolver::generateName($title),
    ];
});