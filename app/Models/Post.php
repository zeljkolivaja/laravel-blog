<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\Static_;
use Spatie\YamlFrontMatter\YamlFrontMatter;


class Post
{

    public $title;
    public $excerpt;
    public $body;
    public $date;
    public $slug;

    public function __construct($title, $excerpt, $body, $date, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->date = $date;
        $this->slug = $slug;
    }


    public static function find($slug)
    {
        // $document = YamlFrontMatter::parseFile(resource_path("posts/$slug.html"));
        // $post  = new Post(
        //     $document->title,
        //     $document->excerpt,
        //     $document->body(),
        //     $document->date,
        //     $document->slug,
        // );

        // return $post;

        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }

    public static function all()
    {

        $posts = collect(File::files(resource_path("posts")))
            ->map(function ($file) {
                $document = YamlFrontMatter::parseFile($file);

                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->body(),
                    $document->date,
                    $document->slug,
                );
            });

        return $posts;
    }
}
