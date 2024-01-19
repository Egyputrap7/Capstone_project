@extends('dashboard.layouts.main')

@section('container')
<!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-5">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total KK</p>
                        <h6 class="mb-0">{{ $totalKK }}</h6>
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
                <h6 class="mb-0">Daftar Permohonan KK</h6>
                <a href="/dashboard/kk/create" class="btn btn-primary">Tambah KK</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col" class="text-center">No Surat</th>
                            <th scope="col" class="text-center">Nama Pemohon</th>
                            <th scope="col" class="text-center">Tanggal Surat</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kk_barus as $kk)
                        <tr>
                            <td class="text-center">{{ $kk->id}}</td>
                            <td>{{ $kk->nama }}</td>
                            <td>{{ $kk->tglSurat }}</td>
                            <td class="d-flex justify-content-center">
                                <a class=" mx-2 btn btn-sm btn-primary" href="/dashboard/kk/{{ $kk->id }}">Detail</a>
                                <a class=" mx-2 btn btn-sm btn-warning" href="/dashboard/kk/{{ $kk->id }}/edit">Edit</a>
                                <form action="{{ route('kk.terima', $kk) }}" method="post" class="d-inline">
                                    @method('post')
                                    @csrf 
                                    <button class="mx-2 btn btn-sm btn-success border-0" onclick="return confirm('Klik Oke Untuk Menerima')">Terima</button>
                                </form>
                                <form action="/dashboard/kk/{{ $kk->id }}" method="post" class="d-inline">                                    @method('delete')
                                    @csrf 
                                    <button class=" mx-2 btn btn-sm btn-danger border-0" onclick="return confirm('Kilik Oke Untuk Menghapus')">Hapus</button>
                                </form>
                                <a class=" mx-2 btn btn-sm btn-success" href="#">Cetak</a>                               
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex mt-3">
                    {{ $kk_barus->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection