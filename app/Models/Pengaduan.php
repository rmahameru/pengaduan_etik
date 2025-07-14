<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        // 'tgl_pengaduan',
    'nik',
    'nama_pelapor' ,
    'status_civitas',
    'nama_pelanggar',
    'kategori_pelanggaran' ,
    'isi_laporan',
    'tgl_kejadian',
    'lokasi_kejadian',
    'foto',
    'status',
    ];

  public function masyarakat()
{
    return $this->belongsTo(Masyarakat::class, 'nik', 'nik');
}


}
