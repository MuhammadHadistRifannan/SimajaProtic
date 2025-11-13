<?= $this->extend('layout/main'); ?>
<?= $this->section('content'); ?>

<!-- HERO SECTION -->
<div class="container-fluid py-5 text-center text-white" style="background: linear-gradient(180deg, #004d40, #00796b);">
  <h2 class="fw-bold mb-2">Progres</h2>
  <p class="mb-0">
    Pantau sejauh mana kamu berkembang.<br>
    Lihat pencapaian, target, dan kemajuan belajarmu secara real-time.
  </p>
</div>

<!-- STATISTIK -->
<div class="container my-5">
  <div class="row justify-content-center text-center mb-4">
    <div class="col-md-4 col-10 mb-3">
      <div class="border rounded-4 p-4 shadow-sm">
        <h6 class="text-muted">Total Jam</h6>
        <h2 class="fw-bold mb-1">124</h2>
        <small class="text-muted">15% Bulan ini</small>
      </div>
    </div>
    <div class="col-md-4 col-10 mb-3">
      <div class="border rounded-4 p-4 shadow-sm">
        <h6 class="text-muted">Streak</h6>
        <h2 class="fw-bold mb-1">12</h2>
        <small class="text-muted">Hari berturut-turut</small>
      </div>
    </div>
  </div>

  <!-- JAM BELAJAR MINGGUAN -->
  <div class="mb-5">
    <h5 class="fw-bold mb-3">Jam Belajar Mingguan</h5>
    <div class="border rounded-4 p-4 shadow-sm">
      <?php
      $mingguan = [
        ['minggu' => 'Minggu 1', 'persen' => 80],
        ['minggu' => 'Minggu 2', 'persen' => 60],
        ['minggu' => 'Minggu 3', 'persen' => 40],
        ['minggu' => 'Minggu 4', 'persen' => 90],
      ];
      ?>
      <?php foreach ($mingguan as $m) : ?>
        <div class="mb-3">
          <div class="d-flex justify-content-between small fw-semibold mb-1">
            <span><?= esc($m['minggu']); ?></span>
          </div>
          <div class="progress" style="height: 8px;">
            <div class="progress-bar" role="progressbar"
                 style="width: <?= $m['persen']; ?>%; background: linear-gradient(90deg,#004d40,#00796b);"
                 aria-valuenow="<?= $m['persen']; ?>" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- TARGET BULANAN -->
  <div>
    <h5 class="fw-bold mb-3">Target Bulanan</h5>
    <div class="border rounded-4 p-4 shadow-sm">
      <?php
      $target = [
        ['judul' => 'WEB Basic', 'persen' => 80],
        ['judul' => 'Devops', 'persen' => 60],
        ['judul' => 'Data', 'persen' => 75],
        ['judul' => 'Mobile', 'persen' => 50],
      ];
      ?>
      <?php foreach ($target as $t) : ?>
        <div class="mb-3">
          <div class="d-flex justify-content-between small fw-semibold mb-1">
            <span><?= esc($t['judul']); ?></span>
            <span><?= $t['persen']; ?>% Tercapai</span>
          </div>
          <div class="progress" style="height: 8px;">
            <div class="progress-bar" role="progressbar"
                 style="width: <?= $t['persen']; ?>%; background: linear-gradient(90deg,#004d40,#00796b);"
                 aria-valuenow="<?= $t['persen']; ?>" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
