<div class="container">
    <h1>Create Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="thumbnail">Thumbnail:</label>
            <input type="text" name="thumbnail" id="thumbnail" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>

    <div>
        <label for="konten">Konten:</label>
        <textarea name="konten" id="konten"></textarea>
    </div>

           <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Draft">Draft</option>
                    <option value="Publish">Publish</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tanggal_publikasi">Tanggal Publikasi:</label>
                <input type="date" name="tanggal_publikasi" id="tanggal_publikasi" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>


<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor',
        toolbar_mode: 'floating',
    });
</script>
