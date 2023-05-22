<!-- resources/views/upload.blade.php -->

<form method="POST" action="{{ route('upload') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="avatar">Avatar:</label>
        <input type="file" id="avatar" name="avatar" required>
    </div>

    <button type="submit">Upload</button>
</form>
