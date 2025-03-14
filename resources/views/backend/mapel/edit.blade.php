@extends('backend.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Edit Mapel</div>
                    <a href="{{ route('mapel') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('mapel.update', $mapel->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Kolom Name -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $mapel->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Tampilkan Created At dan Updated At -->
                        <div class="form-group row">
                            <label for="created_at" class="col-md-4 col-form-label text-md-right">Created At</label>
                            <div class="col-md-6">
                                <input id="created_at" type="text" class="form-control" name="created_at" value="{{ $mapel->created_at->format('d-m-Y H:i:s') }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="updated_at" class="col-md-4 col-form-label text-md-right">Updated At</label>
                            <div class="col-md-6">
                                <input id="updated_at" type="text" class="form-control" name="updated_at" value="{{ $mapel->updated_at->format('d-m-Y H:i:s') }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
