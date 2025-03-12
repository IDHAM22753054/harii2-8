@extends('backend.app')

@section('content')
<div class="container">
<div class="container" style="overflow: auto; max-height: 80vh;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Detail Guru</div>
                    <a href="{{ route('teacher') }}" class="btn btn-primary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $teacher->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $teacher->email }}</td>
                        </tr>
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>{{ $teacher->phone }}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>{{ $teacher->jabatan }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $teacher->addres }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $teacher->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $teacher->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}</td>
                        </tr>
                        <tr>
                            <th>Foto</th>
                            <td>
                                @if($teacher->photo)
                                    <img src="{{ url('backend/' . $teacher->photo) }}" alt="Foto Guru" class="img-thumbnail" width="150">
                                @else
                                    <span>Foto tidak tersedia</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Ditambahkan Pada</th>
                            <td>{{ $teacher->created_at}}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diperbarui</th>
                            <td>{{ $teacher->updated_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
