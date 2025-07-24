<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
    use Carbon\Carbon;

// use Barryvdh\DomPDF\PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade as PDF;




class LaporanController extends Controller
{
    public function index() {
        $pengaduan = Pengaduan::all();
        return view('pages.admin.laporan.index',
         compact('pengaduan'));
    }


    // public function laporan(Request $request)
    // {
    //     $awal = $request->tanggal_awal;
    //     $akhir = $request->tanggal_akhir;

    //     $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$awal, $akhir])->get();

    //     return view('pages.admin.laporan.index', compact('pengaduan', 'awal', 'akhir'));
    // }



    public function laporan(Request $request)
    {
       date_default_timezone_set('Asia/Bangkok');

    $start_date = $request->date_from;
    $end_date = $request->date_to;

    // Pastikan tanggal tidak kosong
    if (!$start_date || !$end_date) {
        return redirect()->back()->with('status', 'Tanggal awal dan akhir wajib diisi.');
    }

    // Format tanggal untuk tampilan
    // $tanggal1 = Carbon::parse($start_date)->translatedFormat('d F Y');
    // $tanggal2 = Carbon::parse($end_date)->translatedFormat('d F Y');

    // Ambil data sesuai rentang
    $pengaduan = Pengaduan::whereDate('tgl_pengaduan', '>=', $start_date)
                          ->whereDate('tgl_pengaduan', '<=', $end_date)
                          ->orderBy('tgl_pengaduan', 'desc')
                          ->get();

    // Kirim ke Blade
    return view('pages.admin.laporan.index', [
        'pengaduan'   => $pengaduan,
        'start_date'  => $start_date,
        'end_date'    => $end_date,
        // 'tanggal1'    => $tanggal1,
        // 'tanggal2'    => $tanggal2,
    ]);
}
    
    
    public function export(Request $request) {
    // Format tanggal input
    $start_date = Carbon::createFromFormat('Y-m-d', $request->start_date)->toDateString();
    $end_date = Carbon::createFromFormat('Y-m-d', $request->end_date)->toDateString();

    // Format tampilan tanggal (misal: 01 Januari 2024)
    // $tanggal1  = Carbon::parse($start_date)->translatedFormat('d F Y');
    // $tanggal2 = Carbon::parse($end_date)->translatedFormat('d F Y');


$pengaduan = Pengaduan::whereDate('created_at', '>=', $request->start_date)
                       ->whereDate('created_at', '<=', $request->end_date)
                       ->get();

    // Generate PDF
    $pdf = PDF::loadView('pages.admin.laporan.export', compact('pengaduan', 'start_date', 'end_date'))
              ->setPaper('a4', 'landscape');
    return $pdf->download('laporan-pengaduan.pdf');
    }

    
}
