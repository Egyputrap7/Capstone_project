@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-9">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Buat Persyaratan</h6>
                    <form method="post" action="{{ route('syarat.store') }}" >
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <select class="form-select @error('judul') is-invalid @enderror" id="judul" name="judul" required>
                                <option value="Alur" {{ old('judul') === 'Alur' ? 'selected' : '' }}>Alur</option>
                                <option value="Persyaratan" {{ old('judul') === 'Persyaratan' ? 'selected' : '' }}>Persyaratan</option>
                            </select>
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="noSyarat" class="form-label">Nomor Persyaratan</label>
                            <input type="number" class="form-control @error('noSyarat') is-invalid @enderror" id="noSyarat" name="noSyarat"  required value="{{ old('noSyarat') }}"></textarea>
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
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <textarea type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis"  required value="{{ old('penulis') }}"></textarea>
                            @error('penulis')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


