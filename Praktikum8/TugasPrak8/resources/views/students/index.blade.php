@extends('layouts.app') 
  
@section('content') 
<div class="d-flex justify-content-between align-items-center mb-4"> 
    <h2>Daftar Mahasiswa</h2> 
    <a href="{{ route('students.create') }}" class="btn btn-primary">Tambah Mahasiswa</a> 
</div> 

{{-- BAGIAN TAMBAHAN UNTUK JAWABAN LATIHAN 1 --}}

{{-- Poin 2: Menampilkan jurusan dengan mahasiswa terbanyak --}}
<div class="card mb-4 border-success">
    <div class="card-header bg-success text-white">
        <strong>Poin 2: Jurusan dengan Mahasiswa Terbanyak</strong>
    </div>
    <div class="card-body">
        @if(isset($topMajor) && $topMajor)
            <p class="mb-0">Jurusan <strong>{{ $topMajor->name }}</strong> memiliki mahasiswa terbanyak dengan total <strong>{{ $topMajor->students_count }} mahasiswa</strong>.</p>
        @else
            <p class="mb-0 text-muted">Belum ada data jurusan/mahasiswa.</p>
        @endif
    </div>
</div>

{{-- Poin 3: Menampilkan mata kuliah mahasiswa tertentu (Contoh ID 1) --}}
<div class="card mb-4 border-info">
    <div class="card-header bg-info text-white">
        <strong>Poin 3: Mata Kuliah Mahasiswa ID 1</strong>
    </div>
    <div class="card-body">
        @if(isset($specificStudent) && $specificStudent)
            <p class="mb-2">Nama: <strong>{{ $specificStudent->name }}</strong> (NIM: {{ $specificStudent->nim }})</p>
            <ul class="mb-0">
                @forelse($specificStudent->subjects as $subject)
                    <li>{{ $subject->name }} ({{ $subject->sks }} SKS)</li>
                @empty
                    <li class="text-muted">Mahasiswa ini belum mengambil mata kuliah.</li>
                @endforelse
            </ul>
        @else
            <p class="mb-0 text-danger">Data mahasiswa dengan ID 1 tidak ditemukan.</p>
        @endif
    </div>
</div>

{{-- AKHIR BAGIAN TAMBAHAN --}}

<div class="table-responsive"> 
    <table class="table table-striped"> 
        <thead> 
            <tr> 
                <th>NIM</th> 
                <th>Nama</th> 
                <th>Jurusan</th> 
                <th>Mata Kuliah</th> 
                <th>Total SKS</th> 
                <th>Aksi</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach($students as $student) 
            <tr> 
                <td>{{ $student->nim }}</td> 
                <td>{{ $student->name }}</td> 
                <td>{{ $student->major ? $student->major->name : '-' }}</td> 
                <td> 
                    @foreach($student->subjects as $subject) 
                        <span class="badge bg-secondary me-1">{{ $subject->name }}</span> 
                    @endforeach 
                </td> 
                {{-- Poin 4: Total SKS menggunakan output withSum dari controller --}}
                <td class="text-center fw-bold">{{ $student->subjects_sum_sks ?? 0 }}</td> 
                <td> 
                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm">Detail</a> 
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a> 
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline"> 
                        @csrf 
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button> 
                    </form> 
                </td> 
            </tr> 
            @endforeach 
        </tbody> 
    </table> 
</div> 
@endsection 