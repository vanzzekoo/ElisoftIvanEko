

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="thumbnail">Thumbnail:</label>
        <input type="text" name="thumbnail" id="thumbnail" value="{{ $post->thumbnail }}">
    </div>
    <div>
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul" value="{{ $post->judul }}">
    </div>
    <div>
        <label for="konten">Konten:</label>
        <textarea name="konten" id="konten">{{ $post->konten }}</textarea>
    </div>
    <div>
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="Draft" {{ $post->status === 'Draft' ? 'selected' : '' }}>Draft</option>
            <option value="Publish" {{ $post->status === 'Publish' ? 'selected' : '' }}>Publish</option>
        </select>
    </div>
    <div>
        <label for="tanggal_publikasi">Tanggal Publikasi:</label>
        <input type="text" name="tanggal_publikasi" id="tanggal_publikasi" value="{{ $post->tanggal_publikasi }}">
    </div>
    <button type="submit">Simpan</button>
</form>


<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor',
        toolbar_mode: 'floating',
    });
</script>
