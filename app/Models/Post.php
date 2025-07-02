<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Console\ModelMakeCommand;
use Illuminate\Support\Facades\File as File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $slug, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;
    }

    public static function find($slug)
    {
        $path = resource_path() . "/posts/{$slug}.html";

        if (!file_exists($path)) {
            throw new ModelNotFoundException();
        }


        return cache()->remember("post.{$slug}", 5, function () use ($path) {
            $document = YamlFrontMatter::parseFile(
                $path
            );

            return $document->body();
        });
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(
                    function ($files) {
                        return YamlFrontMatter::parseFile(
                            $files
                        );
                    }
                )
                ->map(function ($document) {
                    return new Post($document->title, $document->excerpt, $document->date, $document->slug, $document->body());
                })
                ->sortBy('date');
        });
        //     $files = File::files(resource_path("posts"));
        //     $posts = [];
        //     foreach ($files as $file) {
        //         $document = YamlFrontMatter::parseFile(
        //             $file
        //         );
        //         $posts[] = new Post($document->title, $document->excerpt, $document->date, $document->slug, $document->body());
        //     }
        //     return view('about', [
        //         'posts' => $posts
        //     ]);
    }
}
