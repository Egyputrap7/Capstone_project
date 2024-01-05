@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-9">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"> persyaratan</h6>
                    <div class="container mt-4">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">{{ $Feedback->pesan }}</p>
                                <p class="card-text"><small class="text-muted">Diperbarui pada: {{ $Feedback->created_at }} </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


