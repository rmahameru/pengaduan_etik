<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Masyarakat;

class PengaduanController extends Controller
{
    public function index($status) {
        $masyarakat = Masyarakat::all();
        $pengaduan = Pengaduan::with('masyarakat')->orderBy('created_at', 'desc')->get();
        // $pengaduan = Pengaduan::where('status', $status)->orderBy('created_at', 'desc')->get();
        // // dd($satus);
        
        return view('pages.admin.pengaduan.index', compact('pengaduan', 'masyarakat'));
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
