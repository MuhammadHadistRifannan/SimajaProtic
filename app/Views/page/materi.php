<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<!-- HERO SECTION -->
<div class="container-fluid py-5 text-center text-white" style="background: linear-gradient(180deg, #004d40, #00796b);">
  <h2 class="fw-bold mb-2">Materi Study Jam</h2>
  <p class="mb-0">
    Akses materi pembelajaran yang sudah dipilih dan disusun oleh mentor.<br>
    Pelajari konsep, praktekan, dan kuasai langkah demi langkah.
  </p>
</div>

<!-- DAFTAR MATERI -->
<div class="container my-5">
  <div class="row g-4 justify-content-center">

    <!-- CARD TEMPLATE -->
    <?php
    $materiList = [
      ['judul' => 'UI/UX Design', 'progress' => 4, 'total' => 5],
      ['judul' => 'WEB Basic', 'progress' => 3, 'total' => 5],
      ['judul' => 'WEB Advance', 'progress' => 2, 'total' => 5],
      ['judul' => 'Devops', 'progress' => 3, 'total' => 5],
      ['judul' => 'Data', 'progress' => 4, 'total' => 5],
      ['judul' => 'Mobile', 'progress' => 3, 'total' => 5],
    ];
    ?>

    <?php foreach ($materiList as $m) : ?>
      <div class="col-10 col-md-5 col-lg-4">
        <div class="card border rounded-4 shadow-sm text-center p-4">
          <h6 class="fw-bold mb-3"><?= esc($m['judul']); ?></h6>

          <!-- Progress -->
          <div class="progress mb-2" style="height: 8px; border-radius: 4px;">
            <div class="progress-bar" role="progressbar"
                 style="width: <?= ($m['progress'] / $m['total']) * 100; ?>%; background: linear-gradient(90deg,#004d40,#00796b);"
                 aria-valuenow="<?= $m['progress']; ?>"
                 aria-valuemin="0"
                 aria-valuemax="<?= $m['total']; ?>">
            </div>
          </div>
          <small class="text-muted mb-3 d-block"><?= $m['progress']; ?>/<?= $m['total']; ?> Selesai</small>

          <!-- Tombol -->
          <div class="d-grid gap-2 mt-3">
            <a href="#" class="btn btn-outline-dark fw-semibold">Lihat Materi</a>
            <a href="#" class="btn text-white fw-semibold" style="background: linear-gradient(90deg,#004d40,#00796b);">Quiz</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </div>
</div>

<?= $this->endSection(); ?>
