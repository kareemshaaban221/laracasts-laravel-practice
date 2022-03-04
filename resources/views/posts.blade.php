<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POSTS</title>

    <link rel="stylesheet" href="/css/main.css">
</head>
<body>

    @foreach ($posts as $post)
        <div class="post">
            <h1>
                <a href="/post/<?= $post->slug ?>">
                    <?= $post->title ?>
                </a>
            </h1>

            <p>
                <?= $post->discription ?>
            </p>
        </div>
    @endforeach

</body>
</html>
