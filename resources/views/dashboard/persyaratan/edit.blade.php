@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Persyaratan</h6>
                    <form method="post" action="/dashboard/syarat/{{ $syarat->noSyarat }}" >
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="noSyarat" class="form-label">Nomor Persyaratan</label>
                            <input type="number" class="form-control @error('noSyarat') is-invalid @enderror" id="noSyarat" name="noSyarat"  value="{{ old('noSyarat', $syarat->noSyarat) }}" disabled></textarea>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <select class="form-select @error('judul') is-invalid @enderror" id="judul" name="judul">
                                <option value="Alur" {{ old('judul', $syarat->judul) === 'Alur' ? 'selected' : '' }}>Alur</option>
                                <option value="Persyaratan" {{ old('judul', $syarat->judul) === 'Persyaratan' ? 'selected' : '' }}>Persyaratan</option>
                                {{-- <option value="Struktur Organisasi" {{ old('judul', $syarat->judul) === 'Struktur Organisasi' ? 'selected' : '' }}>Struktur Organisasi</option> --}}
                            </select>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input id="keterangan" type="hidden" name="keterangan" value="{!! old('keterangan', htmlentities($syarat->keterangan)) !!}">
                            <trix-editor class="form-control @error('keterangan') is-invalid @enderror" input="keterangan" required></trix-editor>
                            @error('keterangan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="penulis" class="form-label">Penulis</label>
                                <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis"   value="{{ old('penulis', $syarat->penulis) }}"></textarea>
                                @error('penulis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            
                            
                            <button type="submit" class=" mt-3 btn btn-primary">Edit Surat</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
