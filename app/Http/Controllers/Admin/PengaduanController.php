<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Masyarakat;

class PengaduanController extends Controller
{
    public function index($status) {

    // Ubah kode status '0' menjadi nama status sesuai database
    $statusValue = ($status === '0') ? 'menunggu_verifikasi' : $status;

    // Ambil data pengaduan dengan relasi ke masyarakat dan filter berdasarkan status
    $masyarakat = Masyarakat::all();
    $pengaduan = Pengaduan::with('masyarakat')
                    ->where('status', $statusValue)
                    ->get();
        
        return view('pages.admin.pengaduan.index', compact('pengaduan', 'masyarakat','status'));
    }

     public function proses()
{
    $masyarakat = Masyarakat::all();
    $pengaduan = Pengaduan::with('masyarakat')
                    ->where('status', 'proses')
                    ->get();

    return view('pages.admin.pengaduan.proses', compact('pengaduan','masyarakat'));
}

    public function selesai()
    {
    $masyarakat = Masyarakat::all();
    $pengaduan = Pengaduan::with('masyarakat')
                    ->where('status', 'selesai')
                    ->get();
        
        return view('pages.admin.pengaduan.selesai', compact('pengaduan', 'masyarakat'));
    }   
    
    public function show($id_pengaduan) {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();

        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();

        return view('pages.admin.pengaduan.show', [
            'pengaduan' => $pengaduan,
            'tanggapan' => $tanggapan
        ]);
    }

    public function destroy(Request $request, $id_pengaduan) {

        if($id_pengaduan = 'id_pengaduan') {
            $id_pengaduan = $request->id_pengaduan;
        }

        $pengaduan = Pengaduan::find($id_pengaduan);

        $pengaduan->delete();

        if($request->ajax()) {
            return 'success';
        }

        return redirect()->route('pengaduan.index');
    }


  

}
