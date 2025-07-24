@extends('layouts.app')

@section('title', 'Pengaduan')

@section('content')
    <main id="main" class="martop">

        <section class="inner-page">
            <div class="container ">
                <div class="title text-center mb-5">
                    <h3 class="fw-bold">Pengaduan Saya</h3>
                    {{-- <h5 class="fw-normal">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</h5> --}}
                </div>

                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="2" class="text-center">Detail Pengaduan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 20%"><strong>Nama Pelapor</strong></td>
                            <td>{{ $pengaduan->nama_pelapor }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Pelanggar</strong></td>
                            <td>{{ $pengaduan->nama_pelanggar }}</td>
                        </tr>
                        <tr>
                            <td><strong>Status Pelanggar</strong></td>
                            <td>{{ $pengaduan->status_civitas }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Kejadian</strong></td>
                            <td>{{ \Carbon\Carbon::parse($pengaduan->tgl_kejadian)->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Lokasi Kejadian</strong></td>
                            <td>{{ $pengaduan->lokasi_kejadian }}</td>
                        </tr>
                        <tr>
                            <td><strong>Isi Laporan</strong></td>
                            <td>{{ $pengaduan->isi_laporan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td>
                                @switch($pengaduan->status)
                                    @case('0')
                                        <span class="badge bg-danger text-white">Menunggu Verifikasi</span>
                                    @break

                                    @case('proses')
                                        <span class="badge bg-warning text-white">Proses</span>
                                    @break

                                    @default
                                        <span class="badge bg-success text-white">Selesai</span>
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Foto</strong></td>
                            <td>
                                @if ($pengaduan->foto)
                                    {{-- <img src="{{ asset($pengaduan->foto) }}" alt="Foto Bukti" --}}
                                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Bukti"
                                        style="max-width: 50%; height: auto;">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>



            </div>
        </section>

    </main><!-- End #main -->
@endsection
