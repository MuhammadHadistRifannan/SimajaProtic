<?php

namespace App\Controllers;

use App\Controllers\BaseController;

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
  public function logout()
  {
    // Logout bawaan Myth\Auth
    service('authentication')->logout();

    // Hapus semua session tambahan
    session()->destroy();

    // Redirect ke login
    return redirect()->to('/login')->with('pesan', 'Anda berhasil logout.');
  }
}

class Page extends BaseController
{
  public function jadwal()
  {
    // Memanggil view jadwal di folder Views/page
    return view('page/jadwal');
  }

  public function materi()
  {
    return view('page/materi');
  }

  public function progres()
  {
    return view('page/progres');
  }

  public function peringkat()
  {
    return view('page/peringkat');
  }

  public function profile()
  {
    return view('page/profile');
  }

  public function absensi()
  {
    return view('page/absensi');
  }

  public function kirimAbsensi()
  {
    $status = $this->request->getPost('status');

    // Simpan atau proses data (di sini contoh pakai session flashdata saja)
    session()->setFlashdata('pesan', "Absensi berhasil dikirim! Status: $status");

    return redirect()->to('/absensi');
  }

  // SEARCH
  public function search()
  {
    $query = $this->request->getGet('q');

    // Cegah pencarian kosong
    if (!$query) {
      return redirect()->back()->with('pesan', 'Masukkan kata kunci pencarian.');
    }

    // Ambil model
    $materiModel = new \App\Models\MateriModel();
    $jadwalModel = new \App\Models\JadwalModel();

    // Lakukan pencarian
    $hasilMateri = $materiModel->like('judul', $query)->findAll();
    $hasilJadwal = $jadwalModel->like('mapel', $query)->findAll();

    $data = [
      'judul' => 'Hasil Pencarian',
      'query' => $query,
      'materi' => $hasilMateri,
      'jadwal' => $hasilJadwal
    ];

    return view('page/search', $data);
  }


}
