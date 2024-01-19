@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Data Arsip Permohonan KTP</h6>
                    <form method="post" action="/dashboard/arsipktp/{{ $aktp->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">Nomor Surat</label>
                            <input type="number" class="form-control @error('id') is-invalid @enderror"
                                id="id" name="id" autofocus value="{{ old('id', $aktp->id) }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="jenisKTP" class="form-label">Jenis KTP</label>
                            <select class="form-select @error('jenisKTP') is-invalid @enderror" id="jenisKTP"
                                name="jenisKTP" required>
                                <option value="KTP Baru" {{ old('jenisKTP', $aktp->jenisKTP) === 'KTP Baru' ? 'selected' : '' }}>KTP Baru
                                </option>
                                <option value="Perpanjangan KTP"
                                    {{ old('jenisKTP', $aktp->jenisKTP) === 'Perpanjangan KTP' ? 'selected' : '' }}>Perpanjangan KTP</option>
                                <option value="Penggantian KTP"
                                    {{ old('jenisKTP', $aktp->jenisKTP) === 'Penggantian KTP' ? 'selected' : '' }}>Penggantian KTP</option>
                            </select>
                            @error('jenisKTP')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Nama Lengkap" required value="{{ old('nama', $aktp->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="noKK" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="number" class="form-control @error('noKK') is-invalid @enderror" id="noKK"
                                name="noKK" placeholder="Nomor KK" required value="{{ old('noKK', $aktp->noKK) }}">
                            @error('noKK')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">Nomor Induk Keluarga</label>
                            <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                                name="nik" required value="{{ old('nik', $aktp->nik) }}">
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" style="height: 150px;" required>{{ old('alamat', $aktp->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="RT" class="form-label">RT</label>
                            <input type="number" class="form-control @error('RT') is-invalid @enderror" id="RT"
                                name="RT" required value="{{ old('RT', $aktp->RT) }}">
                            @error('RT')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="RW" class="form-label">RW</label>
                            <input type="number" class="form-control @error('RW') is-invalid @enderror" id="RW"
                                name="RW" required value="{{ old('RW', $aktp->RW) }}">
                            @error('RW')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kodePos" class="form-label">Kode Pos</label>
                            <input type="number" class="form-control @error('kodePos') is-invalid @enderror" id="kodePos"
                                name="kodePos" required value="{{ old('kodePos', $aktp->kodePos) }}">
                            @error('kodePos')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3 mt-3">
                                <label for="tglSurat" class="form-label">Tanggal</label>
                                <input type="date" class="form-control @error('tglSurat') is-invalid @enderror"
                                    id="tglSurat" name="tglSurat" required value="{{ old('tglSurat', $aktp->tglSurat) }}">
                                @error('tglSurat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="Camat" class="form-label">Camat</label>
                                <input type="text" class="form-control @error('Camat') is-invalid @enderror"
                                    id="Camat" name="Camat" required value="{{ old('Camat', $aktp->Camat) }}">
                                @error('Camat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="lurah" class="form-label">Kepala Desa</label>
                                <input type="text" class="form-control @error('lurah') is-invalid @enderror"
                                    id="lurah" name="lurah" required value="{{ old('lurah', $aktp->lurah) }}">
                                @error('lurah')
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
