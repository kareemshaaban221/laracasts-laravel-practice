<?php


namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post {

    public static function find($pName) {

        $path = resource_path('\\views\\posts\\' . $pName . '.html');

        // dd($path); // testing

        if (! file_exists($path)) {
            // throw new Exception("File Not Found!!!!");

            throw new ModelNotFoundException();
        }

        return cache()->remember("post.$pName", 10 , function () use ($path) {
            return file_get_contents($path);
        });

    }

    public static function all () {
        
        $posts = array_diff(

            scandir( resource_path('\\views\\posts\\') ),
            ['.', '..']

        );

        $contents = [];

        foreach ( $posts as $post ) {

            $path = resource_path('\\views\\posts\\' . $post);

            if (! file_exists($path)) {
                $contents[] = "---------- POST NOT FOUND ------------";
                continue;
            }

            $contents[] = file_get_contents($path);

        }

        return cache()->remember('posts', 10, function () use ($contents) { // caching posts
            return $contents;
        });

    }

}
