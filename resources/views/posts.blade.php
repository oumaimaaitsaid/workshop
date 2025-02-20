<!-- resources/views/posts.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Posts</title>
</head>
<body>

    <h1>Mes Posts</h1>

    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <small>Publié par : {{ $post->user->name }}</small>
        </div>
    @endforeach

</body>
</html>
