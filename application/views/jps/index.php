<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <?php
            if ($pilihan[0] == 'menu') { ?>
                <a class="btn btn-dark" href="<?= base_url('pilihan/menu/ada/' . $bulan_pilih[0] . '/' . $tahun_pilih[0]) ?>">Kembali</a>
            <?php } else {
            } ?>

            <div class="col-md-4">
                <?php
                if ($pilihan[0] == 'menu') { ?>
                    <a class="btn btn-primary" href="<?= base_url('pilihan/jps/tambah/' . $bulan_pilih[0] . '/' . $tahun_pilih[0]) ?>" role="button">Tambah Jurnal Penyesuaian</a>
                <?php } else { ?>
                    <a class="btn btn-primary" href="<?= base_url('jps/tambah') ?>" role="button">Tambah Jurnal Penyesuaian</a>
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
                        <th colspan="2">Akun</th>
                        <th>Ref</th>
                        <th>DEBET</th>
                        <th>KREDIT</th>
                        <th>Aksi</th>

                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($jps as $ak) : ?>

                        <tr>

                            <td class="table-plus sorting_1" tabindex="0">
                                <?php
                                if ($pilihan[0] == 'menu') { ?>

                                    <?= tanggal_pilih($ak->tanggal) ?>
                                <?php } else { ?>
                                    <?= tgl_bln_thn($ak->tanggal) ?>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                $qq = "SELECT  akun.nama_akun as nama_akun FROM jurnal_penyesuaian JOIN akun ON jurnal_penyesuaian.no_akun = akun.no_akun  WHERE jurnal_penyesuaian.no_transaksi = '$ak->no_transaksi' ";
                                $gg = $this->db->query($qq)->row_array();
                                echo $gg['nama_akun'];
                                ?>
                            </td>
                            <td></td>

                            <td></td>
                            <td><?= rupiah($ak->debet) ?></td>
                            <td></td>

                            <?php if ($pilihan[0] == 'menu') { ?>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('pilihan/jps/edit/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('pilihan/jps/hapus/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-trash"></i> Hapus</a>
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
                                            <a class="dropdown-item" href="<?= base_url('jps/edit/') . $ak->no_transaksi  ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('jps/hapus/') . $ak->no_transaksi  ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>

                            <?php } ?>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?php
                                $q2 = "SELECT  jurnal_penyesuaian.kredit, akun.nama_akun as nama_akun FROM jurnal_penyesuaian JOIN akun ON jurnal_penyesuaian.no_akun = akun.no_akun  WHERE jurnal_penyesuaian.no_transaksi = '$ak->no_transaksi' AND jurnal_penyesuaian.no_akun != $ak->no_akun";
                                $g2 = $this->db->query($q2)->row_array();

                                ?>
                                <?= $g2['nama_akun']; ?></td>
                            <td></td>


                            <td></td>
                            <td><?= rupiah($g2['kredit']) ?></td>
                            <td>

                            </td>
                        </tr>

                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <?php
                        if ($pilihan[0] == 'menu') { ?>
                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as total_debet, SUM(kredit) as total_kredit FROM jurnal_penyesuaian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] ";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['total_debet']);
                                ?>
                            </td>
                            <td>
                                <?php
                                echo rupiah($gk['total_kredit']);
                                ?>
                            </td>
                        <?php  } else { ?>
                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as total_debet, SUM(kredit) as total_kredit FROM jurnal_penyesuaian ";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['total_debet']);
                                ?>
                            </td>
                            <td>
                                <?php
                                echo rupiah($gk['total_kredit']);
                                ?>
                            </td>
                        <?php  }
                        ?>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <tfoot>

            </tfoot>

        </div>
    </div>
</div>