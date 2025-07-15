<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PengaduanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tgl_pengaduan' => '2024-07-01',
                'nik' => '3506010101010001',
                'nama_pelapor' => 'Ayu Rahma',
                'status_civitas' => 'Tendik',
                'nama_pelanggar' => 'Budi Santoso',
                'kategori_pelanggaran' => 'Pelecehan verbal',
                'isi_laporan' => 'Pelanggaran terjadi saat rapat staf.',
                'tgl_kejadian' => '2024-06-30',
                'lokasi_kejadian' => 'Ruang Administrasi',
                'foto' => 'pelaporan1.jpg'
            ],
            [
                'tgl_pengaduan' => '2024-07-02',
                'nik' => '3506010202020002',
                'nama_pelapor' => 'Budi Santoso',
                'status_civitas' => 'Dosen',
                'nama_pelanggar' => 'Citra Dewi',
                'kategori_pelanggaran' => 'Manipulasi data',
                'isi_laporan' => 'Data mahasiswa dimanipulasi tanpa izin.',
                'tgl_kejadian' => '2024-06-28',
                'lokasi_kejadian' => 'Lab Komputer',
                'foto' => 'pelaporan2.jpg'
            ],
            [
                'tgl_pengaduan' => '2024-07-03',
                'nik' => '3506010303030003',
                'nama_pelapor' => 'Citra Dewi',
                'status_civitas' => 'Dosen',
                'nama_pelanggar' => 'Doni Prasetyo',
                'kategori_pelanggaran' => 'Intimidasi',
                'isi_laporan' => 'Menerima tekanan saat presentasi publikasi.',
                'tgl_kejadian' => '2024-06-25',
                'lokasi_kejadian' => 'Auditorium Kampus',
                'foto' => 'pelaporan3.jpg'
            ],
            [
                'tgl_pengaduan' => '2024-07-04',
                'nik' => '3506010404040004',
                'nama_pelapor' => 'Doni Prasetyo',
                'status_civitas' => 'Tendik',
                'nama_pelanggar' => 'Eka Fitri',
                'kategori_pelanggaran' => 'Kecurangan akademik',
                'isi_laporan' => 'Laporan plagiarisme tugas akhir.',
                'tgl_kejadian' => '2024-06-24',
                'lokasi_kejadian' => 'Perpustakaan',
                'foto' => 'pelaporan4.jpg'
            ],
            [
                'tgl_pengaduan' => '2024-07-05',
                'nik' => '3506010505050005',
                'nama_pelapor' => 'Eka Fitri',
                'status_civitas' => 'Dosen',
                'nama_pelanggar' => 'Fajar Hidayat',
                'kategori_pelanggaran' => 'Pelecehan fisik',
                'isi_laporan' => 'Terjadi tindakan tidak pantas.',
                'tgl_kejadian' => '2024-06-23',
                'lokasi_kejadian' => 'Parkiran belakang',
                'foto' => 'pelaporan5.jpg'
            ],
            [
                'tgl_pengaduan' => '2024-07-06',
                'nik' => '3506010606060006',
                'nama_pelapor' => 'Fajar Hidayat',
                'status_civitas' => 'Tendik',
                'nama_pelanggar' => 'Gita Permata',
                'kategori_pelanggaran' => 'Penyalahgunaan jabatan',
                'isi_laporan' => 'Menyalahgunakan jabatan untuk keuntungan pribadi.',
                'tgl_kejadian' => '2024-06-22',
                'lokasi_kejadian' => 'Ruang BEM',
                'foto' => 'pelaporan6.jpg'
            ],
            [
                'tgl_pengaduan' => '2024-07-07',
                'nik' => '3506010707070007',
                'nama_pelapor' => 'Gita Permata',
                'status_civitas' => 'Dosen',
                'nama_pelanggar' => 'Hadi Wirawan',
                'kategori_pelanggaran' => 'Penyebaran hoaks',
                'isi_laporan' => 'Menyebarkan informasi yang tidak benar.',
                'tgl_kejadian' => '2024-06-21',
                'lokasi_kejadian' => 'Grup WhatsApp Kampus',
                'foto' => 'pelaporan7.jpg'
            ],
            [
                'tgl_pengaduan' => '2024-07-08',
                'nik' => '3506010808080008',
                'nama_pelapor' => 'Hadi Wirawan',
                'status_civitas' => 'Dosen',
                'nama_pelanggar' => 'Intan Melati',
                'kategori_pelanggaran' => 'Pengabaian tugas',
                'isi_laporan' => 'Tidak hadir tanpa alasan selama 2 minggu.',
                'tgl_kejadian' => '2024-06-20',
                'lokasi_kejadian' => 'Ruang dosen 2',
                'foto' => 'pelaporan8.jpg'
            ],
            [
                'tgl_pengaduan' => '2024-07-09',
                'nik' => '3506010909090009',
                'nama_pelapor' => 'Intan Melati',
                'status_civitas' => 'Tendik',
                'nama_pelanggar' => 'Joko Subroto',
                'kategori_pelanggaran' => 'Kekerasan verbal',
                'isi_laporan' => 'Menggunakan kata-kata kasar saat rapat.',
                'tgl_kejadian' => '2024-06-19',
                'lokasi_kejadian' => 'Ruang rapat pusat',
                'foto' => 'pelaporan9.jpg'
            ],
            [
                'tgl_pengaduan' => '2024-07-10',
                'nik' => '3506011010100010',
                'nama_pelapor' => 'Joko Subroto',
                'status_civitas' => 'Dosen',
                'nama_pelanggar' => 'Ayu Rahma',
                'kategori_pelanggaran' => 'Pelanggaran privasi',
                'isi_laporan' => 'Mengakses data tanpa izin.',
                'tgl_kejadian' => '2024-06-18',
                'lokasi_kejadian' => 'Ruang Data',
                'foto' => 'pelaporan10.jpg'
            ],
        ];

        DB::table('pengaduan')->insert($data);
    }
}
    
