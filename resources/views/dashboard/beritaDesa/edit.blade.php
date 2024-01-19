@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Berita Desa</h6>
                    <form method="post" action="/dashboard/berita/{{ $berita->noBerita }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="noBerita" class="form-label">Nomor Berita</label>
                            <input type="number" class="form-control @error('noBerita') is-invalid @enderror"
                                id="noBerita" name="noBerita" autofocus value="{{ old('noBerita', $berita->noBerita) }}">
                            @error('noBerita')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Gambar/File</label>
                            <input type="hidden" name="oldImage" value="{{ $berita->image }}">
                            @if ($berita->image)
                                <img src="{{ asset('storage/' . $berita->image) }}"
                                    class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image" placeholder="Masukan gambar">
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <select class="form-select @error('judul') is-invalid @enderror" id="judul" name="judul">
                                <option value="Berita1" {{ old('judul') === 'Berita1' ? 'selected' : '' }}>Berita1</option>
                                <option value="Berita2" {{ old('judul') === 'Berita2' ? 'selected' : '' }}>Berita2</option>
                                <option value="Berita3" {{ old('judul') === 'Berita3' ? 'selected' : '' }}>Berita3</option>
                            </select>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input id="keterangan" type="hidden" name="keterangan" value="{!! old('keterangan', htmlentities($berita->keterangan)) !!}">
                            <trix-editor class="form-control @error('keterangan') is-invalid @enderror" input="keterangan" required></trix-editor>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror  
                        </div>                          
                        <button type="submit" class=" mt-3 btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
