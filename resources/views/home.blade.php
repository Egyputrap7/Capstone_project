@extends('layouts.main')

@section('container')
    <div class="row">
        <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/plang.png" alt="">
    </div>
    <br> </br>

    <div class="text-center mt-4">
        <h3>--- Artikel Terkini ---</h3>
    </div>
    <br> </br>

    <div class="container-fluid pt-4 px-4">>
        <div id="carouselExampleCaptions" class="carousel slide">

            <div class="carousel-inner">

                @foreach ($berita_desas as $key => $berita)
                <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
                    @if ($berita->image)
                        <img src="{{ asset('storage/' . $berita->image) }}" class="w-100" alt="...">
                    @endif
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $berita->judul }}</h5>
                        <p>
                            {!! Str::limit($berita->keterangan, 50) !!} <!-- Limit the description to 100 characters -->
                            <a href="/main/detailBerita/{{ $berita->noBerita }}" class="btn btn-sm" style="background-color: #04988F; color: #000;">Lihat Selengkapnya</a>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
    
@endsection
