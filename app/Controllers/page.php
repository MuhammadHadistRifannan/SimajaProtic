<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// Load Semua Model
use App\Models\JadwalModel;
use App\Models\PendaftaranModel;
use App\Models\AbsensiModel;
use App\Models\MateriModel;
use App\Models\PertemuanModel;
use App\Models\UserProgressModel;
use App\Models\SoalModel;
use App\Models\JawabanModel;
use App\Models\NilaiModel;
use App\Models\ProfileModel;
use CodeIgniter\I18n\Time;

class Page extends BaseController
{
    // KONSTRUKTOR
    public function __construct()
    {
        helper(['auth', 'form']);
    }

    
    // 1. HALAMAN UTAMA (HOME) - PERBAIKAN DI SINI
    
    public function index()
    {
        $jadwalModel = new JadwalModel();
        $pendaftaranModel = new PendaftaranModel();

        $dataJadwal = $jadwalModel->orderBy('tanggal', 'ASC')->findAll(6);

        $userId = user_id();
        $daftarJadwalSaya = [];

        if ($userId) {
            $dataPendaftaran = $pendaftaranModel->where('user_id', $userId)->findAll();
            $daftarJadwalSaya = array_column($dataPendaftaran, 'jadwal_id');
        }

        $data = [
            'title' => 'Home - SIMAJA',
            'jadwal_home' => $dataJadwal,
            'jadwal_saya' => $daftarJadwalSaya
        ];

        // PERUBAHAN PENTING: Mengarahkan ke folder 'layout/home'
        return view('layout/home', $data); 
    }

    
    // 2. FITUR JADWAL & PENDAFTARAN
    
    public function jadwal()
    {
        $jadwalModel = new JadwalModel();
        $pendaftaranModel = new PendaftaranModel();

        $dataJadwal = $jadwalModel->orderBy('tanggal', 'ASC')->findAll();
        
        $userId = user_id();
        $daftarJadwalSaya = [];

        if ($userId) {
            $dataPendaftaran = $pendaftaranModel->where('user_id', $userId)->findAll();
            $daftarJadwalSaya = array_column($dataPendaftaran, 'jadwal_id');
        }

        $data = [
            'title' => 'Jadwal Study Jam',
            'jadwal' => $dataJadwal,
            'jadwal_saya' => $daftarJadwalSaya
        ];

        return view('page/jadwal', $data);
    }

    public function daftar($jadwalId)
    {
        if (!logged_in()) return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');

        $jadwalModel = new JadwalModel();
        $pendaftaranModel = new PendaftaranModel();
        $userId = user_id();

        $jadwal = $jadwalModel->find($jadwalId);
        if (!$jadwal) return redirect()->back()->with('error', 'Jadwal tidak ditemukan.');

        if ($pendaftaranModel->cekTerdaftar($userId, $jadwalId)) {
            return redirect()->back()->with('warning', 'Anda sudah terdaftar.');
        }

        if ($jadwal['terisi'] >= $jadwal['kuota']) {
            return redirect()->back()->with('error', 'Kuota penuh.');
        }

        $db = \Config\Database::connect();
        $db->transStart();
            $pendaftaranModel->save(['user_id' => $userId, 'jadwal_id' => $jadwalId]);
            $jadwalModel->update($jadwalId, ['terisi' => $jadwal['terisi'] + 1]);
        $db->transComplete();

        if ($db->transStatus() === false) return redirect()->back()->with('error', 'Gagal mendaftar.');

        return redirect()->back()->with('pesan', 'Berhasil mendaftar Study Jam!');
    }

    
    // 3. FITUR ABSENSI
    
    public function rekap($jadwalId)
    {
        $jadwalModel = new JadwalModel();
        $absensiModel = new AbsensiModel();

        $jadwal = $jadwalModel->find($jadwalId);
        if (!$jadwal) return redirect()->back();

        $data = [
            'title' => 'Rekap Absensi',
            'jadwal' => $jadwal,
            'peserta' => $absensiModel->getAbsensiByJadwal($jadwalId)
        ];

        return view('page/rekap', $data);
    }

