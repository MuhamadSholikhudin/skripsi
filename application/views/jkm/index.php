<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <?php
                if ($pilihan[0] == 'menu') { ?>
                    <a class="btn btn-primary" href="<?= base_url('pilihan/jkm/tambah/' . $bulan_pilih[0] . '/' . $tahun_pilih[0]) ?>" role="button">Tambah jkm</a>
                <?php } else { ?>
                    <a class="btn btn-primary" href="<?= base_url('jurnal/jkm/tambah') ?>" role="button">Tambah jkm</a>
                <?php } ?>


            </div>
            <!-- <div class="col-md-12">
                <h3>Data jkm</h3>
            </div> -->

            <br>



            <div class="col-md-12 text-center">

                <h5>Toko Norkayati</h5>
                <h5>Jurnal Penerimaan Kas</h5>

                <?php
                if ($pilihan[0] == 'menu') { ?>
                    <h5>Periode
                        <?php
                        if ($bulan_pilih[0] == 1) {
                            echo "Januari";
                        } elseif ($bulan_pilih[0] == 2) {
                            echo "Februari";
                        } elseif ($bulan_pilih[0] == 3) {
                            echo "Maret";
                        } elseif ($bulan_pilih[0] == 4) {
                            echo "April";
                        } elseif ($bulan_pilih[0] == 5) {
                            echo "Mei";
                        } elseif ($bulan_pilih[0] == 6) {
                            echo "Juni";
                        } elseif ($bulan_pilih[0] == 7) {
                            echo "Juli";
                        } elseif ($bulan_pilih[0] == 8) {
                            echo "Agustus";
                        } elseif ($bulan_pilih[0] == 9) {
                            echo "September";
                        } elseif ($bulan_pilih[0] == 10) {
                            echo "Oktober";
                        } elseif ($bulan_pilih[0] == 11) {
                            echo "November";
                        } elseif ($bulan_pilih[0] == 12) {
                            echo "Desember";
                        }
                        ?>
                        <?= $tahun_pilih[0] ?>
                    </h5>
                <?php } else { ?>

                <?php } ?>




            </div>
<!-- <div class="col-lg-6">
    a
</div>
<div class="col-lg-6">
    a
