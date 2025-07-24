<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pengaduan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
</head>
{{-- <body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Pengaduan</h4>
	</center> --}}

<body>

    <style>
        @media print {
            @page {
                size: A4 landscape;
                /* A4 dan posisi landscape */
                margin: 20mm;
            }

            .no-print {
                display: none;
            }
        }

        body {
            position: relative;
            height: 29.7cm;
            width: 100%;
            margin: auto;
            color: #001028;
            background: #FFFFFF;
            font-size: 13px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .laporan-title {
            font-size: 18pt;
            font-weight: bold;
            text-align: center;
            margin-bottom: 6px;
        }

        .periode {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 10pt;
            color: #333;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        img {
            max-width: 70px;
            height: auto;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 9pt;
        }

        .bg-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .bg-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .bg-success {
            background-color: #28a745;
            color: #fff;
        }

        .bg-secondary {
            background-color: #6c757d;
            color: #fff;
        }
    </style>


    <hr class="border">

    <!-- content -->
 <header>
        <img src="{{ asset( 'assets/images/Logo Poltekkes Kemenkes Surabaya.png')}}" class="topleft">
        {{-- <img src="assets/images/logo-4.png" class="topright"> --}}
    </header>
 <div style="font-size:2rem; font-weight:bold; text-align:center; margin-bottom:1rem;">
    LAPORAN PENGADUAN KODE ETIK BULAN {{ $tanggal1 }} sampai {{ $tanggal2 }}
</div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pengaduan</th>
                <th>Nama Pelapor</th>
                <th>Nama Pelanggar</th>
                <th>Isi Laporan</th>
                <th>Tanggal Kejadian</th>
                <th>Lokasi Kejadian</th>
                <th>Status</th>
                <th>Bukti</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengaduan as $k => $i)
                <tr>
                    <td>{{ $k += 1 }}.</td>
                    <td>{{ Carbon\Carbon::parse($i->tgl_pengaduan)->format('d-m-Y') }}</td>
                    <td>{{ $i->nama_pelapor }}</td>
                    <td>{{ $i->nama_pelanggar }}</td>
                    <td>{{ $i->isi_laporan }}</td>
                    <td>{{ Carbon\Carbon::parse($i->tgl_kejadian)->format('d-m-Y') }}</td>
                    <td>{{ $i->lokasi_kejadian }}</td>
                    <td>{{ $i->status }}</td>
                    <td>{{ $i->bukti }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
