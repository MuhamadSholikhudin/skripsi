<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?= base_url('jurnal/ju/tambah') ?>" role="button">Tambah ju</a>
            </div>
            <br>
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Jurnal Umum</h5>
                <h5>Periode <?= date('m-Y') ?> </h5>
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
                        <?php if ($ak->id_akun == 8) { ?>
                            <tr>
                                <td><?= $ak->tanggal ?></td>
                                <td>
                                    <?php
                                    $qq = "SELECT   akun.nama_akun as nama_akun FROM ju JOIN akun ON ju.id_akun = akun.id_akun  WHERE ju.no_transaksi = '$ak->no_transaksi' AND ju.id_akun = 8";
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
                                    $q2 = "SELECT  ju.kredit, akun.nama_akun as nama_akun FROM ju JOIN akun ON ju.id_akun = akun.id_akun  WHERE ju.no_transaksi = '$ak->no_transaksi' AND ju.id_akun != 8";
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
                                    $q5 = "SELECT  utang_dagang.nama_utang_dagang as nama_utang_dagang FROM ju JOIN utang_dagang ON ju.id_utang_dagang = utang_dagang.id_utang_dagang  WHERE ju.no_transaksi = '$ak->no_transaksi' AND ju.id_akun = 8";
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
                        <?php } elseif ($ak->id_akun == 13) { ?>
                            <tr>
                                <td><?= $ak->tanggal ?></td>
                                <td>
                                    <?php
                                    $qq = "SELECT   akun.nama_akun as nama_akun FROM ju JOIN akun ON ju.id_akun = akun.id_akun  WHERE ju.no_transaksi = '$ak->no_transaksi' AND ju.id_akun = 13";
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
                                    $q2 = "SELECT  ju.kredit, akun.nama_akun as nama_akun FROM ju JOIN akun ON ju.id_akun = akun.id_akun  WHERE ju.no_transaksi = '$ak->no_transaksi' AND ju.id_akun != 13";
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
                                    $q5 = "SELECT  piutang_dagang.nama_piutang_dagang as nama_piutang_dagang FROM ju JOIN piutang_dagang ON ju.id_piutang_dagang = piutang_dagang.id_piutang_dagang  WHERE ju.no_transaksi = '$ak->no_transaksi' AND ju.id_akun = 3";
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
                                <td><?= $ak->tanggal ?></td>
                                <td>
                                    <?php
                                    $qq = "SELECT  piutang_dagang.no_piutang_dagang as no_piutang_dagang, piutang_dagang.nama_piutang_dagang as nama_piutang_dagang FROM ju JOIN piutang_dagang ON ju.id_piutang_dagang = piutang_dagang.id_piutang_dagang  WHERE ju.no_transaksi = '$ak->no_transaksi' AND ju.id_akun = 3";
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
                            $qk = "SELECT SUM(debet) as total_debet, SUM(kredit) as total_kredit FROM ju ";
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