    public function absensi($jadwalId = null)
    {
        
        if (is_null($jadwalId)) return redirect()->to('/jadwal');

        $jadwalModel = new JadwalModel();
        $absensiModel = new AbsensiModel();
        $userId = user_id();

        $jadwal = $jadwalModel->find($jadwalId);
        if (!$jadwal) return redirect()->to('/jadwal');

        $data = [
            'title' => 'Form Absensi',
            'jadwal' => $jadwal,
            'sudah_absen' => $absensiModel->cekSudahAbsen($userId, $jadwalId)
        ];

        return view('page/absensi', $data);
    }

    public function kirimAbsensi()
    {
        

        $jadwalId = $this->request->getPost('jadwal_id');
        $status = $this->request->getPost('status');
        $userId = user_id();
        $absensiModel = new AbsensiModel();
        
        if ($absensiModel->cekSudahAbsen($userId, $jadwalId)) {
            return redirect()->back()->with('error', 'Anda sudah mengisi absensi.');
        }

        $absensiModel->save([
            'user_id' => $userId,
            'jadwal_id' => $jadwalId,
            'status' => $status,
            'created_at' => Time::now()
        ]);

        return redirect()->to('/jadwal')->with('pesan', 'Absensi berhasil dikirim!');
    }

    
    // 4. FITUR MATERI & PROGRESS
    
    public function materi()
    {
        $materiModel = new MateriModel();
        $progressModel = new UserProgressModel();
        
        $dataMateri = $materiModel->findAll();
        $userId = user_id();
        $progressData = [];

        if ($userId) {
            $userProgress = $progressModel
                                ->select('materi_id, COUNT(id) as completed')
                                ->where('user_id', $userId)
                                ->where('is_completed', 1)
                                ->groupBy('materi_id')
                                ->findAll();

            foreach ($userProgress as $p) {
                if (!empty($p['materi_id'])) {
                    $progressData[$p['materi_id']] = ['completed' => (int)$p['completed']];
                }
            }
        }

        $data = [
            'title' => 'Materi Study Jam',
            'materi_list' => $dataMateri,
            'progress_data' => $progressData
        ];

        return view('page/materi', $data);
    }

    public function detailMateri($materiId)
    {
        

        $materiModel = new MateriModel();
        $pertemuanModel = new PertemuanModel();
        $progressModel = new UserProgressModel();
        $userId = user_id();

        $materi = $materiModel->find($materiId);
        if(!$materi) return redirect()->back();

        $completedIds = $progressModel->select('pertemuan_id')
                            ->where('user_id', $userId)
                            ->where('materi_id', $materiId)
                            ->where('is_completed', 1)
                            ->findAll();
        
        $data = [
            'title' => 'Detail Materi',
            'materi' => $materi,
            'pertemuan' => $pertemuanModel->getByMateri($materiId),
            'completed_list' => array_column($completedIds, 'pertemuan_id')
        ];

        return view('page/detail_materi', $data);
    }

    public function belajar($pertemuanId)
    {
        

        $pertemuanModel = new PertemuanModel();
        $materiModel = new MateriModel();

        $pertemuan = $pertemuanModel->find($pertemuanId);
        if (!$pertemuan) return redirect()->back();

        $materi = $materiModel->find($pertemuan['materi_id']);
        $allPertemuan = $pertemuanModel->getByMateri($materi['id']); 
        
        $prev = null;
        $next = null;

        foreach ($allPertemuan as $index => $p) {
            if ($p['id'] == $pertemuanId) {
                if (isset($allPertemuan[$index - 1])) $prev = $allPertemuan[$index - 1];
                if (isset($allPertemuan[$index + 1])) $next = $allPertemuan[$index + 1];
                break;
            }
        }

        $data = [
            'title' => $pertemuan['judul_pertemuan'],
            'materi' => $materi,
            'pertemuan' => $pertemuan,
            'prev' => $prev,
            'next' => $next
        ];

        return view('page/belajar', $data);
    }

