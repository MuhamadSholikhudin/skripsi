<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <?php
                if ($pilihan[0] == 'menu') { ?>
                    <a class="btn btn-primary" href="<?= base_url('pilihan/jj/tambah/' . $bulan_pilih[0] . '/' . $tahun_pilih[0]) ?>" role="button"> Tambah Jurnal Penjualan</a>
                <?php } else { ?>
                    <a class="btn btn-primary" href="<?= base_url('jurnal/jj/tambah') ?>" role="button">Tambah Jurnal Penjualan</a>
                <?php } ?>
                <!-- <a class="btn btn-primary" href="<?= base_url('jurnal/jj/tambah') ?>" role="button">Tambah jj</a> -->
            </div>
            <br>
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Jurnal Penjualan</h5>
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
                            <td>
                                <?php
                                if ($pilihan[0] == 'menu') { ?>

                                    <?= tanggal_pilih($ak->tanggal) ?>
                                <?php } else { ?>
                                    <?= tgl_bln_thn($ak->tanggal) ?>
                                <?php } ?>
                            </td>
                            <td><?= $ak->no_faktur ?></td>
                            <td>
                                <?php
                                $qq = "SELECT  piutang_dagang.no_piutang_dagang as no_piutang_dagang, piutang_dagang.nama_piutang_dagang as nama_piutang_dagang FROM jurnal_penjualan JOIN piutang_dagang ON jurnal_penjualan.id_piutang_dagang = piutang_dagang.id_piutang_dagang  WHERE jurnal_penjualan.no_transaksi = '$ak->no_transaksi' AND jurnal_penjualan.no_akun = 113";
                                $gg = $this->db->query($qq)->row_array();
                                echo $gg['nama_piutang_dagang'];
                                ?>
                            </td>
                            <td><?= $gg['no_piutang_dagang']; ?></td>
                            <td><?= rupiah($ak->kredit) ?></td>
                            <?php if ($pilihan[0] == 'menu') { ?>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('pilihan/jj/edit/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('pilihan/jj/hapus/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-trash"></i> Hapus</a>
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
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jj/edit/') . $ak->no_transaksi  ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jurnal/jj/hapus/') . $ak->no_transaksi  ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>

                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                <tfoot>


                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <?php
                            if ($pilihan[0] == 'menu') { ?>

                                <?php
                                $qk = "SELECT SUM(debet) as total FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 113";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['total']);
                                ?>
                            <?php } else { ?>
                                <?php
                                $qk = "SELECT SUM(debet) as total FROM jurnal_penjualan WHERE  no_akun = 113";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['total']);
                                ?>
                            <?php } ?>


                        </td>
                        <td></td>
                    </tr>
                </tfoot>
                </tbody>
            </table>

        </div>
    </div>
</div>