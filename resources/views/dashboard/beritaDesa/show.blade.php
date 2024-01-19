@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-9">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"> {{ $berita->judul }}</h6>
                    <div class="container mt-4">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('storage/' . $berita->image) }}"
                                    class="img-fluid mb-3 col-sm-5 d-block mx-auto">
                                    <p class="card-text">{!! $berita->keterangan !!}</p>
                                <p class="card-text"><small class="text-muted">Diperbarui pada: {{ $berita->created_at }} </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