    public function markComplete()
    {
        

        $pertemuanId = $this->request->getPost('pertemuan_id');
        $userId = user_id();

        $progressModel = new UserProgressModel();
        $pertemuanModel = new PertemuanModel();

        $pertemuan = $pertemuanModel->find($pertemuanId);
        if (!$pertemuan) return redirect()->back()->with('error', 'Data pertemuan tidak valid.');

        $materiId = $pertemuan['materi_id']; 

        $exists = $progressModel->where([
            'user_id' => $userId, 
            'pertemuan_id' => $pertemuanId
        ])->first();

        if (!$exists) {
            $progressModel->save([
                'user_id' => $userId,
                'materi_id' => $materiId, 
                'pertemuan_id' => $pertemuanId,
                'is_completed' => 1,
                'completed_at' => Time::now()
            ]);
        }
        
        return redirect()->to('/materi/detail/' . $materiId)->with('pesan', 'Progress berhasil dicatat!');
    }

    
    // 5. FITUR QUIZ
    
    public function quiz()
    {
        $pertemuanModel = new PertemuanModel();
        $nilaiModel = new NilaiModel();
        
        $listPertemuan = $pertemuanModel->findAll(); 
        $userId = user_id();
        $nilaiUser = [];

        if ($userId) {
            $dataNilai = $nilaiModel->where('user_id', $userId)->findAll();
            foreach($dataNilai as $n) {
                $nilaiUser[$n['pertemuan_id']] = $n['skor'];
            }
        }

        $data = [
            'title' => 'Daftar Quiz',
            'list_pertemuan' => $listPertemuan,
            'nilai_user' => $nilaiUser
        ];

        return view('page/quiz', $data);
    }

    public function mulaiQuiz($pertemuanId)
    {

        $soalModel = new SoalModel();
        $jawabanModel = new JawabanModel();
        $pertemuanModel = new PertemuanModel();

        $pertemuan = $pertemuanModel->find($pertemuanId);
        if (!$pertemuan) return redirect()->to('/quiz')->with('error', 'Pertemuan tidak ditemukan');

        $soal = $soalModel->getSoalByPertemuan($pertemuanId);
        if (empty($soal)) return redirect()->back()->with('warning', 'Belum ada soal quiz untuk pertemuan ini.');

        foreach ($soal as &$s) {
            $s['opsi'] = $jawabanModel->where('soal_id', $s['id'])->findAll();
            shuffle($s['opsi']);
        }

        $data = [
            'title' => 'Quiz - ' . $pertemuan['judul_pertemuan'],
            'pertemuan' => $pertemuan,
            'soal_list' => $soal
        ];

        return view('page/detail_quiz', $data);
    }

    public function submitQuiz()
    {
        

        $userId = user_id();
        $pertemuanId = $this->request->getPost('pertemuan_id');
        $jawabanUser = $this->request->getPost('jawaban');

        if (!$jawabanUser) return redirect()->back()->with('error', 'Anda belum menjawab soal apapun.');

        $jawabanModel = new JawabanModel();
        $nilaiModel = new NilaiModel();

        $skorBenar = 0;
        $totalSoal = count($jawabanUser);

        foreach ($jawabanUser as $soalId => $jawabanId) {
            $cekJawaban = $jawabanModel->find($jawabanId);
            if ($cekJawaban && $cekJawaban['is_correct'] == 1) {
                $skorBenar++;
            }
        }

        $nilaiAkhir = ($totalSoal > 0) ? round(($skorBenar / $totalSoal) * 100) : 0;

        $existingNilai = $nilaiModel->getNilai($userId, $pertemuanId);
        $dataSimpan = [
            'user_id' => $userId,
            'pertemuan_id' => $pertemuanId,
            'skor' => $nilaiAkhir,
            'created_at' => Time::now()
        ];

        if ($existingNilai) $dataSimpan['id'] = $existingNilai['id'];
        
        $nilaiModel->save($dataSimpan);

        $pesan = "Quiz Selesai! Nilai Anda: $nilaiAkhir ($skorBenar dari $totalSoal benar)";
        return redirect()->to('/quiz')->with($nilaiAkhir >= 70 ? 'pesan' : 'warning', $pesan);
    }

    
    // 6. FITUR PROFILE
    
