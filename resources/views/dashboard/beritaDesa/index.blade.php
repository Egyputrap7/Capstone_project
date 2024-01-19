@extends('dashboard.layouts.main')

@section('container')
<!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-5">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Berita Desa</p>
                        <h6 class="mb-0">{{ $totalBerita }}</h6>
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
                <h6 class="mb-0">Daftar Berita Desa</h6>
                <a href="/dashboard/berita/create" class="btn btn-primary">Tambah Berita Desa</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">No Berita</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Waktu Pembaharuan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita_desas as $berita)
                        <tr>
                            <td>{{ $berita->noBerita }}</td>
                            <td>{{ $berita->judul }}</td>
                            <td>{{ $berita->created_at }}</td>
                            <td class="d-flex justify-content-center">
                                <a class=" mx-2 btn btn-sm btn-primary" href="/dashboard/berita/{{ $berita->noBerita }}">Detail</a>
                                <a class=" mx-2 btn btn-sm btn-warning" href="/dashboard/berita/{{ $berita->noBerita }}/edit">Edit</a>
                                <form action="/dashboard/berita/{{ $berita->noBerita }}" method="post" class="d-inline">                                    @method('delete')
                                    @csrf 
                                    <button class=" mx-2 btn btn-sm btn-danger border-0" onclick="return confirm('Kilik Oke Untuk Menghapus')">Hapus</button>
                                </form>
                                @if ($berita->published)
                                <form action="{{ route('berita.takedown', $berita->noBerita) }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf 
                                    <button class="mx-2 btn btn-sm btn-danger border-0" onclick="return confirm('Klik Oke Untuk Takedown')">Takedown</button>
                                </form>
                            @else
                                <form action="{{ route('berita.publish', $berita->noBerita) }}" method="post" class="d-inline">
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
                    {{ $berita_desas->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection