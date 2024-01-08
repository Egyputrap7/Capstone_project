@extends('layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="bg-light rounded h-100 p-4">
                    @if($syarats->isEmpty())
                        <p>Informasi belum tersedia</p>
                    @else
                        @foreach ($syarats as $syarat)
                            <div>
                                <h4>{{ $syarat->judul }}</h4>
                                <p>{!! $syarat->keterangan !!}</p>
                                <!-- Tambahan informasi profil lainnya -->
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection