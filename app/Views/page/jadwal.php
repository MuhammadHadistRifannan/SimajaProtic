<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<!-- HERO SECTION -->
<div class="container-fluid py-5 text-center text-white" style="background: linear-gradient(180deg, #004d40, #00796b);">
  <h2 class="fw-bold mb-2">Jadwal Study Jam</h2>
  <p class="mb-0">Atur waktu belajarmu dengan mudah.<br>Lihat jadwal Study Jam terbaru dan jangan lewatkan sesi penting!
  </p>
</div>

<!-- LIST JADWAL -->
<div class="container my-5">
  <div class="row justify-content-center">

    <!-- CARD 1 -->
    <div class="col-md-8 mb-4">
      <div class="card shadow-sm border-2 rounded-4 p-3 d-flex flex-row justify-content-between align-items-center">
        <div>
          <h6 class="fw-bold mb-1">UI/UX Design</h6>
          <p class="text-muted small mb-2">Introduction UI/UX with Figma</p>
          <div class="d-flex flex-wrap small text-muted">
            <div class="me-3"><i class="bi bi-calendar-event me-1"></i>Senin, 1 Mei 2025</div>
            <div class="me-3"><i class="bi bi-clock me-1"></i>16.00 - selesai</div>
            <div><i class="bi bi-people me-1"></i>32 Peserta</div>
          </div>
        </div>
        <button class="btn text-white fw-semibold w-20" style="background: linear-gradient(90deg,#004d40,#00796b);">Daftar</button>
      </div>
    </div>

    <!-- CARD 2 -->
    <div class="col-md-8 mb-4">
      <div class="card shadow-sm border-2 rounded-4 p-3 d-flex flex-row justify-content-between align-items-center">
        <div>
          <h6 class="fw-bold mb-1">WEB Basic</h6>
          <p class="text-muted small mb-2">Introduction HTML</p>
          <div class="d-flex flex-wrap small text-muted">
            <div class="me-3"><i class="bi bi-calendar-event me-1"></i>Selasa, 2 Mei 2025</div>
            <div class="me-3"><i class="bi bi-clock me-1"></i>16.00 - selesai</div>
            <div><i class="bi bi-people me-1"></i>29 Peserta</div>
          </div>
        </div>
        <div>
          <button class="btn btn-outline-success mb-2 w-100">Sudah Terdaftar</button><br>
          <a href="<?= base_url('absensi'); ?>" class="btn text-white fw-semibold w-100" style="background: linear-gradient(90deg,#004d40,#00796b);">Absen</a>
        </div>
      </div>
    </div>

    <!-- CARD 3 -->
    <div class="col-md-8 mb-4">
      <div class="card shadow-sm border-2 rounded-4 p-3 d-flex flex-row justify-content-between align-items-center">
        <div>
          <h6 class="fw-bold mb-1">WEB Advance</h6>
          <p class="text-muted small mb-2">Introduction Framework</p>
          <div class="d-flex flex-wrap small text-muted">
            <div class="me-3"><i class="bi bi-calendar-event me-1"></i>Rabu, 3 Mei 2025</div>
            <div class="me-3"><i class="bi bi-clock me-1"></i>16.00 - selesai</div>
            <div><i class="bi bi-people me-1"></i>29 Peserta</div>
          </div>
        </div>
        <button class="btn text-white fw-semibold w-20" style="background: linear-gradient(90deg,#004d40,#00796b);">Daftar</button>
      </div>
    </div>

    <!-- CARD 4 -->
    <div class="col-md-8 mb-4">
      <div class="card shadow-sm border-2 rounded-4 p-3 d-flex flex-row justify-content-between align-items-center">
        <div>
          <h6 class="fw-bold mb-1">DevOps</h6>
          <p class="text-muted small mb-2">Introduction DevOps</p>
          <div class="d-flex flex-wrap small text-muted">
            <div class="me-3"><i class="bi bi-calendar-event me-1"></i>Rabu, 3 Mei 2025</div>
            <div class="me-3"><i class="bi bi-clock me-1"></i>16.00 - selesai</div>
            <div><i class="bi bi-people me-1"></i>22 Peserta</div>
          </div>
        </div>
        <button class="btn text-white fw-semibold w-20" style="background: linear-gradient(90deg,#004d40,#00796b);">Daftar</button>
      </div>
    </div>

    <!-- CARD 5 -->
    <div class="col-md-8 mb-4">
      <div class="card shadow-sm border-2 rounded-4 p-3 d-flex flex-row justify-content-between align-items-center">
        <div>
          <h6 class="fw-bold mb-1">Data</h6>
          <p class="text-muted small mb-2">Introduction Data</p>
          <div class="d-flex flex-wrap small text-muted">
            <div class="me-3"><i class="bi bi-calendar-event me-1"></i>Kamis, 4 Mei 2025</div>
            <div class="me-3"><i class="bi bi-clock me-1"></i>16.00 - selesai</div>
            <div><i class="bi bi-people me-1"></i>29 Peserta</div>
          </div>
        </div>
        <button class="btn text-white fw-semibold w-20" style="background: linear-gradient(90deg,#004d40,#00796b);">Daftar</button>
      </div>
    </div>

    <!-- CARD 6 -->
    <div class="col-md-8 mb-4">
      <div class="card shadow-sm border-2 rounded-4 p-3 d-flex flex-row justify-content-between align-items-center">
        <div>
          <h6 class="fw-bold mb-1">Mobile</h6>
          <p class="text-muted small mb-2">Introduction Mobile</p>
          <div class="d-flex flex-wrap small text-muted">
            <div class="me-3"><i class="bi bi-calendar-event me-1"></i>Kamis, 4 Mei 2025</div>
            <div class="me-3"><i class="bi bi-clock me-1"></i>16.00 - selesai</div>
            <div><i class="bi bi-people me-1"></i>48 Peserta</div>
          </div>
        </div>
        <button class="btn text-white fw-semibold w-20" style="background: linear-gradient(90deg,#004d40,#00796b);">Daftar</button>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection(); ?>