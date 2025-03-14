@extends('backend.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Tambah Mapel</div>
                    <a href="{{ route('mapel') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('mapel.store') }}">
                        @csrf

                        <!-- Kolom Name -->
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Menampilkan Created At dan Updated At sebagai informasi yang tidak bisa diubah -->
                        <div class="form-group row">
                            <label for="created_at" class="col-md-4 col-form-label text-md-right">Created At</label>
                            <div class="col-md-6">
                                <input id="created_at" type="text" class="form-control" name="created_at" value="{{ now()->format('d-m-Y H:i:s') }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="updated_at" class="col-md-4 col-form-label text-md-right">Updated At</label>
                            <div class="col-md-6">
                                <input id="updated_at" type="text" class="form-control" name="updated_at" value="{{ now()->format('d-m-Y H:i:s') }}" disabled>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
