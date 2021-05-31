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
              <h3>General</h3>
              <ul class="nav side-menu">
                <li>
                  <a href="<?= base_url('pemilik/dashboard/') ?>">
                    <i class="fa fa-home"></i> Dashboard
                  </a>
                </li>
                <li class=""><a><i class="fa fa-money"></i> Akun <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none;">
                    <li><a href="<?= base_url('akun/') ?>">Akun</a></li>
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
                </li>


                <?php if ($this->session->userdata('bagian') == 'pemilik') { ?>
                  <li>
                    <a href="<?= base_url('pemilik/dashboard/') ?>">
                      <i class="fa fa-home"></i> Dashboard
                    </a>
                  </li>
                  <li class=""><a><i class="fa fa-money"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('pemilik/transaksi/') ?>">Tansaksi</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-desktop"></i> Barang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('pemilik/barang/') ?>">Data Barang</a></li>
                      <li><a href="<?= base_url('pemilik/harga_barang/') ?>">Data Harga Barang</a></li>
                      <li><a href="<?= base_url('pemilik/stok_barang/') ?>">Data Stok Barang</a></li>
                      <li><a href="<?= base_url('pemilik/tempat_barang/') ?>">Data Tempat Barang</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-sliders"></i> Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('pemilik/wa/') ?>">Data WA</a></li>
                      <li><a href="<?= base_url('pemilik/promosi/') ?>">Data promosi</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-file"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('bendahara/bku') ?>">Laporan BKU</a></li>
                      <li><a href="<?= base_url('bendahara/laporan_saldo') ?>">Laporan Data Saldo</a></li>
                      <li><a href="<?= base_url('bendahara/laporan_transaksi') ?>">Laporan Transaksi</a></li>
                      <li><a href="<?= base_url('bendahara/laporan_pajak') ?>">Laporan Pajak</a></li>
                    </ul>
                  </li>

                  <li class="bg-light text-dark text-center">
                    <a class="bg-light text-dark">
                      Transaksi hari ini
                      <?php
                      $saldolama = $this->db->query("SELECT SUM(jumlah_transaksi) as jumtrak FROM transaksi WHERE DATE(waktu_transaksi) = CURDATE()");
                      $row = $saldolama->row();
                      $lo = $row->jumtrak;
                      ?>
                      <h5>
                        <?= rupiah($lo) ?>
                      </h5>
                    </a>
                  </li>
                <?php } elseif ($this->session->userdata('bagian') == 'karyawan') { ?>
                  <li>
                    <a href="<?= base_url('karyawan/dashboard/') ?>">
                      <i class="fa fa-home"></i> Dashboard
                    </a>
                  </li>
                  <li class=""><a><i class="fa fa-money"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('karyawan/transaksi/') ?>">Tansaksi</a></li>
                    </ul>
                  </li>
                  <li class=""><a><i class="fa fa-desktop"></i> Barang <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('karyawan/barang/') ?>">Data Barang</a></li>
                      <li><a href="<?= base_url('karyawan/harga_barang/') ?>">Data Harga Barang</a></li>
                      <li><a href="<?= base_url('karyawan/tempat_barang/') ?>">Data Tempat Barang</a></li>
                    </ul>
                  </li>



                  <li class=""><a><i class="fa fa-file"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none;">
                      <li><a href="<?= base_url('karyawan/bku') ?>">Laporan BKU</a></li>
                      <li><a href="<?= base_url('karyawan/laporan_saldo') ?>">Laporan Data Saldo</a></li>
                      <li><a href="<?= base_url('karyawan/laporan_transaksi') ?>">Laporan Transaksi</a></li>
                      <li><a href="<?= base_url('karyawan/laporan_pajak') ?>">Laporan Pajak</a></li>
                    </ul>
                  </li>

                  <li class="bg-light text-dark text-center">
                    <a class="bg-light text-dark">
                      Transaksi hari ini
                      <?php
                      $saldolama = $this->db->query("SELECT SUM(jumlah_transaksi) as jumtrak FROM transaksi WHERE DATE(waktu_transaksi) = CURDATE()");
                      $row = $saldolama->row();
                      $lo = $row->jumtrak;
                      ?>
                      <h5>
                        <?= rupiah($lo) ?>
                      </h5>
                    </a>
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