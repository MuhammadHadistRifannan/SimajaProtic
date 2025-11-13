<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIMAJA - Sistem Manajemen Study Jam</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <style>
    /* Style tambahan agar dropdown terlihat seperti gambar */
    .profile-menu {
      position: absolute;
      top: 70px;
      right: 20px;
      background: white;
      border-radius: 25px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
      width: 150px;
      display: none;
      text-align: center;
      padding: 10px 0;
      z-index: 1000;
    }

    .profile-menu a {
      display: block;
      padding: 8px 0;
      color: #000;
      font-weight: 600;
      text-decoration: none;
      border-radius: 30px;
      margin: 5px 10px;
      transition: all 0.3s ease;
    }

    .profile-menu a:hover {
      background-color: #e0f2f1;
    }

    .profile-btn {
      position: relative;
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #004d40, #00796b);">
    <div class="container-fluid">
      <!-- LOGO DAN NAMA -->
      <a class="navbar-brand fw-bold text-white" href="/">
        <div class="d-flex align-items-center">
          <img src="/img/protic.png" alt="logo" width="40" height="40" class="me-2">
          <div>
            SIMAJA<br>
            <small class="fw-normal">Sistem Manajemen Study Jam</small>
          </div>
        </div>
      </a>

      <!-- TOGGLER -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- MENU NAV -->
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link <?= (uri_string() == '' ? 'active' : '') ?>" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'jadwal' ? 'active' : '') ?>" href="/jadwal">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'materi' ? 'active' : '') ?>" href="/materi">Materi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'progres' ? 'active' : '') ?>" href="/progres">Progres</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= (uri_string() == 'peringkat' ? 'active' : '') ?>" href="/peringkat">Peringkat</a>
          </li>
        </ul>


      </div>

      <!-- SEARCH DAN PROFIL -->
      <div class="d-flex align-items-center position-relative">
        <form action="/search" method="get" class="d-flex me-2">
          <input type="text" name="q" class="form-control form-control-sm me-2" placeholder="Cari materi atau jadwal..."
            style="width: 180px;">
          <button class="btn btn-outline-light" type="submit">
            <i class="bi bi-search"></i> Search
          </button>
        </form>


        <!-- Tombol Profile -->
        <div class="profile-btn">
          <button id="profileToggle" class="btn btn-outline-light rounded-circle" style="width: 40px; height: 40px;">
            <i class="bi bi-person"></i>
          </button>

          <!-- Dropdown Profile -->
          <div id="profileMenu" class="profile-menu">
            <a href="/profile">Profile</a>
            <a href="<?= base_url('logout'); ?>">Logout</a>
            <!-- <li class="nav-item">
  <a href="<?= base_url('logout'); ?>" class="nav-link text-white fw-semibold">
    <i class="bi bi-box-arrow-right me-1"></i> Logout
  </a>
</li> -->

          </div>
        </div>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // JS agar dropdown muncul ketika klik icon profil
    const profileToggle = document.getElementById('profileToggle');
    const profileMenu = document.getElementById('profileMenu');

    profileToggle.addEventListener('click', () => {
      profileMenu.style.display = profileMenu.style.display === 'block' ? 'none' : 'block';
    });

    // Tutup dropdown ketika klik di luar area
    document.addEventListener('click', (event) => {
      if (!profileToggle.contains(event.target) && !profileMenu.contains(event.target)) {
        profileMenu.style.display = 'none';
      }
    });
  </script>
</body>

</html>