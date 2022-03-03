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

        // jeffery method
        $files = File::files(resource_path('\\views\\posts\\'));

        return array_map( fn ($file) => $file->getContents() , $files );

    }

}
