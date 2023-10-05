<!DOCTYPE html>
<html>
<head>
    <title>Delete Image</title>
</head>
<body>
    <h1>Delete Image</h1>
    <p>Are you sure you want to delete this image?</p>

    <form method="POST" action="/images/{{ $image->id }}">
        @csrf
        @method('DELETE')
        <button type="submit">Yes, Delete</button>
    </form>

    <a href="/images">Cancel</a>
</body>
</html>
