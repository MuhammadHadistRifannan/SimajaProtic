<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<!-- HERO SECTION -->
<div class="container-fluid py-5 text-center text-white" style="background: linear-gradient(180deg, #004d40, #00796b);">
  <h2 class="fw-bold mb-2">Peringkat</h2>
  <p class="mb-0">
    Naik ke puncak peringkat!<br>
    Raih posisi terbaik lewat semangat belajar dan kolaborasi.
  </p>
</div>

<!-- TOP 3 RANK -->
<div class="container my-5 text-center">
  <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
    <!-- #2 -->
    <div class="border rounded-4 p-4 shadow-sm text-center" style="width:180px; background-color:#e0f2f1; border:2px solid #009688;">
      <div class="fw-bold text-white bg-teal rounded-pill d-inline-block px-3 py-1 mb-2" style="background-color:#004d40;">#2</div>
      <h5 class="fw-bold mb-1">Nazril</h5>
      <small class="text-muted">Teknik Informatika</small>
    </div>

    <!-- #1 -->
    <div class="border rounded-4 p-4 shadow-sm text-center" style="width:180px;">
      <div class="fw-bold text-white bg-teal rounded-pill d-inline-block px-3 py-1 mb-2" style="background-color:#004d40;">#1</div>
      <h5 class="fw-bold mb-1">Giska</h5>
      <small class="text-muted">Teknik Informatika</small>
    </div>

    <!-- #3 -->
    <div class="border rounded-4 p-4 shadow-sm text-center" style="width:180px;">
      <div class="fw-bold text-white bg-teal rounded-pill d-inline-block px-3 py-1 mb-2" style="background-color:#004d40;">#3</div>
      <h5 class="fw-bold mb-1">Ale</h5>
      <small class="text-muted">Teknik Informatika</small>
    </div>
  </div>

  <!-- RANKING LIST -->
  <h5 class="fw-bold text-start mb-4">Rangking Lengkap</h5>

  <?php
  $ranking = [
    ['posisi' => 4, 'nama' => 'Daffa', 'jurusan' => 'Teknik Mesin'],
    ['posisi' => 5, 'nama' => 'Akmal', 'jurusan' => 'Rekaya Keamanan Siber'],
    ['posisi' => 6, 'nama' => 'Ilham', 'jurusan' => 'Teknik Elektro'],
    ['posisi' => 7, 'nama' => 'Bima', 'jurusan' => 'Teknologi Rekayasa Multimedia'],
  ];
  ?>

  <?php foreach ($ranking as $r): ?>
    <div class="border rounded-4 p-3 mb-3 d-flex align-items-center shadow-sm">
      <div class="fw-bold text-white rounded-circle d-flex justify-content-center align-items-center me-3"
           style="width: 40px; height: 40px; background-color:#004d40;">
        #<?= $r['posisi']; ?>
      </div>
      <div class="text-start">
        <h6 class="fw-bold mb-0"><?= esc($r['nama']); ?></h6>
        <small class="text-muted"><?= esc($r['jurusan']); ?></small>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>
