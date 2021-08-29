<body class="nav-md">
  <div class="container body">
    <div class="main_container kiri">
      <?= $this->session->flashdata('message'); ?>
      <?php
      function rupiah($angka)
      {

        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
      }

      function rupiah1($angka)
      {

        $hasil_rupiah = number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
      }
      ?>
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view kiri">
          <div class="navbar nav_title kiri_pojok" style="border: 0;">
            <a href="<?= base_url('') . $this->session->userdata('hakakses') . '/index' ?>" class="site_title">
              <span>SIA NORKAYATI</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?= base_url('assets/') ?>gambar_pkl/guru.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <!-- <span>Welcome, </span> -->

              <h2><?= $this->session->userdata('username') ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <?php
              if ($this->session->userdata('hakakses') == 1) {
                echo  '<h3>Pemilik</h3>';
              } elseif ($this->session->userdata('hakakses') == 2) {
                echo  '<h3>Bendahara</h3>';
              } elseif ($this->session->userdata('hakakses') == 3) {
                echo  '<h3>Kasir</h3>';
              }
              ?>
              <ul class="nav side-menu">
                <!-- <li>
                  <a href="<?= base_url('dashboard/') ?>">
                    <i class="fa fa-home"></i> Dashboard
                  </a>
                </li>
                <li class=""><a><i class="fa fa-money"></i> Akun <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none;">
                    <li><a href="<?= base_url('akun/') ?>">Akun</a></li>
                  </ul>
                </li>
                <li class=""><a><i class="fa fa-user"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none;">
                    <li><a href="<?= base_url('pengguna/') ?>">Pengguna</a></li>
                  </ul>
                </li>
                <li class=""><a><i class="fa fa-desktop"></i> Jurnal <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none;">
                    <li><a href="<?= base_url('jurnal/jkm/') ?>">Kas Masuk</a></li>
                    <li><a href="<?= base_url('jurnal/jkk/') ?>">Kas Keluar</a></li>
                    <li><a href="<?= base_url('jurnal/jb/') ?>">Pembelian</a></li>
                    <li><a href="<?= base_url('jurnal/jj/') ?>">Penjualan</a></li>
                    <li><a href="<?= base_url('jurnal/ju/') ?>">Umum</a></li>
                  </ul>
                </li>
                <li class=""><a><i class="fa fa-sliders"></i> Buku <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none;">
                    <li><a href="<?= base_url('buku/besar') ?>">Buku Besar</a></li>
                    <li><a href="<?= base_url('buku/besar_pembantu/') ?>">Buku Besar Pembantu</a></li>
                  </ul>
                </li>
                <li class=""><a><i class="fa fa-sliders"></i> Neraca <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none;">
                    <li><a href="<?= base_url('neraca_saldo/') ?>">Neraca Saldo</a></li>
                    <li><a href="<?= base_url('buku/besar_pembantu/') ?>">Buku Besar Pembantu</a></li>
                  </ul>
                </li>
                <li class=""><a><i class="fa fa-file"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none;">
                    <li><a href="<?= base_url('bendahara/bku') ?>">Laporan BKU</a></li>
                    <li><a href="<?= base_url('bendahara/laporan_saldo') ?>">Laporan Data Saldo</a></li>
                    <li><a href="<?= base_url('bendahara/laporan_transaksi') ?>">Laporan Transaksi</a></li>
                    <li><a href="<?= base_url('bendahara/laporan_pajak') ?>">Laporan Pajak</a></li>
                  </ul>
                </li> -->


                <?php if ($this->session->userdata('hakakses') == 1) { ?>
                  <li>
                    <a href="<?= base_url('dashboard/') ?>">
                      <i class="fa fa-home"></i> Dashboard
                    </a>
                  </li>
                  <li class=""><a><i class="fa fa-tasks"></i> Akun <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('akun/') ?>">Akun</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-users"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('pengguna/') ?>">Pengguna</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-ellipsis-v"></i> Piutang and Utang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('piutang_dagang/') ?>">Piutang Dagang</a></li>
                      <li><a href="<?= base_url('utang_dagang/') ?>">Utang Dagang</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-folder-open"></i> Jurnal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('jurnal/jkm/') ?>">Kas Masuk</a></li>
                      <li><a href="<?= base_url('jurnal/jkk/') ?>">Kas Keluar</a></li>
                      <li><a href="<?= base_url('jurnal/jb/') ?>">Pembelian</a></li>
                      <li><a href="<?= base_url('jurnal/jj/') ?>">Penjualan</a></li>
                      <li><a href="<?= base_url('jurnal/ju/') ?>">Umum</a></li>
                      <li><a href="<?= base_url('jps') ?>">Penyesuaian</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-book"></i> Buku <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('buku/besar') ?>">Buku Besar</a></li>
                      <li><a href="<?= base_url('buku/besar_pembantu/') ?>">Buku Besar Pembantu</a></li>
                    </ul>
                  </li>

                  <li class=""><a><i class="fa fa-paper-plane-o"></i> Neraca <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('neraca_saldo/') ?>">Neraca Saldo</a></li>
                      <li><a href="<?= base_url('buku/besar_pembantu/') ?>">Buku Besar Pembantu</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-file-excel-o"></i> Kertas Kerja <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('kertas_kerja') ?>">Kertas kerja</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-file"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('laporan_keuangan') ?>">Laporan Keuangan</a></li>
                    </ul>
                  </li>
                <?php } elseif ($this->session->userdata('hakakses') == 2) { ?>
                  <li>
                    <a href="<?= base_url('dashboard/') ?>">
                      <i class="fa fa-home"></i> Dashboard
                    </a>
                  </li>
                  <li class=""><a><i class="fa fa-ellipsis-v"></i> Piutang and Utang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('piutang_dagang/') ?>">Piutang Dagang</a></li>
                      <li><a href="<?= base_url('utang_dagang/') ?>">Utang Dagang</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-folder-open"></i> Jurnal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('jurnal/jkm/') ?>">Kas Masuk</a></li>
                      <li><a href="<?= base_url('jurnal/jkk/') ?>">Kas Keluar</a></li>
                      <li><a href="<?= base_url('jurnal/jb/') ?>">Pembelian</a></li>
                      <li><a href="<?= base_url('jurnal/jj/') ?>">Penjualan</a></li>
                      <li><a href="<?= base_url('jurnal/ju/') ?>">Umum</a></li>
                      <li><a href="<?= base_url('jps') ?>">Penyesuaian</a></li>

                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-book"></i> Buku <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('buku/besar') ?>">Buku Besar</a></li>
                      <li><a href="<?= base_url('buku/besar_pembantu/') ?>">Buku Besar Pembantu</a></li>
                    </ul>
                  </li>

                  <li class=""><a><i class="fa fa-paper-plane-o"></i> Neraca <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('neraca_saldo/') ?>">Neraca Saldo</a></li>
                      <li><a href="<?= base_url('buku/besar_pembantu/') ?>">Buku Besar Pembantu</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-file-excel-o"></i> Kertas Kerja <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('kertas_kerja') ?>">Neraca saldo</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-file"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('laporan_keuangan') ?>">Laporan Keuangan</a></li>
                    </ul>
                  </li>
                  <!-- <li class="bg-white">
                    <a class="bg-light text-dark">
                      <i class="fa fa-money"></i> KAS
                      <?php
                      $kasjkm = $this->db->query(" SELECT SUM(debet) as jkm_debet, SUM(kredit) as jkm_kredit FROM jurnal_penerimaan_kas")->row();
                      $kasjkk = $this->db->query(" SELECT SUM(debet) as jkk_debet, SUM(kredit) as jkk_kredit FROM jurnal_pengeluaran_kas")->row();

                      echo $kas_debet = $kasjkm->jkm_debet + $kasjkk->jkk_debet;
                      echo $kas_kredit = $kasjkm->jkm_kredit + $kasjkk->jkk_kredit;

                      if($kas_debet > $kas_kredit){
                        $kas_akhir = $kas_debet - $kas_kredit;                    

                      }elseif($kas_debet < $kas_kredit){
                        $kas_akhir = $kas_debet - $kas_kredit;
                      }
                     
                      ?>
                      <h4>

                         <?= rupiah($kas_akhir) ?> 
                      </h4>
                    </a>

                  </li> -->
                <?php } elseif ($this->session->userdata('hakakses') == 3) { ?>
                  <li>
                    <a href="<?= base_url('dashboard/') ?>">
                      <i class="fa fa-home"></i> Dashboard
                    </a>
                  </li>
                  <li class=""><a><i class="fa fa-folder-open"></i> Jurnal <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('jurnal/jkm/') ?>">Kas Masuk</a></li>
                      <li><a href="<?= base_url('jurnal/jj/') ?>">Penjualan</a></li>
                      <li><a href="<?= base_url('jurnal/ju/') ?>">Umum</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-ellipsis-v"></i> Piutang and Utang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('piutang_dagang/') ?>">Piutang Dagang</a></li>
                      <li><a href="<?= base_url('utang_dagang/') ?>">Utang Dagang</a></li>
                    </ul>
                  </li>
                <?php } ?>
              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->


        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?= base_url('assets/') ?>img/user.png" alt=""><?= $this->session->userdata('username') ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">

                  <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>


            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->