</div> -->
            <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead class="text-center">
                    <tr>
                        <th rowspan="3">Tanggal</th>
                        <th rowspan="3">Keterangan</th>
                        <th rowspan="3">Ref</th>
                        <th colspan="2">Debet</th>
                        <th colspan="5">Kredit</th>
                        <th rowspan="3">Aksi</th>

                    </tr>
                    <tr>
                        <th rowspan="2">Kas</th>
                        <th rowspan="2">Pot Penjualan</th>
                        <th rowspan="2">Piutang Dagang</th>
                        <th rowspan="2">Penjualan</th>
                        <th colspan="3">Serba-serbi</th>
                    </tr>
                    <tr>
                        <th>Akun</th>
                        <th>Ref</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody class="text-right">
                    <?php foreach ($jkm as $ak) : ?>
                        <?php
                        if ($ak->no_akun == 411) { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
                                    <?php
                                    if ($pilihan[0] == 'menu') { ?>
                                        <?= tanggal_pilih($ak->tanggal) ?>
                                    <?php } else { ?>
                                        <?= tgl_bln_thn($ak->tanggal) ?>
                                    <?php } ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jurnal_penerimaan_kas WHERE no_transaksi = $ak->no_transaksi AND no_akun != 411";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo rupiah($gk['debet']);
                                    ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td><?= rupiah($ak->kredit) ?></td>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                <?php if ($pilihan[0] == 'menu') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkm/edit/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkm/hapus/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                <?php } elseif ($pilihan[0] == 'samping') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkm/edit/') . $ak->no_transaksi  ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkm/hapus/') . $ak->no_transaksi  ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>

                                <?php } ?>

                            </tr>
                        <?php    } elseif ($ak->no_akun == 113) { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
                                    <?php
                                    if ($pilihan[0] == 'menu') { ?>

                                        <?= tanggal_pilih($ak->tanggal) ?>
                                    <?php } else { ?>
                                        <?= tgl_bln_thn($ak->tanggal) ?>
                                    <?php } ?>
                                </td>
                                <td><?php
                                    $qk = "SELECT piutang_dagang.nama_piutang_dagang as nama_piutang_dagang FROM jurnal_penerimaan_kas JOIN piutang_dagang ON jurnal_penerimaan_kas.id_piutang_dagang = piutang_dagang.id_piutang_dagang  WHERE jurnal_penerimaan_kas.no_transaksi = '$ak->no_transaksi' AND jurnal_penerimaan_kas.no_akun = 113";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo $gk['nama_piutang_dagang'];
                                    ?></td>
                                <td><?php
                                    $qq = "SELECT piutang_dagang.no_piutang_dagang as no_piutang_dagang FROM jurnal_penerimaan_kas JOIN piutang_dagang ON jurnal_penerimaan_kas.id_piutang_dagang = piutang_dagang.id_piutang_dagang  WHERE jurnal_penerimaan_kas.no_transaksi = '$ak->no_transaksi' AND jurnal_penerimaan_kas.no_akun = 113";
                                    $gg = $this->db->query($qq)->row_array();
                                    echo $gg['no_piutang_dagang'];
                                    ?></td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jurnal_penerimaan_kas WHERE no_transaksi = '$ak->no_transaksi' AND no_akun = 111";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo rupiah($gk['debet']);
                                    ?>
                                </td>
                                <td><?php
                                    $qk = "SELECT * FROM jurnal_penerimaan_kas WHERE no_transaksi = '$ak->no_transaksi' AND no_akun = 413";
                                    $gk = $this->db->query($qk)->row_array();
                                    if ($gk['debet'] > 0) {
                                        echo rupiah($gk['debet']);
                                    } else {
                                    }

                                    ?></td>
                                <td><?= rupiah($ak->kredit) ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                <?php if ($pilihan[0] == 'menu') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkm/edit/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkm/hapus/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                <?php } elseif ($pilihan[0] == 'samping') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkm/edit/') . $ak->no_transaksi  ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkm/hapus/') . $ak->no_transaksi  ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>

                                <?php } ?>

                            </tr>

                        <?php } else { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
                                    <?php
                                    if ($pilihan[0] == 'menu') { ?>

                                        <?= tanggal_pilih($ak->tanggal) ?>
                                    <?php } else { ?>
                                        <?= tgl_bln_thn($ak->tanggal) ?>
                                    <?php } ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jurnal_penerimaan_kas WHERE no_transaksi = $ak->no_transaksi AND no_akun = 111";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo rupiah($gk['debet']);
                                    ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

                                    <?php
                                    $qk = "SELECT akun.nama_akun as nama_akun FROM jurnal_penerimaan_kas JOIN akun ON jurnal_penerimaan_kas.no_akun = akun.no_akun WHERE jurnal_penerimaan_kas.no_transaksi = $ak->no_transaksi AND jurnal_penerimaan_kas.no_akun != 111";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo $gk['nama_akun'];
                                    ?>
                                </td>
                                <td></td>
                                <td>
                                    <?= rupiah($ak->kredit) ?>
                                </td>

                                <?php if ($pilihan[0] == 'menu') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkm/edit/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkm/hapus/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                <?php } elseif ($pilihan[0] == 'samping') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkm/edit/') . $ak->no_transaksi  ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkm/hapus/') . $ak->no_transaksi  ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>

                                <?php } ?>



                            </tr>
                        <?php } ?>

                    <?php endforeach; ?>
                    <?php
                    if ($pilihan[0] == 'menu') { ?>
                        <tr role="row" class="odd">
                            <td colspan="3" class="text-center">Jumlah</td>

                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as kas FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 111";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['kas']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as potongan_penjualan FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 413";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['potongan_penjualan']);
                                ?>
                            </td>
                            <td><?php
                                $qk = "SELECT SUM(kredit) as piutang_dagang FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 113";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['piutang_dagang']);
                                ?></td>
                            <td><?php
                                $qk = "SELECT SUM(kredit) as penjualan FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 411";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['penjualan']);
                                ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(kredit) as total FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun != 411 AND no_akun != 113 AND no_akun != 413 AND no_akun != 111";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['total']);
                                ?>
                            </td>
                            <td></td>
                        </tr>
                    <?php } else { ?>
                        <tr role="row" class="odd">
                            <td colspan="3" class="text-center">Jumlah</td>

                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as kas FROM jurnal_penerimaan_kas WHERE no_akun = 111";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['kas']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as potongan_penjualan FROM jurnal_penerimaan_kas WHERE no_akun = 413";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['potongan_penjualan']);
                                ?>
                            </td>
                            <td><?php
                                $qk = "SELECT SUM(kredit) as piutang_dagang FROM jurnal_penerimaan_kas WHERE no_akun = 113";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['piutang_dagang']);
                                ?></td>
                            <td><?php
                                $qk = "SELECT SUM(kredit) as penjualan FROM jurnal_penerimaan_kas WHERE no_akun = 411";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['penjualan']);
                                ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(kredit) as total FROM jurnal_penerimaan_kas WHERE no_akun != 411 AND no_akun != 113 AND no_akun != 413 AND no_akun != 111";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['total']);
                                ?>
                            </td>
                            <td></td>
                        </tr>
                    <?php } ?>



                </tbody>
            </table>


            <div class="col-md-12 col-sm-12" border="1">
                <!-- <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th rowspan="3">Tanggal</th>
                            <th>Keterangan</th>
                            <th>Ref</th>
                            <th>Kas</th>
                            <th>Pot Penjualan</th>
                            <th>Piutang Dagang</th>
                            <th>Penjualan</th>
                            <th>Akun</th>
                            <th>Ref</th>
                            <th rowspan="3">Jumlah</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr role="row">
                            <td class="table-plus sorting_1" tabindex="0">2</td>
                            <td>3</td>
                            <td>4</td>
                            <td></td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                        </tr>
                        <tr>
                            <td class="table-plus sorting_1" tabindex="0">2</td>
                            <td>3</td>
                            <td>4</td>
                            <td></td>
                            <td>5</td>
                            <td>6</td>
                            <td>7</td>
                            <td>8</td>
                            <td>9</td>
                        </tr>




                        <?php foreach ($jkm as $ak) : ?>
                            <tr role="row" class="odd">
                                <td class="table-plus sorting_1" tabindex="0">2</td>
                                <td>3</td>
                                <td>4</td>
                                <td></td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('jkm/lihat/') . $ak->id_jkm ?>"><i class="fa fa-eye"></i> Lihat</a>
                                            <a class="dropdown-item" href="<?= base_url('jkm/edit/') . $ak->id_jkm ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jkm/hapus/') . $ak->id_jkm ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                    </tbody>
                </table> -->
            </div>

        </div>
    </div>
</div>