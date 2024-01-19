@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-9">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update Profil Desa</h6>
                    <form method="post" action="{{ route('profil.store') }}" enctype="multipart/form-data">
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
                            <select class="form-select @error('judul') is-invalid @enderror" id="judul" name="judul" required>
                                <option value="Sejarah" {{ old('judul') === 'Sejarah' ? 'selected' : '' }}>Sejarah</option>
                                <option value="Visi Misi" {{ old('judul') === 'Visi Misi' ? 'selected' : '' }}>Visi Misi</option>
                                <option value="Struktur Organisasi" {{ old('judul') === 'Struktur Organisasi' ? 'selected' : '' }}>Struktur Organisasi</option>

                            </select>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="noProfil" class="form-label">Nomor Profil Desa</label>
                            <input type="number" class="form-control @error('noProfil') is-invalid @enderror" id="noProfil" name="noProfil"  required value="{{ old('noProfil') }}"></textarea>
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


