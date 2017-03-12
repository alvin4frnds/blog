<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->specificAttachments();
        
        factory(App\User::class, 10)->create();
        factory(App\Attachment::class, 20)->create();
        factory(App\Post::class, 50)->create();
        factory(App\Comment::class, 50)->create();
        factory(App\Tag::class, 40)->create();
        
        $this->bindTagsToPosts();
    }
    
    private function bindTagsToPosts()
    {
        $posts = Post::all();
        
        foreach ($posts as $post) {
            $tags = [
                rand(1, 40),
                rand(1, 40),
            ];
            
            $post->tags()->attach($tags);
        }
    }
    
    private function specificAttachments()
    {
        Model::unguard();
        
        $predefinedAttachments = array(
            [
                // TODO: figure out a way to store big-slider
                'title' => 'parent',
                'url'   => config('app.url'),
                'meta'  => ['count' => 3],
                'mime'  => 'application/octet-stream',
            ],
            [
                'title' => 'parent',
                'url'   => config('app.url'),
                'meta'  => [],
                'mime'  => 'application/octet-stream',
            ],
            [
                'title' => 'AirReview-Landmarks-02-ChasingCorporate',
                'url'   => asset('media/AirReview-Landmarks-02-ChasingCorporate.mp3'),
                'meta'  => [],
                'mime'  => 'audio/mpeg',
            ],
            [
                'title' => 'Eminem - Mockingbird.mp4',
                'url'   => asset('media/AirReview-Landmarks-02-ChasingCorporate.mp3'),
                'meta'  => [],
                'mime'  => 'video/mp4',
            ],
            [
                'title' => 'Slider Image 1',
                'parent'=> 2,
                'url'   => asset('images/thumbs/gallery/work.jpg'),
                'meta'  => [],
                'mime'  => 'image/jpg',
            ],
            [
                'title' => 'Slider Image 2',
                'parent'=> 2,
                'url'   => asset('images/thumbs/gallery/work.jpg'),
                'meta'  => [],
                'mime'  => 'image/jpg',
            ],
            [
                'title' => 'Slider Image 2',
                'parent'=> 2,
                'url'   => asset('images/thumbs/gallery/work.jpg'),
                'meta'  => [],
                'mime'  => 'image/jpg',
            ],
        );
        
        foreach ($predefinedAttachments as $attachment)
            App\Attachment::create($attachment);
    
    
        Model::reguard();
        
        return $this;
    }
}
