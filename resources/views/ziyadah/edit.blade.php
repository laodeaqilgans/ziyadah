<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ziyadah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="text-center">Edit Ziyadah</h1>

    <form action="{{ route('ziyadah.update', $ziyadah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Dropdown for Juz -->
        <div class="form-group">
            <label for="juz">Juz</label>
            <select name="juz" id="juz" class="form-control" required>
                <option value="" disabled>Pilih Juz</option>
                @for ($i = 1; $i <= 30; $i++)
                    <option value="{{ $i }}" {{ $ziyadah->juz == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="form-group">
          <label for="santri">Santri</label>
          <input type="text" name="santri" id="santri" class="form-control" value="{{ old('santri', $ziyadah->santri) }}" required>
        </div>
      

        <div class="form-group">
            <label for="surat">Surat</label>
            <input type="text" name="surat" id="surat" class="form-control" value="{{ old('surat', $ziyadah->surat) }}" required>
        </div>

        <div class="form-group">
            <label for="ayat">Ayat</label>
            <input type="number" name="ayat" id="ayat" class="form-control" value="{{ old('ayat', $ziyadah->ayat) }}" required>
        </div>

        <div class="form-group">
            <label for="catatan">Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control">{{ old('catatan', $ziyadah->catatan) }}</textarea>
        </div>

        <div class="form-group">
            <label for="tanggal_ziyadah">Tanggal Ziyadah</label>
            <input type="date" name="tanggal_ziyadah" id="tanggal_ziyadah" class="form-control" value="{{ old('tanggal_ziyadah', $ziyadah->tanggal_ziyadah) }}" required>
        </div>

        <button type="submit" class="btn btn-warning mt-3">Update Ziyadah</button>
        <a href="{{ route('ziyadah.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </form>
</div>
</body>
</html>
