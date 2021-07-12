<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <?php
                if ($pilihan[0] == 'menu') { ?>
                    <a class="btn btn-primary" href="<?= base_url('pilihan/ju/tambah/' . $bulan_pilih[0] . '/' . $tahun_pilih[0]) ?>" role="button">Tambah Jurnal Umum</a>
                <?php } else { ?>
                    <a class="btn btn-primary" href="<?= base_url('jurnal/ju/tambah') ?>" role="button">Tambah Jurnal Umum</a>
                <?php } ?>
            </div>
            <br>
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Jurnal Umum</h5>

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

            <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead class="text-center">
                    <tr>
                        <th>Tanggal</th>
                        <th colspan="2">Keterangan</th>
                        <th>Ref</th>
                        <th>DEBET</th>
                        <th>KREDIT</th>
                        <th>Aksi</th>

                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($ju as $ak) : ?>
                        <?php if ($ak->no_akun == 211) { ?>
                            <tr>
                                <td>

                                    <?php
                                if ($pilihan[0] == 'menu') { ?>
                                    <?= tanggal_pilih($ak->tanggal) ?>
                                    <?php } else { ?>
                                        <?= $ak->tanggal ?>
                                        <?php } ?>
                                    </td>

                                <td>
                                    <?php
                                    $qq = "SELECT   akun.nama_akun as nama_akun FROM jurnal_umum JOIN akun ON jurnal_umum.no_akun = akun.no_akun  WHERE jurnal_umum.no_transaksi = '$ak->no_transaksi' AND jurnal_umum.no_akun = 211";
                                    $gg = $this->db->query($qq)->row_array();
                                    echo $gg['nama_akun'];
                                    ?>
                                </td>
                                <td></td>

                                <td></td>
                                <td><?= rupiah($ak->debet) ?></td>
                                <td></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('jurnal/ju/edit/') . $ak->no_transaksi ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jurnal/ju/hapus/') . $ak->no_transaksi ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><?php
                                    $q2 = "SELECT  jurnal_umum.kredit, akun.nama_akun as nama_akun FROM jurnal_umum JOIN akun ON jurnal_umum.no_akun = akun.no_akun  WHERE jurnal_umum.no_transaksi = '$ak->no_transaksi' AND jurnal_umum.no_akun != 211";
                                    $g2 = $this->db->query($q2)->row_array();

                                    ?>
                                    <?= $g2['nama_akun']; ?></td>
                                <td></td>


                                <td></td>
                                <td><?= rupiah($g2['kredit']) ?></td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td><?php
                                    $q5 = "SELECT  utang_dagang.nama_utang_dagang as nama_utang_dagang FROM jurnal_umum JOIN utang_dagang ON jurnal_umum.id_utang_dagang = utang_dagang.id_utang_dagang  WHERE jurnal_umum.no_transaksi = '$ak->no_transaksi' AND jurnal_umum.no_akun = 211";
                                    $g5 = $this->db->query($q5)->row_array();

                                    ?>
                                    <?= $g5['nama_utang_dagang']; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                            </tr>
                        <?php } elseif ($ak->no_akun == 412) { ?>
                            <tr>
                                <td>

                                    <?php
                                if ($pilihan[0] == 'menu') { ?>

<?= tanggal_pilih($ak->tanggal) ?>
<?php } else { ?>
    <?= $ak->tanggal ?>
    <?php } ?>
</td>
                                <td>
                                    <?php
                                    $qq = "SELECT   akun.nama_akun as nama_akun FROM jurnal_umum JOIN akun ON jurnal_umum.no_akun = akun.no_akun  WHERE jurnal_umum.no_transaksi = '$ak->no_transaksi' AND jurnal_umum.no_akun = 412";
                                    $gg = $this->db->query($qq)->row_array();
                                    echo $gg['nama_akun'];
                                    ?>
                                </td>
                                <td></td>

                                <td></td>
                                <td><?= rupiah($ak->debet) ?></td>
                                <td></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('jurnal/ju/edit/') . $ak->no_transaksi ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jurnal/ju/hapus/') . $ak->no_transaksi ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><?php
                                    $q2 = "SELECT  jurnal_umum.kredit, akun.nama_akun as nama_akun FROM jurnal_umum JOIN akun ON jurnal_umum.no_akun = akun.no_akun  WHERE jurnal_umum.no_transaksi = '$ak->no_transaksi' AND jurnal_umum.no_akun != 412";
                                    $g2 = $this->db->query($q2)->row_array();

                                    ?>
                                    <?= $g2['nama_akun']; ?></td>
                                <td></td>


                                <td></td>
                                <td><?= rupiah($g2['kredit']) ?></td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td><?php
                                    $q5 = "SELECT  piutang_dagang.nama_piutang_dagang as nama_piutang_dagang FROM jurnal_umum JOIN piutang_dagang ON jurnal_umum.id_piutang_dagang = piutang_dagang.id_piutang_dagang  WHERE jurnal_umum.no_transaksi = '$ak->no_transaksi' AND jurnal_umum.no_akun = 113";
                                    $g5 = $this->db->query($q5)->row_array();

                                    ?>
                                    <?= $g5['nama_piutang_dagang']; ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <?php
                                if ($pilihan[0] == 'menu') { ?>

                                    <?= tanggal_pilih($ak->tanggal) ?>
                                <?php } else { ?>
                                    <?= $ak->tanggal ?>
                                <?php } ?>

                                <td>
                                    <?php
                                    $qq = "SELECT  piutang_dagang.no_piutang_dagang as no_piutang_dagang, piutang_dagang.nama_piutang_dagang as nama_piutang_dagang FROM jurnal_umum JOIN piutang_dagang ON jurnal_umum.id_piutang_dagang = piutang_dagang.id_piutang_dagang  WHERE jurnal_umum.no_transaksi = '$ak->no_transaksi' AND jurnal_umum.no_akun = 113";
                                    $gg = $this->db->query($qq)->row_array();
                                    echo $gg['nama_piutang_dagang'];
                                    ?>
                                </td>
                                <td><?= rupiah($ak->debet) ?></td>
                                <td><?= $gg['no_piutang_dagang']; ?></td>
                                <td></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('jurnal/ju/edit/') . $ak->no_transaksi ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jurnal/ju/hapus/') . $ak->no_transaksi ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <?php
                            $qk = "SELECT SUM(debet) as total_debet, SUM(kredit) as total_kredit FROM jurnal_umum ";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['total_debet']);
                            ?>
                        </td>
                        <td>
                            <?php

                            echo rupiah($gk['total_kredit']);
                            ?>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>