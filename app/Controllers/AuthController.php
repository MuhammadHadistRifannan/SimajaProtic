<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function logout()
    {
        // Hapus semua data sesi pengguna
        session()->destroy();

        // Arahkan kembali ke halaman login (ubah sesuai rute kamu)
        return redirect()->to(base_url('login'))->with('pesan', 'Anda berhasil logout.');
    }
}