    public function profile()
    {
        

        $userId = user_id();
        $profileModel = new ProfileModel();
        $nilaiModel = new NilaiModel();
        $progressModel = new UserProgressModel();

        $userProfile = $profileModel->getProfile($userId);

        $totalPoinArr = $nilaiModel->where('user_id', $userId)->selectSum('skor')->first();
        $totalPoin = $totalPoinArr['skor'] ?? 0;

        $materiSelesai = $progressModel->where(['user_id' => $userId, 'is_completed' => 1])->countAllResults();
        $jamBelajar = $materiSelesai * 2; 

        $db = \Config\Database::connect();
        $query = $db->query("SELECT user_id, SUM(skor) as total_skor FROM nilai GROUP BY user_id ORDER BY total_skor DESC");
        $rankings = $query->getResultArray();
        
        $myRank = '-';
        foreach($rankings as $index => $r) {
            if($r['user_id'] == $userId) {
                $myRank = $index + 1;
                break;
            }
        }

        $data = [
            'title' => 'Profil Saya',
            'profile' => $userProfile,
            'stats' => [
                'poin' => $totalPoin,
                'jam' => $jamBelajar,
                'selesai' => $materiSelesai,
                'ranking' => $myRank
            ]
        ];

        return view('page/profile', $data);
    }

    public function editProfile()
    {
        

        $userId = user_id();
        $profileModel = new ProfileModel();
        $userProfile = $profileModel->getProfile($userId);

        $data = [
            'title' => 'Edit Profil',
            'profile' => $userProfile,
            'validation' => \Config\Services::validation()
        ];

        return view('page/edit_profile', $data);
    }

