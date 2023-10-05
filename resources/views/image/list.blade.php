<!DOCTYPE html>
<html>
<head>
    <title>Uploaded Images</title>
</head>
<body>
    <h1>Uploaded Images</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach($images as $image)
            <li>
                <img src="{{ asset('storage/images/' . $image->name) }}" alt="{{ $image->name }}" width="200">
                <form method="POST" action="/images/{{ $image->id }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="/">Upload More Images</a>
</body>
</html>
