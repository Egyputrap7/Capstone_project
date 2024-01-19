@extends('dashboard.layouts.main')

@section('container')
<!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-5">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Feedback</p>
                        <h6 class="mb-0">{{ $totalfeedback }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Id</th>
                            <th scope="col">Pesan</th>
                            <th scope="col">Waktu Pembaharuan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedback as $Feedback)
                        <tr>
                            <td>{{ $Feedback->id }}</td>
                            <td>{{ $Feedback->pesan }}</td>
                            <td>{{ $Feedback->created_at }}</td>
                            <td class="d-flex justify-content-center">
                                <a class=" mx-2 btn btn-sm btn-primary" href="/dashboard/Feedback/{{ $Feedback->id }}">Detail</a>
                                <form action="/dashboard/Feedback/{{ $Feedback->id }}" method="post" class="d-inline">                                    @method('delete')
                                    @csrf 
                                    <button class=" mx-2 btn btn-sm btn-danger border-0" onclick="return confirm('Kilik Oke Untuk Menghapus')">Hapus</button>
                                </form>
                                {{-- <a class="btn btn-sm btn-danger" href="#">Hapus</a> --}}
                                {{-- <a class="btn btn-sm btn-success" href="/dashboard/profil/{{ $profil->noProfil }}/cetak">Cetak</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex mt-3">
                    {{ $feedback->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->
@endsection