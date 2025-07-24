<!DOCTYPE html>
<html>
@extends('layouts.admin')
@section('title', 'Laporan')


@push('addon-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endpush
@section('content')
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Laporan</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            {{-- <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lihat</li>
                                <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                            </ol> --}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-1">
                <div class="card">
                    <div class="card-header border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <h3>Filter Laporan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('laporan.get') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date_from">Tanggal Awal</label>
                                    <input type="date" id="date_from" name="date_from" class="form-control"
                                        value="{{ old('date_from', $start_date ?? '') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="date_to">Tanggal Akhir</label>
                                    <input type="date" id="date_to" name="date_to" class="form-control"
                                        value="{{ old('date_to', $end_date ?? '') }}" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">Cari Laporan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 order-xl-2">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Data Pengaduan</h3>
                            </div>
                            <div class="col text-right">
                                @if ($pengaduan ?? '')
                                    <form action="{{ route('laporan.export') }}" method="POST" class="mt-3">
                                        @csrf
                                        <input type="hidden" name="start_date" value="{{ $start_date }}">
                                        <input type="hidden" name="end_date" value="{{ $end_date }}">
                                        <button type="submit" class="btn btn-info">
                                            <i class="fas fa-file-pdf"></i> Export PDF
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- @if ($pengaduan ?? '') --}}
                         {{-- <p class="mb-2">Jumlah data ditemukan: {{ $pengaduan->count() }}</p> --}}
                            <table id="pengaduanTable" class="table table-bordered">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th scope="col" class="sort" data-sort="no">No</th>
                                        <th scope="col" class="sort" data-sort="tgl_kejadian">Tanggal</th>
                                        <th scope="col" class="sort" data-sort="nama_pelapor">Nama Pelapor</th>
                                        <th scope="col" class="sort" data-sort="nama_pelanggar">Nama Pelanggar</th>
                                        <th scope="col" class="sort" data-sort="status_pelanggar">Status Pelanggar</th>
                                        <th scope="col" class="sort" data-sort="kategori_pelanggaran">Kategori Pelanggaran</th>
                                        <th scope="col" class="sort" data-sort="isi_laporan">Isi Laporan</th>
                                        <th scope="col" class="sort" data-sort="lokasi_kejadian">Lokasi Kejadian</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        {{-- <th scope="col" class="sort" data-sort="action">Aksi</th> --}}
                                        <th scope="col" class="sort" data-sort="foto">Bukti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengaduan as $v)
                                        <tr>
                                            {{-- <td class="budget">
                                                <span class="text-sm">{{ $k += 1 }}</span>
                                            </td> --}}
                                            <td>
                                                <span
                                                    class="text-sm">{{ \Carbon\Carbon::parse($v->tgl_pengaduan)->format('d-m-Y') }}</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">{{ $v->nama_pelapor ?? '-' }}</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">{{ $v->nama_pelanggar ?? '-' }}</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">{{ $v->status_civitas ?? '-' }}</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">{{ $v->kategori_pelanggaran ?? '-' }}</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">{{ Str::limit($v->isi_laporan, 30) }}</span>
                                            </td>
                                            <td>
                                                <span class="text-sm">{{ $v->lokasi_kejadian ?? '-' }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if ($i->status == '0' || $i->status == 'menunggu verifikasi')
                                                    <span class="badge badge-danger">Menunggu Verifikasi</span>
                                                @elseif($i->status == 'proses')
                                                    <span class="badge badge-warning">Proses</span>
                                                @elseif($i->status == 'selesai')
                                                    <span class="badge badge-success">Selesai</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ $i->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($i->foto)
                                                    <img src="{{ asset('storage/foto/' . $i->foto) }}" width="60"
                                                        height="60" class="img-thumbnail">
                                                @else
                                                    <span class="text-muted">Belum ada</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        {{-- @else --}}
                            {{-- <div class="alert alert-info">Tidak ada data pengaduan untuk rentang tanggal yang dipilih.
                            </div> --}}
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pengaduanTable').DataTable();
        });
    </script>
    @if (session()->has('status'))
        <script>
            Swal.fire({
                title: 'Pemberitahuan!',
                text: "{{ Session::get('status') }}",
                icon: 'success',
                confirmButtonColor: '#28B7B5',
                confirmButtonText: 'OK',
            });
        </script>
    @endif
@endpush
