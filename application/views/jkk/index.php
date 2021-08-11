<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">

                <?php
                if ($pilihan[0] == 'menu') { ?>
                    <a class="btn btn-primary" href="<?= base_url('pilihan/jkk/tambah/' . $bulan_pilih[0] . '/' . $tahun_pilih[0]) ?>" role="button">Tambah Jurnal Pengeluaran Kas</a>
                <?php } else { ?>
                    <a class="btn btn-primary" href="<?= base_url('jurnal/jkk/tambah') ?>" role="button">Tambah Jurnal Pengeluaran Kas</a>
                <?php } ?>
            </div>
            <br>
            <div class="col-md-12 text-center">
                
                <h5>Toko Norkayati</h5>
                <h5>Jurnal Pengeluaran Kas</h5>
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
                        <th rowspan="3">Keterangan</th>
                        <th rowspan="3">Ref</th>
                        <th colspan="5">Debet</th>
                        <th colspan="2">Kredit</th>
                        <th rowspan="3">Aksi</th>

                    </tr>
                    <tr>
                        <th rowspan="2">Utang Dagang</th>
                        <th rowspan="2">Pembelian</th>
                        <th colspan="3">Serba-serbi</th>
                        <th rowspan="2">Kas</th>
                        <th rowspan="2">Pot Pembelian</th>

                    </tr>
                    <tr>
                        <th>Akun</th>
                        <th>Ref</th>
                        <th>Jumlah</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jkk as $ak) : ?>
                        <?php
                        if ($ak->no_akun == 211) { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
                                    <?php
                                    if ($pilihan[0] == 'menu') { ?>

                                        <?= tanggal_pilih($ak->tanggal) ?>
                                    <?php } else { ?>
                                        <?= $ak->tanggal ?>
                                    <?php } ?>
                                </td>
                                <td><?php
                                    $qk = "SELECT utang_dagang.nama_utang_dagang as nama_utang_dagang FROM jurnal_pengeluaran_kas JOIN utang_dagang ON jurnal_pengeluaran_kas.id_utang_dagang = utang_dagang.id_utang_dagang  WHERE jurnal_pengeluaran_kas.no_transaksi = '$ak->no_transaksi' AND jurnal_pengeluaran_kas.no_akun = 211";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo $gk['nama_utang_dagang'];
                                    ?></td>
                                <td>
                                    <?php
                                    $qq = "SELECT utang_dagang.no_utang_dagang as no_utang_dagang FROM jurnal_pengeluaran_kas JOIN utang_dagang ON jurnal_pengeluaran_kas.id_utang_dagang = utang_dagang.id_utang_dagang  WHERE jurnal_pengeluaran_kas.no_transaksi = '$ak->no_transaksi' AND jurnal_pengeluaran_kas.no_akun = 211";
                                    $gg = $this->db->query($qq)->row_array();
                                    echo $gg['no_utang_dagang'];
                                    ?>
                                </td>
                                <td>
                                    <?= rupiah($ak->debet) ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jurnal_pengeluaran_kas WHERE no_transaksi = $ak->no_transaksi AND no_akun != 211";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo rupiah($gk['kredit']);
                                    ?>
                                </td>
                                <td>

                                </td>
                                <?php if ($pilihan[0] == 'menu') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkk/edit/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkk/hapus/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-trash"></i> Hapus</a>
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
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkk/edit/') . $ak->no_transaksi  ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkk/hapus/') . $ak->no_transaksi  ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php    } elseif ($ak->no_akun == 511) { ?>
                            <tr>
                                <td class="table-plus sorting_1" tabindex="0">
                                    <?php
                                    if ($pilihan[0] == 'menu') { ?>

                                        <?= tanggal_pilih($ak->tanggal) ?>
                                    <?php } else { ?>
                                        <?= $ak->tanggal ?>
                                    <?php } ?>
                                </td>
                                <td>

                                </td>
                                <td></td>
                                <td>

                                </td>
                                <td>
                                    <?= rupiah($ak->debet) ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jurnal_pengeluaran_kas WHERE no_transaksi = $ak->no_transaksi AND no_akun = 111";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo rupiah($gk['kredit']);
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jurnal_pengeluaran_kas WHERE no_transaksi = '$ak->no_transaksi' AND no_akun = 513";
                                    $gk = $this->db->query($qk)->row_array();
                                    if ($gk['kredit'] > 0) {
                                        echo rupiah($gk['kredit']);
                                    } else {
                                    }

                                    ?>
                                </td>
                                <?php if ($pilihan[0] == 'menu') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkk/edit/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkk/hapus/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-trash"></i> Hapus</a>
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
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkk/edit/') . $ak->no_transaksi  ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkk/hapus/') . $ak->no_transaksi  ?>"><i class="fa fa-trash"></i> Hapus</a>
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
                                        <?= $ak->tanggal ?>
                                    <?php } ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                <td></td>
                                <td>
                                    <?php
                                    $qk = "SELECT akun.nama_akun as nama_akun FROM jurnal_pengeluaran_kas JOIN akun ON jurnal_pengeluaran_kas.no_akun = akun.no_akun WHERE jurnal_pengeluaran_kas.no_transaksi = $ak->no_transaksi AND jurnal_pengeluaran_kas.no_akun != 111";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo $gk['nama_akun'];
                                    ?>
                                </td>
                                <td></td>
                                <td>

                                    <?= rupiah($ak->debet) ?>
                                </td>
                                <td>
                                    <?php
                                    $qk = "SELECT * FROM jurnal_pengeluaran_kas WHERE no_transaksi = $ak->no_transaksi AND no_akun = 111";
                                    $gk = $this->db->query($qk)->row_array();
                                    echo rupiah($gk['kredit']);
                                    ?>
                                </td>
                                <td>

                                </td>
                                <?php if ($pilihan[0] == 'menu') { ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkk/edit/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('pilihan/jkk/hapus/') . $ak->no_transaksi . '/' . $bulan_pilih[0] ?>"><i class="fa fa-trash"></i> Hapus</a>
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
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkk/edit/') . $ak->no_transaksi  ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('jurnal/jkk/hapus/') . $ak->no_transaksi  ?>"><i class="fa fa-trash"></i> Hapus</a>
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
                                $q1 = "SELECT SUM(debet) as utang_dagang FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 211";
                                $g1 = $this->db->query($q1)->row_array();
                                echo rupiah($g1['utang_dagang']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as pembelian FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 511";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['pembelian']);
                                ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php
                                $q2 = "SELECT SUM(debet) as total FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun != 211 AND no_akun != 511 AND no_akun != 513 AND no_akun != 111";
                                $g2 = $this->db->query($q2)->row_array();
                                echo rupiah($g2['total']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $q3 = "SELECT SUM(kredit) as kas FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 111";
                                $g3 = $this->db->query($q3)->row_array();
                                echo rupiah($g3['kas']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $q4 = "SELECT SUM(kredit) as pot_pemb FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 513";
                                $g4 = $this->db->query($q4)->row_array();
                                echo rupiah($g4['pot_pemb']);
                                ?>
                            </td>
                            <td></td>
                        </tr>
                    <?php } else { ?>
                        <tr role="row" class="odd">
                            <td colspan="3" class="text-center">Jumlah</td>

                            <td>
                                <?php
                                $q1 = "SELECT SUM(debet) as utang_dagang FROM jurnal_pengeluaran_kas WHERE no_akun = 211";
                                $g1 = $this->db->query($q1)->row_array();
                                echo rupiah($g1['utang_dagang']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $qk = "SELECT SUM(debet) as pembelian FROM jurnal_pengeluaran_kas WHERE no_akun = 511";
                                $gk = $this->db->query($qk)->row_array();
                                echo rupiah($gk['pembelian']);
                                ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php
                                $q2 = "SELECT SUM(debet) as total FROM jurnal_pengeluaran_kas WHERE no_akun != 211 AND no_akun != 511 AND no_akun != 513 AND no_akun != 111";
                                $g2 = $this->db->query($q2)->row_array();
                                echo rupiah($g2['total']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $q3 = "SELECT SUM(kredit) as kas FROM jurnal_pengeluaran_kas WHERE no_akun = 111";
                                $g3 = $this->db->query($q3)->row_array();
                                echo rupiah($g3['kas']);
                                ?>
                            </td>
                            <td>
                                <?php
                                $q4 = "SELECT SUM(kredit) as pot_pemb FROM jurnal_pengeluaran_kas WHERE no_akun = 513";
                                $g4 = $this->db->query($q4)->row_array();
                                echo rupiah($g4['pot_pemb']);
                                ?>
                            </td>
                            <td></td>
                        </tr>
                    <?php } ?>


                </tbody>

            </table>

        </div>
    </div>
</div>