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

    <div class="post">

        @if ($post_id == 1)

            <h1> First post </h1>

            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa suscipit perferendis unde excepturi enim error. Nulla blanditiis tempora commodi iste, provident inventore quia magnam harum non repudiandae, maiores aut! Numquam.
            </p>

        @elseif ($post_id == 2)

            <h1> Second post </h1>

            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa suscipit perferendis unde excepturi enim error. Nulla blanditiis tempora commodi iste, provident inventore quia magnam harum non repudiandae, maiores aut! Numquam.
            </p>

        @else

            <h1> Third post </h1>

            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa suscipit perferendis unde excepturi enim error. Nulla blanditiis tempora commodi iste, provident inventore quia magnam harum non repudiandae, maiores aut! Numquam.
            </p>

        @endif

        <a href="/"> <- Go Back </a>

    </div>

</body>
</html>
