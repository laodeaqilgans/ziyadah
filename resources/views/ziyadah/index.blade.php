<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ziyadah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4 text-center">Daftar Ziyadah</h1>

        <!-- Card Gambar di atas Tabel -->
        <div class="card mb-4">
            <img src="{{ asset('images/card.jpg') }}" class="card-img-top" alt="Ziyadah Image" style="height: 210px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title">Pentingnya Melakukan Ziyadah</h5>
                <p class="card-text">Ziyadah adalah aktivitas tambahan yang sangat bermanfaat untuk meningkatkan kualitas ibadah dan pemahaman agama. Setiap langkah dalam aktivitas ini memiliki nilai yang besar, baik untuk diri sendiri maupun untuk orang lain.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Semua Kegiatan Ziyadah
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Santri</th> <!-- Menambahkan header kolom Santri -->
                        <th>Juz</th>
                        <th>Surat</th>
                        <th>Ayat</th>
                        <th>Catatan</th>
                        <th>Tanggal Ziyadah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ziyadah as $ziyadah_item)
                        <tr>
                            <td>{{ $ziyadah_item->santri }}</td> <!-- Menampilkan kolom Santri -->
                            <td>{{ $ziyadah_item->juz }}</td>
                            <td>{{ $ziyadah_item->surat }}</td>
                            <td>{{ $ziyadah_item->ayat }}</td>
                            <td>{{ Str::limit($ziyadah_item->catatan, 50) }}</td>
                            <td>{{ $ziyadah_item->tanggal_ziyadah }}</td>
                            <td>
                                <a href="{{ route('ziyadah.edit', $ziyadah_item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('ziyadah.destroy', $ziyadah_item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
                <a href="{{ route('ziyadah.create') }}" class="btn btn-primary mt-3">Tambah Ziyadah</a>
            </div>
        </div>
    </div>
</body>
</html>
