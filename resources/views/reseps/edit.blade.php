<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Resep</title>
</head>
<body>
    <form action="{{ route('resep.update', $resep->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $resep->title }}" required>
        <textarea name="descriptions" required>{{ $resep->descriptions }}</textarea>
        <textarea name="ingredients" required>{{ $resep->ingredients }}</textarea>
        <textarea name="steps" required>{{ $resep->steps }}</textarea>
        <input type="number" name="cooking_time" value="{{ $resep->cooking_time }}" required>
        <input type="number" name="portion" value="{{ $resep->portion }}" required>
        <input type="file" name="image_path">
        <select name="category" required>
            <option value="makanan" {{ $resep->category === 'makanan' ? 'selected' : '' }}>Makanan</option>
            <option value="minuman" {{ $resep->category === 'minuman' ? 'selected' : '' }}>Minuman</option>
        </select>
        <button type="submit">Perbarui Resep</button>
    </form>
</body>
</html>