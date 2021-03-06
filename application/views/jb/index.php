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
                    <a class="btn btn-primary" href="<?= base_url('pilihan/jb/tambah/' . $bulan_pilih[0]  . '/' . $tahun_pilih[0]) ?>" role="button">Tambah jurnal_pembelian</a>
                <?php } else { ?>
                    <a class="btn btn-primary" href="<?= base_url('jurnal/jb/tambah') ?>" role="button">Tambah jurnal_pembelian</a>
                <?php } ?>

            </div>
            <br>
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Jurnal Pembelian Kas</h5>
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
                        if ($ak->no_akun == 511) { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
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
                                    $qk = "SELECT utang_dagang.nama_utang_dagang as nama_utang_dagang FROM jurnal_pembelian JOIN utang_dagang ON jurnal_pembelian.id_utang_dagang = utang_dagang.id_utang_dagang  WHERE jurnal_pembelian.no_transaksi = '$ak->no_transaksi' AND jurnal_pembelian.no_akun = 211";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo $gk['nama_utang_dagang'];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $qq = "SELECT utang_dagang.no_utang_dagang as no_utang_dagang FROM jurnal_pembelian JOIN utang_dagang ON jurnal_pembelian.id_utang_dagang = utang_dagang.id_utang_dagang  WHERE jurnal_pembelian.no_transaksi = '$ak->no_transaksi' AND jurnal_pembelian.no_akun = 211";
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
                                    $qk = "SELECT * FROM jurnal_pembelian WHERE no_transaksi = $ak->no_transaksi AND no_akun != 511";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo rupiah($gk['kredit']);
                                    ?>
                                </td>

                                <?php
                                if ($pilihan[0] == 'menu') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jb/edit/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jb/hapus/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                <?php } else { ?>
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
                                <?php } ?>

                            </tr>
                        <?php    } else { ?>
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
                                    <?= $ak->no_faktur ?>
                                </td>
                                <td>
                                    <?php
                                    $qkp1 = "SELECT utang_dagang.nama_utang_dagang as nama_utang_dagang, utang_dagang.no_utang_dagang as no_utang_dagang FROM jurnal_pembelian JOIN utang_dagang ON jurnal_pembelian.id_utang_dagang = utang_dagang.id_utang_dagang  WHERE jurnal_pembelian.no_transaksi = '$ak->no_transaksi' AND jurnal_pembelian.no_akun = 211";
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
                                    $qkp34 = "SELECT akun.nama_akun as nama_akun FROM jurnal_pembelian JOIN akun ON akun.no_akun = jurnal_pembelian.no_akun  WHERE jurnal_pembelian.no_transaksi = '$ak->no_transaksi'";
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
                                    $qk23 = "SELECT * FROM jurnal_pembelian WHERE no_transaksi = '$ak->no_transaksi' AND no_akun = 211";
                                    $gkh = $this->db->query($qk23)->row_array();
                                    echo rupiah($gkh['kredit']);
                                    ?>
                                </td>

                                <?php
                                if ($pilihan[0] == 'menu') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jb/edit/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jb/hapus/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                <?php } else { ?>
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
                                <?php } ?>
                            </tr>
                        <?php } ?>

                    <?php endforeach; ?>




                </tbody>
                <tfoot>
                    <?php
                    if ($pilihan[0] == 'menu') { ?>
                        <tr role="row" class="odd">
                            <td colspan="3" class="text-center">Jumlah</td>
                            <td></td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as pembelian FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 511";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['pembelian']);
                                ?>
                            </td>


                            <td></td>
                            <td></td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as total FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun != 511 AND no_akun != 211 ";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['total']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(kredit) as utang_dagang FROM jurnal_pembelian  WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 211";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['utang_dagang']);
                                ?>
                            </td>
                            <td></td>
                        </tr>

                    <?php } else { ?>
                        <tr role="row" class="odd">
                            <td colspan="3" class="text-center">Jumlah</td>
                            <td></td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as pembelian FROM jurnal_pembelian WHERE no_akun = 511";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['pembelian']);
                                ?>
                            </td>


                            <td></td>
                            <td></td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as total FROM jurnal_pembelian WHERE no_akun != 511 AND no_akun != 211 ";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['total']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(kredit) as utang_dagang FROM jurnal_pembelian WHERE no_akun = 211";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['utang_dagang']);
                                ?>
                            </td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tfoot>
            </table>

        </div>
    </div>
</div>