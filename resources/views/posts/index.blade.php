<a href="{{ route('posts.create') }}">Buat Post Baru</a>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Thumbnail</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Tanggal Publikasi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ $post->thumbnail }}" alt="Thumbnail" width="100"></td>
                <td>{{ $post->judul }}</td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->tanggal_publikasi }}</td>
                <td>
                    <a href="{{ route('posts.show', $post) }}">Tampilkan</a>
                    <a href="{{ route('posts.edit', $post) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
