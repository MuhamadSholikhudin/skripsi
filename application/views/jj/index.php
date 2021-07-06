<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?= base_url('jurnal/jj/tambah') ?>" role="button">Tambah jj</a>
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
                        <th>Tanggal</th>
                        <th>No faktur</th>
                        <th>Keterangan</th>
                        <th>Ref</th>
                        <th>Piutang Dagang (D) </br> Penjualan (K)</th>

                        <th>Aksi</th>

                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($jj as $ak) : ?>
                        <tr>
                            <td><?= $ak->tanggal ?></td>
                            <td><?= $ak->no_faktur ?></td>
                            <td>
                                <?php
                                $qq = "SELECT  piutang_dagang.no_piutang_dagang as no_piutang_dagang, piutang_dagang.nama_piutang_dagang as nama_piutang_dagang FROM jj JOIN piutang_dagang ON jj.id_piutang_dagang = piutang_dagang.id_piutang_dagang  WHERE jj.no_transaksi = '$ak->no_transaksi' AND jj.no_akun = 113";
                                $gg = $this->db->query($qq)->row_array();
                                echo $gg['nama_piutang_dagang'];
                                ?>
                            </td>
                            <td><?= $gg['no_piutang_dagang']; ?></td>
                            <td><?= rupiah($ak->kredit) ?></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="<?= base_url('jurnal/jj/edit/') . $ak->no_transaksi ?>"><i class="fa fa-edit"></i> Ubah</a>
                                        <a class="dropdown-item" href="<?= base_url('jurnal/jj/hapus/') . $ak->no_transaksi ?>"><i class="fa fa-trash"></i> Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <?php
                            $qk = "SELECT SUM(debet) as total FROM jj WHERE  no_akun = 113";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['total']);
                            ?>
                            </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>