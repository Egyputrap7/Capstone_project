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
                    <label for="message" class="form-label" style="font-weight: bold; color: black; font-size: 14pt;">Isi Kritikan atau Saran</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="12" required></textarea>
                </div>
                 <!--<div class="d-grid gap-1 p-2">
                <button type="submit" class="btn btn-primary" style="background-color: #04988F; width: 2cm;">Submit</button>
                </div>-->
                <div class="d-grid gap-1 p-2" style="bottom: 0; right: 0; margin-bottom: 20px; margin-right: 10px;">
                    <button type="submit" class="btn btn-primary" style="background-color: #04988F; width: 2cm;">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
