@extends('dashboard.layouts.main')

@section('container')
<!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-5">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Alur & Persyaratan</p>
                        <h6 class="mb-0">{{ $totalPersyaratan }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Daftar Persyaratan</h6>
                <a href="/dashboard/syarat/create" class="btn btn-primary">Tambah Persyaratan</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">No Syarat</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Waktu Pembaharuan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($persyaratans as $syarat)
                        <tr>
                            <td>{{ $syarat->noSyarat }}</td>
                            <td>{{ $syarat->judul }}</td>
                            <td>{{ $syarat->penulis }}</td>
                            <td>{{ $syarat->created_at }}</td>
                            <td class="d-flex justify-content-center">
                                <a class=" mx-2 btn btn-sm btn-primary" href="/dashboard/syarat/{{ $syarat->noSyarat }}">Detail</a>
                                <a class=" mx-2 btn btn-sm btn-warning" href="/dashboard/syarat/{{ $syarat->noSyarat }}/edit">Edit</a>
                                <form action="/dashboard/syarat/{{ $syarat->noSyarat }}" method="post" class="d-inline">                                    @method('delete')
                                    @csrf 
                                    <button class=" mx-2 btn btn-sm btn-danger border-0" onclick="return confirm('Kilik Oke Untuk Menghapus')">Hapus</button>
                                </form>
                                @if ($syarat->published)
                                <form action="{{ route('syarat.takedown', $syarat->noSyarat) }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf 
                                    <button class="mx-2 btn btn-sm btn-danger border-0" onclick="return confirm('Klik Oke Untuk Takedown')">Takedown</button>
                                </form>
                            @else
                                <form action="{{ route('syarat.publish', $syarat->noSyarat) }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf 
                                    <button class="mx-2 btn btn-sm btn-success border-0" onclick="return confirm('Klik Oke Untuk Publish')">Publish</button>
                                </form>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex mt-3">
                    {{ $persyaratans->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection