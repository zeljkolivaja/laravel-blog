<!DOCTYPE html>
<html>

<head>
    <title>My blog</title>
    <link rel="stylesheet" href="app.css">
</head>


<?php

foreach ($posts as $post) : ?>
    <article>

        <h1>
            <a href="/posts/<?= $post->slug ?>"><?php echo $post->title ?></a>
        </h1>

        <div><?= $post->excerpt ?></div>

    </article>

<?php endforeach ?>


</html>