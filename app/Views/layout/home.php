<?= $this->Section('content'); ?>
<!-- Hero Section -->
<div class="container-fluid py-5" style="background: linear-gradient(180deg, #004d40, #00796b); color: white;">
  <div class="container py-5">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <h2 class="fw-bold mb-2">Hi, Selamat Datang di SIMAJA</h2>
        <h5 class="fw-normal mb-4">Sistem Manajemen Study Jam</h5>
        <p class="mb-4">
          Temukan pengalaman belajar baru bersama SIMAJA, sistem manajemen yang memfasilitasi kegiatan Study Jam Protic secara terorganisir dan menyenangkan.
        </p>
        <div class="d-flex gap-3">
          <a href="/materi" class="btn btn-light px-4 py-2 fw-semibold shadow-sm">Mulai Belajar</a>
          <a href="/jadwal" class="btn btn-outline-light px-4 py-2 fw-semibold">Lihat Jadwal</a>
        </div>
      </div>
      <div class="col-lg-6 text-center">
        <img src="<?= base_url('img/studyjam.png'); ?>" alt="Kegiatan Study Jam" class="img-fluid rounded-4 shadow-lg" style="max-width: 90%;">
      </div>
    </div>
  </div>
</div>

<!-- MENU ICON -->
<div class="container text-center my-5">
  <div class="row justify-content-center">

    <!-- Jadwal -->
    <div class="col-6 col-md-3 mb-4">
      <a href="/jadwal" class="text-decoration-none text-dark">
        <i class="bi bi-calendar3" style="font-size: 3rem; color: #00796b;"></i>
        <h6 class="mt-2 fw-semibold">Jadwal</h6>
      </a>
    </div>

    <!-- Materi -->
    <div class="col-6 col-md-3 mb-4">
      <a href="/materi" class="text-decoration-none text-dark">
        <i class="bi bi-book" style="font-size: 3rem; color: #00796b;"></i>
        <h6 class="mt-2 fw-semibold">Materi</h6>
      </a>
    </div>

    <!-- Progres -->
    <div class="col-6 col-md-3 mb-4">
      <a href="/progres" class="text-decoration-none text-dark">
        <i class="bi bi-bar-chart-line" style="font-size: 3rem; color: #00796b;"></i>
        <h6 class="mt-2 fw-semibold">Progres</h6>
      </a>
    </div>

    <!-- Peringkat -->
    <div class="col-6 col-md-3 mb-4">
      <a href="/peringkat" class="text-decoration-none text-dark">
        <i class="bi bi-trophy" style="font-size: 3rem; color: #00796b;"></i>
        <h6 class="mt-2 fw-semibold">Peringkat</h6>
      </a>
    </div>

  </div>
</div>


<!-- DAFTAR KELAS -->
<div class="container mb-5">
  <div class="row g-4">
    <!-- Kelas 1 -->
    <div class="col-md-4">
      <div class="card border-2 shadow-sm rounded-4">
        <div class="card-body">
          <h5 class="fw-bold mb-1">UI/UX Design</h5>
          <p class="text-muted mb-3">Narasumber: <b>Ahmad Fajar</b></p>
          <ul class="list-unstyled small mb-4">
            <li><i class="bi bi-calendar-event me-2"></i>Sabtu, 12 Okt 2025</li>
            <li><i class="bi bi-clock me-2"></i>08.00 - 11.00</li>
            <li><i class="bi bi-people me-2"></i>48 peserta</li>
          </ul>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-success w-100">Sudah Terdaftar</button>
            <button class="btn btn-success w-100">Absen</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Kelas 2 -->
    <div class="col-md-4">
      <div class="card border-2 shadow-sm rounded-4">
        <div class="card-body">
          <h5 class="fw-bold mb-1">DevOps</h5>
          <p class="text-muted mb-3">Narasumber: <b>Rizal Firmansyah</b></p>
          <ul class="list-unstyled small mb-4">
            <li><i class="bi bi-calendar-event me-2"></i>Sabtu, 19 Okt 2025</li>
            <li><i class="bi bi-clock me-2"></i>09.00 - 12.00</li>
            <li><i class="bi bi-people me-2"></i>44 peserta</li>
          </ul>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-success w-100">Sudah Terdaftar</button>
            <button class="btn btn-success w-100">Absen</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Kelas 3 -->
    <div class="col-md-4">
      <div class="card border-2 shadow-sm rounded-4">
        <div class="card-body">
          <h5 class="fw-bold mb-1">Mobile Development</h5>
          <p class="text-muted mb-3">Narasumber: <b>Bayu Pratama</b></p>
          <ul class="list-unstyled small mb-4">
            <li><i class="bi bi-calendar-event me-2"></i>Minggu, 27 Okt 2025</li>
            <li><i class="bi bi-clock me-2"></i>13.00 - 16.00</li>
            <li><i class="bi bi-people me-2"></i>52 peserta</li>
          </ul>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-success w-100">Sudah Terdaftar</button>
            <button class="btn btn-success w-100">Absen</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Kelas 4 -->
    <div class="col-md-4">
      <div class="card border-2 shadow-sm rounded-4">
        <div class="card-body">
          <h5 class="fw-bold mb-1">Data Science</h5>
          <p class="text-muted mb-3">Narasumber: <b>Siti Rahmawati</b></p>
          <ul class="list-unstyled small mb-4">
            <li><i class="bi bi-calendar-event me-2"></i>Sabtu, 2 Nov 2025</li>
            <li><i class="bi bi-clock me-2"></i>08.00 - 11.00</li>
            <li><i class="bi bi-people me-2"></i>38 peserta</li>
          </ul>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-success w-100">Sudah Terdaftar</button>
            <button class="btn btn-success w-100">Absen</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Kelas 5 -->
    <div class="col-md-4">
      <div class="card border-2 shadow-sm rounded-4">
        <div class="card-body">
          <h5 class="fw-bold mb-1">Cyber Security</h5>
          <p class="text-muted mb-3">Narasumber: <b>Dimas Hidayat</b></p>
          <ul class="list-unstyled small mb-4">
            <li><i class="bi bi-calendar-event me-2"></i>Minggu, 10 Nov 2025</li>
            <li><i class="bi bi-clock me-2"></i>09.00 - 12.00</li>
            <li><i class="bi bi-people me-2"></i>56 peserta</li>
          </ul>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-success w-100">Sudah Terdaftar</button>
            <button class="btn btn-success w-100">Absen</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Kelas 6 -->
    <div class="col-md-4">
      <div class="card border-2 shadow-sm rounded-4">
        <div class="card-body">
          <h5 class="fw-bold mb-1">Web Development</h5>
          <p class="text-muted mb-3">Narasumber: <b>Nanda Prasetyo</b></p>
          <ul class="list-unstyled small mb-4">
            <li><i class="bi bi-calendar-event me-2"></i>Sabtu, 17 Nov 2025</li>
            <li><i class="bi bi-clock me-2"></i>10.00 - 13.00</li>
            <li><i class="bi bi-people me-2"></i>49 peserta</li>
          </ul>
          <div class="d-flex gap-2">
            <button class="btn btn-outline-success w-100">Sudah Terdaftar</button>
            <button class="btn btn-success w-100">Absen</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>
<?= $this->renderSection('content'); ?>
