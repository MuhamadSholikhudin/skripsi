<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?= base_url('jurnal/jkm/tambah') ?>" role="button">Tambah jkm</a>
            </div>
            <!-- <div class="col-md-12">
                <h3>Data jkm</h3>
            </div> -->

            <br>
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Jurnal Penerimaan Kas</h5>
                <h5>Periode <?= date('m-Y') ?> </h5>
            </div>

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
                        if ($ak->id_akun == 12) { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
                                    <a href="<?= base_url('jurnal/jkm/edit/' . $ak->no_transaksi) ?>"><?= $ak->tanggal ?></a>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jkm WHERE no_transaksi = $ak->no_transaksi AND id_akun != 12";
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
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jkm/edit/') . $ak->no_transaksi ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jkm/hapus/') . $ak->no_transaksi ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php    } elseif ($ak->id_akun == 3) { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
                                    <a href="<?= base_url('jurnal/jkm/edit/' . $ak->no_transaksi) ?>"><?= $ak->tanggal ?></a>
                                </td>
                                <td><?php
                                    $qk = "SELECT piutang_dagang.nama_piutang_dagang as nama_piutang_dagang FROM jkm JOIN piutang_dagang ON jkm.id_piutang_dagang = piutang_dagang.id_piutang_dagang  WHERE jkm.no_transaksi = '$ak->no_transaksi' AND jkm.id_akun = 3";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo $gk['nama_piutang_dagang'];
                                    ?></td>
                                <td><?php
                                    $qq = "SELECT piutang_dagang.no_piutang_dagang as no_piutang_dagang FROM jkm JOIN piutang_dagang ON jkm.id_piutang_dagang = piutang_dagang.id_piutang_dagang  WHERE jkm.no_transaksi = '$ak->no_transaksi' AND jkm.id_akun = 3";
                                    $gg = $this->db->query($qq)->row_array();
                                    echo $gg['no_piutang_dagang'];
                                    ?></td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jkm WHERE no_transaksi = '$ak->no_transaksi' AND id_akun = 1";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo rupiah($gk['debet']);
                                    ?>
                                </td>
                                <td><?php
                                    $qk = "SELECT * FROM jkm WHERE no_transaksi = '$ak->no_transaksi' AND id_akun = 14";
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
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jkm/edit/') . $ak->no_transaksi ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jkm/hapus/') . $ak->no_transaksi ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        <?php } else { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
                                    <a href="<?= base_url('jurnal/jkm/edit/' . $ak->no_transaksi) ?>"><?= $ak->tanggal ?></a>
                                </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jkm WHERE no_transaksi = $ak->no_transaksi AND id_akun = 1";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo rupiah($gk['debet']);
                                    ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

                                    <?php
                                    $qk = "SELECT akun.nama_akun as nama_akun FROM jkm JOIN akun ON jkm.id_akun = akun.id_akun WHERE jkm.no_transaksi = $ak->no_transaksi AND jkm.id_akun != 1";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo $gk['nama_akun'];
                                    ?>
                                </td>
                                <td></td>
                                <td>
                                    <?= rupiah($ak->kredit) ?>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jkm/edit/') . $ak->no_transaksi ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jkm/hapus/') . $ak->no_transaksi ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php endforeach; ?>

                    <tr role="row" class="odd">
                        <td colspan="3" class="text-center">Jumlah</td>

                        <td>
                            <?php
                            $qk = "SELECT SUM(debet) as kas FROM jkm WHERE id_akun = 1";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['kas']);
                            ?>
                        </td>
                        <td>
                            <?php
                            $qk = "SELECT SUM(debet) as potongan_penjualan FROM jkm WHERE id_akun = 14";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['potongan_penjualan']);
                            ?>
                        </td>
                        <td><?php
                            $qk = "SELECT SUM(kredit) as piutang_dagang FROM jkm WHERE id_akun = 3";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['piutang_dagang']);
                            ?></td>
                        <td><?php
                            $qk = "SELECT SUM(kredit) as penjualan FROM jkm WHERE id_akun = 12";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['penjualan']);
                            ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td>
                            <?php
                            $qk = "SELECT SUM(kredit) as total FROM jkm WHERE id_akun != 12 AND id_akun != 3 AND id_akun != 14 AND id_akun != 1";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['total']);
                            ?>
                        </td>
                        <td></td>
                    </tr>
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