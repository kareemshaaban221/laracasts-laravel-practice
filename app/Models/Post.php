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

        return cache()->rememberForever('posts',
            function () {
                return collect( File::files(resource_path('\\views\\posts')) )
                    ->map(
                        fn ($file) => YamlFrontMatter::parseFile($file)
                    )
                    ->map(
                        fn ($doc) =>
                        new Post(
                            $doc->title,
                            $doc->discription,
                            $doc->date,
                            $doc->body(),
                            $doc->slug
                        )
                    )
                    ->sortBy('slug'); // sorting
            }
        );

    }

    public static function find($slug) {

        $post = static::all()->firstWhere('slug', $slug);

        return $post ? $post : throw new ModelNotFoundException();
    }

}
