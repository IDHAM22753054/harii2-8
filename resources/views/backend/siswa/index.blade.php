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
                    <a href="#">Siswa</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Tabel Siswa</div>
                        <a href="{{ route('siswa.create') }}" class="btn btn-success btn-sm">Tambah</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa') }}" method="GET" class="d-flex mb-3">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari siswa..." value="{{ request()->search }}">
                            <button type="submit" class="btn btn-primary btn-sm ms-2">Cari</button>
                        </form>
                        
                        <table class="table table-head-bg-info table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $index => $student)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->addres }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->status }}</td>
                                        <td>{{ $student->class }}</td>
                                        <td>
                                            @if ($student->image)
                                                <img src="{{ url('backend/' . $student->image) }}" alt="Image" width="50" height="50">
                                            @else
                                                <img src="{{ url('backend/default.png') }}" alt="No Image" width="50" height="50">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('siswa.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('siswa.destroy', $student->id) }}" method="POST" id="delete-form-{{ $student->id }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $student->id }})">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function confirmDelete(studentId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Siswa akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + studentId).submit();
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
