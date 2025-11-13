<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Hasil Pencarian | SIMAJA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
  <?= $this->include('layout/navbar'); ?> <!-- navbar kamu -->
  
  <div class="container mt-5">
    <h4 class="mb-4 text-center">Hasil Pencarian untuk: <span class="text-success"><?= esc($query) ?></span></h4>

    <!-- HASIL MATERI -->
    <div class="mb-5">
      <h5 class="text-primary mb-3"><i class="bi bi-book"></i> Materi</h5>
      <?php if (count($materi) > 0): ?>
        <ul class="list-group">
          <?php foreach ($materi as $m): ?>
            <li class="list-group-item">
              <strong><?= esc($m['judul']); ?></strong><br>
              <small><?= esc($m['deskripsi']); ?></small>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="text-muted">Tidak ada materi yang cocok.</p>
      <?php endif; ?>
    </div>

    <!-- HASIL JADWAL -->
    <div>
      <h5 class="text-primary mb-3"><i class="bi bi-calendar3"></i> Jadwal Study Jam</h5>
      <?php if (count($jadwal) > 0): ?>
        <ul class="list-group">
          <?php foreach ($jadwal as $j): ?>
            <li class="list-group-item">
              <strong><?= esc($j['mapel']); ?></strong> — <?= esc($j['hari']); ?> pukul <?= esc($j['jam']); ?>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="text-muted">Tidak ada jadwal yang cocok.</p>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
