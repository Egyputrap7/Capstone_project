@extends('layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="bg-light rounded h-100 p-4">
                    @if($profil_desas->isEmpty())
                        <p>Informasi belum tersedia</p>
                    @else
                        @foreach ($profil_desas as $profil)
                            <div>
                                <h3>{{ $profil->judul }}</h3>
                                <p>{!! $profil->keterangan !!}</p>
                                <!-- Tambahan informasi profil lainnya -->
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection