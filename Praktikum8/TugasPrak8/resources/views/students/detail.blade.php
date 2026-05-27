@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detail Mahasiswa</h2>
    <div>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <h5 class="card-title">{{ $student->name }}</h5>
            <p class="mb-1"><strong>NIM:</strong> {{ $student->nim }}</p>
            <p class="mb-1"><strong>Jurusan:</strong> {{ $student->major->name }}</p>
            <p class="mb-1"><strong>Alamat:</strong></p>
            <p>{{ $student->address }}</p>
        </div>

        <div class="mb-3">
            <strong>Mata Kuliah:</strong>
            <div class="mt-2">
                @forelse($student->subjects as $subject)
                    <span class="badge bg-secondary me-1 mb-1">
                        {{ $subject->name }} ({{ $subject->sks }} SKS)
                    </span>
                @empty
                    <p class="text-muted">Tidak ada mata kuliah.</p>
                @endforelse
            </div>
        </div>

        <div class="mb-3">
            <strong>Total SKS:</strong> {{ $student->subjects->sum('sks') }}
        </div>
    </div>
</div>
@endsection
