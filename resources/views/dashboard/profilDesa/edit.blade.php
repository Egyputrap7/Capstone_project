@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Surat Keterangan Usaha</h6>
                    <form method="post" action="/dashboard/profil/{{ $profil->noProfil }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="noProfil" class="form-label">Nomot Profil</label>
                            <input type="number" class="form-control @error('noProfil') is-invalid @enderror"
                                id="noProfil" name="noProfil" autofocus value="{{ old('noProfil', $profil->noProfil) }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">Gambar/FIle</label>
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
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"   value="{{ old('judul', $profil->judul) }}"></textarea>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan', $profil->keterangan) }}">
                            <trix-editor class="form-control @error('keterangan') is-invalid @enderror" input="keterangan" required></trix-editor>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                            
                            <button type="submit" class=" mt-3 btn btn-primary">Edit Surat</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
