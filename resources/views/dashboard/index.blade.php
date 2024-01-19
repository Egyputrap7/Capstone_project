@extends('dashboard.layouts.main')

@section('container')
<!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-5">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Surat Permohonan KTP</p>
                        <h6 class="mb-0">{{ $totalKTP }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-5">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Surat Permohonan KK</p>
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
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Daftar Surat Permohonan KTP</h6>
                <a href="/dashboard/ktp">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">No Surat</th>
                            <th scope="col">Nama Pemohon</th>
                            <th scope="col">Tanggal Surat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ktp_barus as $ktp)
                        <tr>
                            <td>{{ $ktp->id }}</td>
                            <td>{{ $ktp->nama }}</td>
                            <td>{{ date('d M Y', strtotime($ktp->tglSurat)); }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Daftar Surat Permohonan KK</h6>
                <a href="/dashboard/kk">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">No Surat</th>
                            <th scope="col">Nama Pemohon</th>
                            <th scope="col">Tanggal Surat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kk_barus as $kk)
                        <tr>
                            <td>{{ $kk->id }}</td>
                            <td>{{ $kk->nama }}</td>
                            <td>{{ date('d M Y', strtotime($kk->tglSurat)); }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection