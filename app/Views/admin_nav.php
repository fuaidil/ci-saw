<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/logo-uin.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= site_url('home')?>" class="d-block">Informatika UIN Malang</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
          <a href="<?= site_url('home') ?>" class="nav-link <?php if(in_array($activeMenu, ['dashboard'])) echo "active" ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
          </a>
          </li>
          <li class="nav-item <?php if(in_array($activeMenu, ['mhs']) || in_array($activeMenu, ['ju']) ||
           in_array($activeMenu, ['umkm']) || in_array($activeMenu, ['kriteria']) || in_array($activeMenu, ['bobot']) || in_array($activeMenu, ['alternatif'])) echo "menu-open" ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
                <span class="right badge badge-success">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item ">
                <a href="<?= site_url('mhs') ?>" class="nav-link <?php if($activeMenu == 'mhs') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Mahasiswa</p>
                </a>
              </li> -->
              <!-- <li class="nav-item">
                <a href="<?= site_url('home/view_ju') ?>" class="nav-link <?php if($activeMenu == 'ju') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Usaha</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('home/view_umkm') ?>" class="nav-link <?php if($activeMenu == 'umkm') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data UMKM</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?= site_url('home/view_kriteria') ?>" class="nav-link <?php if($activeMenu == 'kriteria') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Kriteria</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="<?= site_url('home/view_bobot') ?>" class="nav-link <?php if($activeMenu == 'bobot') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Bobot</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="<?= site_url('home/view_alt') ?>" class="nav-link <?php if($activeMenu == 'alternatif') echo "active" ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Alternatif</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo site_url('home/callviewhitung');?>" class="nav-link <?php if(in_array($activeMenu, ['cost'])) echo "active" ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Konversi Penilaian
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('home/callviewnormalisasi');?>" class="nav-link <?php if(in_array($activeMenu, ['normalisasi'])) echo "active" ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Hitung Normalisasi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('home/callviewranking');?>" class="nav-link <?php if(in_array($activeMenu, ['ranking'])) echo "active" ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Hitung Perangkingan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url('home/callviewkeputusan');?>" class="nav-link <?php if(in_array($activeMenu, ['keputusan'])) echo "active" ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
              Hasil Keputusan
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?= site_url('home/penilaian') ?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Penilaian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index3.html" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Konversi Penilaian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index3.html" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Hitung Normalisasi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index3.html" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Hitung Perangkingan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index3.html" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>Hasil Keputusan</p>
            </a>
          </li> -->
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>