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
                        <div class="card-title">Tabel Mapel</div>
                        <a href="{{ route('mapel.create') }}" class="btn btn-success btn-sm">Tambah</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-head-bg-info table-hover" id="mapel" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Dibuat Pada</th>
                                    <th scope="col">Diperbarui Pada</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {

$('#mapel').DataTable({

processing: true,

serverSide: true,

ajax: "{{ route('mapel') }}",

columns: [

{ data: 'DT_RowIndex', orderable: false, searchable: false },

{ data: 'name', name: 'name' },

{ data: 'created_at', name: 'created_at' },

{ data: 'updated_at', name: 'updated_at' },

{ data: 'action', name: 'action' },

// Define more columns as per your table structure

]

});

});
</script>
    <script>
        function confirmDelete(mapelId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Mapel akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + mapelId).submit();
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
