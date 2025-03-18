@extends('backend.app')

@section('content')
<div class="container" style="overflow: auto; max-height: 80vh;">
        <h2>Edit Nilai</h2>

        <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="student_id">Siswa</label>
                <select name="student_id" class="form-control select2" required>
                    <option value="">Pilih Siswa</option>
                    @foreach($siswa as $siswa)
                        <option value="{{ $siswa->id }}" {{ $siswa->id == $nilai->student_id ? 'selected' : '' }}>
                            {{ $siswa->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="teacher_id">Guru</label>
                <select name="teacher_id" class="form-control select2" required>
                    <option value="">Pilih Guru</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $teacher->id == $nilai->teacher_id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="mapel_id">Mata Pelajaran</label>
                <select name="mapel_id" class="form-control select2" required>
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach($mapels as $mapel)
                        <option value="{{ $mapel->id }}" {{ $mapel->id == $nilai->mapel_id ? 'selected' : '' }}>
                            {{ $mapel->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="number" name="nilai" class="form-control" value="{{ $nilai->nilai }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
@section('script')
<!-- Memuat CSS dan JS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('.select2').select2({
            placeholder: "Pilih opsi",
            allowClear: true,
            width: '100%'  // Pastikan Select2 menyesuaikan dengan lebar container
        });
    });
</script>
@endsection
