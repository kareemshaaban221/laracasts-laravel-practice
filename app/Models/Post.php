<?php


namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use SplFileInfo;

class Post {

    public $title;
    public $discription;
    public $date;
    public $body;
    public $slug; // filename

    function __construct($title, $discription, $date, $body, $slug) {
        $this->title = $title;
        $this->discription = $discription;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all () {

        $files = File::files(resource_path('\\views\\posts'));

        $posts = array_map(
            function (SplFileInfo $file) {
                $post = YamlFrontMatter::parseFile($file);

                return new Post(
                    $post->title,
                    $post->discription,
                    $post->date,
                    $post->body(),
                    $post->slug
                );
            },
            $files
        );

        cache()->forever('posts', $posts);

        return $posts;

    }

    public static function find($slug) {

        $posts = static::all();

        foreach($posts as $post) {
            if ($post->slug == $slug)
                return $post;
        }

        throw new ModelNotFoundException();

    }

}
