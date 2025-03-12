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
                    <a href="#">Basic Tables</a>
                </li>
            </ul>
        </div>
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Tabel Guru</div> <!-- Mengubah title tabel menjadi "Tabel Guru" -->
                    <a href="{{ route('teacher.create') }}" class="btn btn-success btn-sm">Tambah</a>
                </div>
                <div class="card-body">

                    <!-- Form Pencarian -->
                    <form method="GET" action="{{ route('teacher.index') }}" class="mb-3">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="search" class="form-control" placeholder="Cari guru berdasarkan nama atau email..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">Cari</button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-head-bg-info table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th> <!-- Menambahkan kolom phone -->
                                <th scope="col">Jabatan</th> <!-- Menambahkan kolom jabatan -->
                                <th scope="col">Alamat</th> <!-- Menambahkan kolom alamat (addres) -->
                                <th scope="col">Gender</th> <!-- Menambahkan kolom gender -->
                                <th scope="col">Status</th> <!-- Menambahkan kolom status -->
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $index => $teacher)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->phone }}</td>
                                    <td>{{ $teacher->jabatan }}</td>
                                    <td>{{ $teacher->addres }}</td>
                                    <td>{{ $teacher->gender }}</td>
                                    <td>{{ $teacher->status }}</td>

                                    <td>
                                        <a href="{{ route('teacher.show', $teacher->id) }}" class="btn btn-warning btn-sm">Detail</a>
                                        <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" id="delete-form-{{ $teacher->id }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $teacher->id }})">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        function confirmDelete(teacherId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Guru akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + teacherId).submit();
                }
            })
        }
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
