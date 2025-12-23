<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Bài viết</title>
</head>
<body>
    <h1>Tất cả Bài viết</h1>
    <hr>
    
    @foreach($posts as $post)
        <div style="border: 1px solid #ccc; margin-bottom: 15px; padding: 10px;">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
        </div>
    @endforeach
    </body>
</html>