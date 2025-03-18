@extends('backend.app')

@section('content')
<div class="container" style="overflow: auto; max-height: 80vh;">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tables</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tables</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Nilai</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Tabel Nilai</div>
                        <a href="{{ route('nilai.create') }}" class="btn btn-success btn-sm">Tambah</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('nilai') }}" method="GET" class="d-flex mb-3">
                            <select name="search" class="form-control form-control-sm select2" style="width: 200px;">
                                <option value="">Pilih Siswa, Guru, atau Mapel</option>
                                @foreach($nilais as $nilai)
                                    <option value="{{ $nilai->student->name }}">{{ $nilai->student->name }}</option>
                                    <option value="{{ $nilai->teacher->name }}">{{ $nilai->teacher->name }}</option>
                                    <option value="{{ $nilai->mapel->name }}">{{ $nilai->mapel->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary btn-sm ms-2">Cari</button>
                        </form>
                        
                        <table class="table table-head-bg-info table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Siswa</th>
                                    <th scope="col">Guru</th>
                                    <th scope="col">Mata Pelajaran</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilais as $index => $nilai)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $nilai->student->name }}</td>
                                        <td>{{ $nilai->teacher->name }}</td>
                                        <td>{{ $nilai->mapel->name }}</td>
                                        <td>{{ $nilai->nilai }}</td>
                                        <td>
                                            <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" id="delete-form-{{ $nilai->id }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $nilai->id }})">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function confirmDelete(nilaiId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Nilai akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + nilaiId).submit();
                }
            })
        }

        // Inisialisasi Select2
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif
@endsection
