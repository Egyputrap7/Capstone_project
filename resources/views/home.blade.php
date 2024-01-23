@extends('layouts.main')

@section('container')
    <div class="row">
        <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/plang.png" alt="">
    </div>
    <br>

    <div class="text-center mt-4 ">
        <h3>--- Artikel Terkini ---</h3>
    </div>

    <div class="container-fluid pt-2 px-4">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="container-fluid  col-md-12 mx-6">
                <div class="card mx-6">
                    <div class="card-body ">
                        @php
                            $publishedBeritas = $berita_desas->where('published', 1);
                        @endphp

                        @if (count($publishedBeritas) > 0)
                            <div class="row">
                                @foreach ($publishedBeritas as $berita)
                                    <div class="col-md-3 mb-2">
                                        <div class="card" style="width: 18rem;">
                                            @if ($berita->image)
                                                <img src="{{ asset('storage/' . $berita->image) }}" class="card-img-top"
                                                    style="max-height: 150px; object-fit: cover;" alt="...">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="/main/detailBerita/{{ $berita->noBerita }}"
                                                        style="color: inherit; text-decoration: none;">{{ $berita->judul }}</a>
                                                </h5>
                                                <p class="card-text">
                                                    {!! Str::limit($berita->keterangan, 50) !!}
                                                </p>
                                                <a href="/main/detailBerita/{{ $berita->noBerita }}" class="btn btn-sm"
                                                    style="background-color: #04988F; color: #000;">Lihat Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-center">Belum ada artikel terkini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    













@endsection
