@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="post" action="/main/feedback">
                @csrf
                <div class="p-3">
                    <label for="message" class="form-label">Isi Kritikan atau Saran</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="12" required></textarea>
                </div>
                <div class="d-grid gap-2 p-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