    public function updateProfile()
    {
        

        $userId = user_id();
        $profileModel = new ProfileModel();

        if (!$this->validate([
            'nama_lengkap' => 'required',
            'foto' => ['rules' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]']
        ])) {
            return redirect()->back()->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        $namaFotoLama = $this->request->getPost('foto_lama');
        
        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img', $namaFoto);
            if ($namaFotoLama != 'default.png' && file_exists('img/' . $namaFotoLama)) {
                unlink('img/' . $namaFotoLama);
            }
        } else {
            $namaFoto = $namaFotoLama;
        }

        $dataSimpan = [
            'user_id'       => $userId,
            'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
            'nim'           => $this->request->getPost('nim'),
            'kelas'         => $this->request->getPost('kelas'),
            'prodi'         => $this->request->getPost('prodi'),
            'jurusan'       => $this->request->getPost('jurusan'),
            'semester'      => $this->request->getPost('semester'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'alamat'        => $this->request->getPost('alamat'),
            'foto'          => $namaFoto
        ];

        $existingProfile = $profileModel->getProfile($userId);
        if ($existingProfile) {
            $dataSimpan['id'] = $existingProfile['id'];
        }

        $profileModel->save($dataSimpan);

        return redirect()->to('/profile')->with('pesan', 'Profil berhasil diperbarui!');
    }

    
    // 7. FITUR UMUM
    
    public function search()
    {
        $query = $this->request->getGet('q');
        if (!$query) return redirect()->back();

        $jadwalModel = new JadwalModel();
        $materiModel = new MateriModel();
        
        $data = [
            'judul' => 'Hasil Pencarian',
            'query' => $query,
            'materi' => $materiModel->like('judul', $query)->findAll(),
            'jadwal' => $jadwalModel->like('judul', $query)->findAll()
        ];

        return view('page/search', $data);
    }

    
    // 8. FITUR PROGRES & PERINGKAT
    
    public function progres()
    {
        

        $userId = user_id();
        $progressModel = new UserProgressModel();
        $materiModel = new MateriModel();

        $totalSelesai = $progressModel->where(['user_id' => $userId, 'is_completed' => 1])->countAllResults();
        $totalJam = $totalSelesai * 2;

        $aktivitas = $progressModel->select('DATE(completed_at) as tanggal')
                                   ->where('user_id', $userId)
                                   ->groupBy('DATE(completed_at)')
                                   ->orderBy('tanggal', 'DESC')
                                   ->findAll();
        
        $streak = 0;
        if (!empty($aktivitas)) {
            $today = date('Y-m-d');
            $yesterday = date('Y-m-d', strtotime('-1 day'));
            $lastDate = $aktivitas[0]['tanggal'];
            
            if ($lastDate == $today || $lastDate == $yesterday) {
                $streak = 1; 
                $checkDate = $lastDate;
                for ($i = 1; $i < count($aktivitas); $i++) {
                    $prevDate = $aktivitas[$i]['tanggal'];
                    $expectedDate = date('Y-m-d', strtotime($checkDate . ' -1 day'));
                    if ($prevDate == $expectedDate) {
                        $streak++;
                        $checkDate = $prevDate; 
                    } else {
                        break; 
                    }
                }
            }
        }

        $semuaMateri = $materiModel->findAll();
        $targetBulanan = [];

        foreach ($semuaMateri as $m) {
            $completedCount = $progressModel->where([
                'user_id' => $userId, 
                'materi_id' => $m['id'],
                'is_completed' => 1
            ])->countAllResults();

            $totalPertemuan = $m['total_pertemuan'];
            $persen = ($totalPertemuan > 0) ? round(($completedCount / $totalPertemuan) * 100) : 0;

            $targetBulanan[] = [
                'judul' => $m['judul'],
                'persen' => $persen
            ];
        }

        $jamMingguan = [];
        for ($i = 1; $i <= 4; $i++) {
            $startDay = ($i - 1) * 7 + 1;
            $endDay = $i * 7;
            $startDate = date('Y-m-') . sprintf("%02d", $startDay); 
            $endDate = date('Y-m-') . sprintf("%02d", $endDay);     

            $count = $progressModel->where('user_id', $userId)
                                   ->where('completed_at >=', $startDate . ' 00:00:00')
                                   ->where('completed_at <=', $endDate . ' 23:59:59')
                                   ->countAllResults();
            $persenAktivitas = min(($count * 10), 100); 
            $jamMingguan[] = [
                'minggu' => 'Minggu ' . $i,
                'persen' => $persenAktivitas
            ];
        }

        $data = [
            'title' => 'Progres Belajar',
            'total_jam' => $totalJam,
            'streak' => $streak,
            'target_bulanan' => $targetBulanan,
            'jam_mingguan' => $jamMingguan
        ];

        return view('page/progres', $data);
    }

    public function peringkat()
    {
        

        $db = \Config\Database::connect();
        
        $builder = $db->table('nilai');
        $builder->select('nilai.user_id, SUM(nilai.skor) as total_skor, profiles.nama_lengkap, profiles.jurusan, profiles.prodi');
        $builder->join('profiles', 'profiles.user_id = nilai.user_id', 'left');
        $builder->groupBy('nilai.user_id, profiles.nama_lengkap, profiles.jurusan, profiles.prodi');
        $builder->orderBy('total_skor', 'DESC');
        
        $query = $builder->get();
        $allRankings = $query->getResultArray();

        $top3 = [];
        $rest = [];

        if (count($allRankings) > 0) {
            $top3 = array_slice($allRankings, 0, 3);
            if (count($allRankings) > 3) {
                $rest = array_slice($allRankings, 3);
            }
        }

        $data = [
            'title' => 'Peringkat Belajar',
            'top3'  => $top3,
            'rest'  => $rest
        ];

        return view('page/peringkat', $data);
    }

    public function resetProgress()
    {
        $db = \Config\Database::connect();
        $db->table('user_progress')->truncate();
        echo "<h1>Berhasil Reset!</h1><a href='".base_url('/materi')."'>Kembali</a>";
    }
}