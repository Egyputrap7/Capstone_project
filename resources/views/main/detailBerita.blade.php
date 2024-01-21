@extends('layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="bg-light rounded h-100 p-4">
                    <h2>{{ $berita->judul }}</h2>
                    @if ($berita->image)
                        <img src="{{ asset('storage/' . $berita->image) }}" class="img-fluid rounded" alt="{{ $berita->judul }}">
                    @endif
                    <p class="mt-3">{{ $berita->keterangan }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection