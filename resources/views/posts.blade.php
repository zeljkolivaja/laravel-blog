<!DOCTYPE html>
<html>

<head>
    <title>My blog</title>
    <link rel="stylesheet" href="app.css">
</head>


<?php foreach ($posts as $post) : ?>

    <article>
        <?php echo $post ?>
    </article>

<?php endforeach ?>


</html>