@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Tambah Berita Desa</h6>
                    <form method="post" action="{{ route('berita.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Gambar/File</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror"  id="image" name="image" placeholder="Masukan Gambar" >
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                name="judul" placeholder="Judul" required value="{{ old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="noBerita" class="form-label">Nomor Berita Desa</label>
                            <input type="number" class="form-control @error('noBerita') is-invalid @enderror" id="noBerita" name="noBerita"  required value="{{ old('noBerita') }}"></textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input id="keterangan" type="hidden" name="keterangan" required value="{{ old('keterangan') }}">
                            <trix-editor class="form-control @error('keterangan') is-invalid @enderror" input="keterangan" required></trix-editor>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


