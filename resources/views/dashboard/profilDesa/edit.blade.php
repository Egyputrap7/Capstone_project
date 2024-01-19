@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-9">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Profil Desa</h6>
                    <form method="post" action="/dashboard/profil/{{ $profil->noProfil }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="noProfil" class="form-label">Nomor Profil</label>
                            <input type="number" class="form-control @error('noProfil') is-invalid @enderror"
                                id="noProfil" name="noProfil" autofocus value="{{ old('noProfil', $profil->noProfil) }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Gambar/File</label>
                            <input type="hidden" name="oldImage" value="{{ $profil->image }}">
                            @if ($profil->image)
                                <img src="{{ asset('storage/' . $profil->image) }}"
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
                                <option value="Visi Misi" {{ old('judul', $profil->judul) === 'Visi Misi' ? 'selected' : '' }}>Visi Misi</option>
                                <option value="Sejarah" {{ old('judul', $profil->judul) === 'Sejarah' ? 'selected' : '' }}>Sejarah</option>
                                <option value="Struktur Organisasi" {{ old('judul', $profil->judul) === 'Struktur Organisasi' ? 'selected' : '' }}>Struktur Organisasi</option>
                            </select>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input id="keterangan" type="hidden" name="keterangan" value="{!! old('keterangan', htmlentities($profil->keterangan)) !!}">
                            <trix-editor class="form-control @error('keterangan') is-invalid @enderror" input="keterangan" required></trix-editor>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            
                            
                            <button type="submit" class=" mt-3 btn btn-primary">Edit</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
