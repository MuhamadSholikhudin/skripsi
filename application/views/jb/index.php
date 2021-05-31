<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?= base_url('jurnal/jb/tambah') ?>" role="button">Tambah jb</a>
            </div>
            <br>
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Jurnal Pembelian Kas</h5>
                <h5>Periode <?= date('m-Y') ?> </h5>
            </div>

            <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead class="text-center">
                    <tr>
                        <th rowspan="3">Tanggal</th>
                        <th rowspan="3">No faktur</th>
                        <th rowspan="3">Keterangan</th>
                        <th rowspan="3">Ref</th>
                        <th colspan="4">Debet</th>
                        <th>Kredit</th>
                        <th rowspan="3">Aksi</th>

                    </tr>
                    <tr>
                        <th rowspan="2">Pembelian</th>
                        <th colspan="3">Akun Serba-serbi</th>
                        <th rowspan="2">Utang Dagang</th>


                    </tr>
                    <tr>
                        <th>Akun</th>
                        <th>Ref</th>
                        <th>Jumlah</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jb as $ak) : ?>
                        <?php
                        if ($ak->id_akun == 15) { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
                                    <a href="<?= base_url('jurnal/jb/edit/' . $ak->no_transaksi) ?>"><?= $ak->tanggal ?></a>
                                </td>
                                <td><?= $ak->no_faktur ?></td>
                                <td>
                                    <?php
                                    $qk = "SELECT utang_dagang.nama_utang_dagang as nama_utang_dagang FROM jb JOIN utang_dagang ON jb.id_utang_dagang = utang_dagang.id_utang_dagang  WHERE jb.no_transaksi = '$ak->no_transaksi' AND jb.id_akun = 8";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo $gk['nama_utang_dagang'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $qq = "SELECT utang_dagang.no_utang_dagang as no_utang_dagang FROM jb JOIN utang_dagang ON jb.id_utang_dagang = utang_dagang.id_utang_dagang  WHERE jb.no_transaksi = '$ak->no_transaksi' AND jb.id_akun = 8";
                                    $gg = $this->db->query($qq)->row_array();
                                    echo $gg['no_utang_dagang'];
                                    ?>
                                </td>
                                <td><?= rupiah($ak->debet) ?></td>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jb WHERE no_transaksi = $ak->no_transaksi AND id_akun != 15";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo rupiah($gk['kredit']);
                                    ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jb/edit/') . $ak->no_transaksi ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jb/hapus/') . $ak->no_transaksi ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php    } else { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
                                    <a href="<?= base_url('jurnal/jb/edit/' . $ak->no_transaksi) ?>"><?= $ak->tanggal ?></a>
                                </td>
                                <td>
                                    <?= $ak->no_faktur ?>
                                </td>
                                <td>
                                    <?php
                                    $qkp1 = "SELECT utang_dagang.nama_utang_dagang as nama_utang_dagang, utang_dagang.no_utang_dagang as no_utang_dagang FROM jb JOIN utang_dagang ON jb.id_utang_dagang = utang_dagang.id_utang_dagang  WHERE jb.no_transaksi = '$ak->no_transaksi' AND jb.id_akun = 8";
                                    $gkp1 = $this->db->query($qkp1)->row_array();
                                    echo $gkp1['nama_utang_dagang'];
                                    ?>
                                </td>
                                <td>
                                    <?= $gkp1['no_utang_dagang']; ?>
                                </td>

                                <td>

                                </td>
                                <td>
                                    <?php
                                    $qkp34 = "SELECT akun.nama_akun as nama_akun FROM jb JOIN akun ON akun.id_akun = jb.id_akun  WHERE jb.no_transaksi = '$ak->no_transaksi'";
                                    $gkp34 = $this->db->query($qkp34)->row_array();
                                    echo $gkp34['nama_akun'];
                                    ?>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <?= rupiah($ak->debet) ?>
                                </td>
                                <td>
                                    <?php
                                    $qk23 = "SELECT * FROM jb WHERE no_transaksi = '$ak->no_transaksi' AND id_akun = 8";
                                    $gkh = $this->db->query($qk23)->row_array();
                                    echo rupiah($gkh['kredit']);
                                    ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jb/edit/') . $ak->no_transaksi ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jb/hapus/') . $ak->no_transaksi ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php endforeach; ?>

                    <tr role="row" class="odd">
                        <td colspan="3" class="text-center">Jumlah</td>
                        <td></td>
                        <td>
                            <?php
                            $qk = "SELECT SUM(debet) as pembelian FROM jb WHERE id_akun = 15";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['pembelian']);
                            ?>
                        </td>


                        <td></td>
                        <td></td>
                        <td>
                            <?php
                            $qk = "SELECT SUM(debet) as total FROM jb WHERE id_akun != 15 AND id_akun != 8 ";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['total']);
                            ?>
                        </td>
                        <td>
                            <?php
                            $qk = "SELECT SUM(kredit) as utang_dagang FROM jb WHERE id_akun = 8";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['utang_dagang']);
                            ?>
                        </td>
                        <td></td>
                    </tr>
                </tbody>

            </table>

        </div>
    </div>
</div>