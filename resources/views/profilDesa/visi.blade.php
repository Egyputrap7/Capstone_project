@extends('layouts.main')

@section('container')
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    @if($profil_desas->isEmpty())
                        <p>Informasi belum tersedia</p>
                    @else
                        @foreach ($profil_desas as $profil)
                            <div>
                                <h2>{{ $profil->judul }}</h2>
                                <p>{!! $profil->keterangan !!}</p>
                                <!-- Tambahan informasi profil lainnya -->
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <!-- Header End -->
    @endsection
