@extends('layouts.app') <!-- atau layout kamu pakai -->
@section('content')

<div class="container">
    <h2>Sertifikat {{ $prestasi->siswa->nama }}</h2>

    @if ($sertifikats && count($sertifikats) > 0)
        @foreach ($sertifikats as $file)
            @php
                $url = asset('storage/' . $file);
                $ext = pathinfo($file, PATHINFO_EXTENSION);
            @endphp

            <div class="mb-4">
                @if (in_array($ext, ['jpg', 'jpeg', 'png']))
                    <img src="{{ $url }}" class="img-fluid mb-2" style="max-width: 600px;">
                @elseif ($ext === 'pdf')
                    <iframe src="{{ $url }}" width="100%" height="600px"></iframe>
                @else
                    <p>File tidak dapat ditampilkan: <a href="{{ $url }}" download>Download</a></p>
                @endif
            </div>
        @endforeach
    @else
        <p>Tidak ada file sertifikat yang tersedia.</p>
    @endif

    <a href="{{ route('prestasis.index') }}" class="btn btn-secondary">Kembali</a>
</div>

@endsection
