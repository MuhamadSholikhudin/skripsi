<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>

        <div class="page-title">
            <!-- <div class="title_center">
                <h3>Selamat datang,

                </h3>
            </div> -->
        </div>

        <div class="clearfix"></div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Buku Besar</h5>
                <?php
                if ($pilihan[0] == 'menu') { ?>
                    <h5>Periode
                        <?php
                        if ($bulan_pilih[0] == 1) {
                            echo $bulan = "Januari";
                        } elseif ($bulan_pilih[0] == 2) {
                            echo $bulan = "Februari";
                        } elseif ($bulan_pilih[0] == 3) {
                            echo $bulan = "Maret";
                        } elseif ($bulan_pilih[0] == 4) {
                            echo $bulan = "April";
                        } elseif ($bulan_pilih[0] == 5) {
                            echo $bulan = "Mei";
                        } elseif ($bulan_pilih[0] == 6) {
                            echo $bulan = "Juni";
                        } elseif ($bulan_pilih[0] == 7) {
                            echo $bulan = "Juli";
                        } elseif ($bulan_pilih[0] == 8) {
                            echo $bulan = "Agustus";
                        } elseif ($bulan_pilih[0] == 9) {
                            echo $bulan = "September";
                        } elseif ($bulan_pilih[0] == 10) {
                            echo $bulan = "Oktober";
                        } elseif ($bulan_pilih[0] == 11) {
                            echo $bulan = "November";
                        } elseif ($bulan_pilih[0] == 12) {
                            echo $bulan = "Desember";
                        }
                        ?>
                        <?= $tahun_pilih[0] ?>
                    </h5>
                <?php } else { ?>

                <?php } ?>
            </div>


            <?php foreach ($akun as $ak) : ?>

                <div class="col-md-6 text-left">
                    <strong><?= $ak->nama_akun ?></strong>
                </div>
                <div class="col-md-6 text-right">
                    <strong> No : <?= $ak->no_akun ?> </strong>
                </div>
                <div class="col-sm-12">
                    <table class="display text-dark" style="width:100%" border="1" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">Tanggal</th>
                                <th class="text-center" rowspan="2">Keterangan</th>
                                <th class="text-center" rowspan="2">Ref</th>
                                <th class="text-center" rowspan="2">Debet</th>
                                <th class="text-center" rowspan="2">Kredit</th>
                                <th class="text-center" colspan="2">Saldo</th>
                            </tr>
                            <tr>
                                <th class="text-center">Debet</th>
                                <th class="text-center">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pilihan[0] == 'menu') { ?>
                                <?php
                                $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun";
                                $g1 = $this->db->query($q1)->row_array();
                                $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $a = $g1['debet'] + $g1['kredit'];

                                $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun";
                                $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                $g2 = $this->db->query($q2)->row_array();
                                // perhitungan jumlah 
                                $b = $g2['debet'] + $g2['kredit'];

                                $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                $g3 = $this->db->query($q3)->row_array();
                                $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $c = $g3['debet'] + $g3['kredit'];

                                $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                $g4 = $this->db->query($q4)->row_array();
                                $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $d = $g4['debet'] + $g4['kredit'];

                                $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                $g5 = $this->db->query($q5)->row_array();
                                $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $e = $g5['debet'] + $g5['kredit'];


                                // Data saldo bulam kemarin
                                $s1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun";
                                $sn1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                if ($sn1 > 0) {
                                    $sg1 = $this->db->query($s1)->row_array();
                                } else {
                                    $sg1['debet'] = 0;
                                    $sg1['kredit'] = 0;
                                }

                                // perhitungan jumlah 
                                $a = $sg1['debet'] + $sg1['kredit'];

                                $s2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun ORDER BY tanggal DESC ";
                                $sn2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah
                                if ($sn2 > 0) {
                                    $sg2 = $this->db->query($s2)->row_array();
                                } else {
                                    $sg2['debet'] = 0;
                                    $sg2['kredit'] = 0;
                                }
                                $b = $sg2['debet'] + $sg2['kredit'];

                                $s3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                $sn3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($sn2 > 0) {
                                    $sg3 = $this->db->query($s3)->row_array();
                                } else {
                                    $sg2['debet'] = 0;
                                    $sg2['kredit'] = 0;
                                }
                                $c = $sg3['debet'] + $sg3['kredit'];

                                $s4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                $sn4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($sn4 > 0) {
                                    $sg4 = $this->db->query($s4)->row_array();
                                } else {
                                    $sg4['debet'] = 0;
                                    $sg4['kredit'] = 0;
                                }
                                $d = $sg4['debet'] + $sg4['kredit'];

                                $s5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                $sn5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($sn5 > 0) {
                                    $sg5 = $this->db->query($s5)->row_array();
                                } else {
                                    $sg5['debet'] = 0;
                                    $sg5['kredit'] = 0;
                                }
                                $e = $sg5['debet'] + $sg5['kredit'];

                                $s6 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penyesuaian WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                $sn6 = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($sn6 > 0) {
                                    $sg6 = $this->db->query($s6)->row_array();
                                } else {
                                    $sg6['debet'] = 0;
                                    $sg6['kredit'] = 0;
                                }
                                $e = $sg5['debet'] + $sg5['kredit'];


                                $debet_bulan_kemarin = ($sg1['debet'] + $sg2['debet'] + $sg3['debet'] + $sg4['debet'] + $sg5['debet'] + $sg6['debet']);
                                $kredit_bulan_kemarin = ($sg1['kredit'] + $sg2['kredit'] + $sg3['kredit'] + $sg4['kredit'] + $sg5['kredit'] + $sg6['kredit']);
                                if (($sg1['debet'] + $sg2['debet'] + $sg3['debet'] + $sg4['debet'] + $sg5['debet'] + $sg6['debet']) > ($sg1['kredit'] + $sg2['kredit'] + $sg3['kredit'] + $sg4['kredit'] + $sg5['kredit'] + $sg6['kredit'])) {
                                    $saldo_bulan_kemarin = ($sg1['debet'] + $sg2['debet'] + $sg3['debet'] + $sg4['debet'] + $sg5['debet'] + $sg6['debet']) - ($sg1['kredit'] + $sg2['kredit'] + $sg3['kredit'] + $sg4['kredit'] + $sg5['kredit'] + $sg6['kredit']);
                                } elseif (($sg1['debet'] + $sg2['debet'] + $sg3['debet'] + $sg4['debet'] + $sg5['debet'] + $sg6['debet']) < ($sg1['kredit'] + $sg2['kredit'] + $sg3['kredit'] + $sg4['kredit'] + $sg5['kredit'] + $sg6['kredit'])) {

                                    $saldo_bulan_kemarin = (($sg1['kredit'] + $sg2['kredit'] + $sg3['kredit'] + $sg4['kredit'] + $sg5['kredit'] + $sg6['kredit']) - ($sg1['debet'] + $sg2['debet'] + $sg3['debet'] + $sg4['debet'] + $sg5['debet'] + $sg6['debet']));
                                }
                                ?>
                            <?php } elseif ($pilihan[0] == 'samping') { ?>
                                <?php
                                $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun ORDER BY tanggal DESC";
                                $g1 = $this->db->query($q1)->row_array();
                                $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $a = $g1['debet'] + $g1['kredit'];

                                $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun ORDER BY tanggal DESC";
                                $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                $g2 = $this->db->query($q2)->row_array();
                                // perhitungan jumlah 
                                $b = $g2['debet'] + $g2['kredit'];

                                $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun ORDER BY tanggal DESC";
                                $g3 = $this->db->query($q3)->row_array();
                                $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $c = $g3['debet'] + $g3['kredit'];

                                $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun ORDER BY tanggal DESC";
                                $g4 = $this->db->query($q4)->row_array();
                                $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $d = $g4['debet'] + $g4['kredit'];

                                $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE  no_akun = $ak->no_akun ORDER BY tanggal DESC";
                                $g5 = $this->db->query($q5)->row_array();
                                $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $e = $g5['debet'] + $g5['kredit'];
                                ?>
                            <?php } ?>

                            <?php
                            if ($pilihan[0] == 'menu') { ?>
                                <?php if (($sg1['debet'] + $sg2['debet'] + $sg3['debet'] + $sg4['debet'] + $sg5['debet'] + $sg6['debet']) > ($sg1['kredit'] + $sg2['kredit'] + $sg3['kredit'] + $sg4['kredit'] + $sg5['kredit'] + $sg6['kredit'])) { ?>
                                    <tr>
                                        <td>01 <?= $bulan ?></td>
                                        <td>Posting</td>
                                        <td>Saldo</td>
                                        <td><?= $saldo_bulan_kemarin ?> </td>
                                        <td> </td>
                                        <td><?= $saldo_bulan_kemarin ?></td>
                                        <td> </td>
                                    </tr>
                                <?php } elseif (($sg1['debet'] + $sg2['debet'] + $sg3['debet'] + $sg4['debet'] + $sg5['debet'] + $sg6['debet']) < ($sg1['kredit'] + $sg2['kredit'] + $sg3['kredit'] + $sg4['kredit'] + $sg5['kredit'] + $sg6['kredit'])) { ?>
                                    <tr>
                                        <td>01 <?= $bulan ?></td>
                                        <td>Posting</td>
                                        <td>Saldo</td>
                                        <td> </td>
                                        <td><?= $saldo_bulan_kemarin ?> </td>
                                        <td></td>
                                        <td><?= $saldo_bulan_kemarin ?> </td>
                                    </tr>
                                <?php } else { ?>

                                <?php } ?>

                                <!-- <tr>
                                <td></td>
                                <td>Saldo</td>
                                <td></td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td></td>
                                <td></td>
                            </tr> -->

                                <?php if ($g1['debet'] != $g1['kredit']) { ?>
                                    <tr>
                                        <td>30 <?= $bulan ?></td>
                                        <td>Posting</td>
                                        <td>Jurnal Pemasukan Kas</td>
                                        <td>
                                            <?= $g1['debet'] ?>
                                        </td>
                                        <td>
                                            <?= $g1['kredit'] ?>
                                        </td>

                                        <?php if ($debet_bulan_kemarin + $g1['debet']  > $kredit_bulan_kemarin + $g1['kredit']) {
                                            $a_debet = $g1['debet'];
                                            $a_kredit = $g1['kredit'];
                                        ?>
                                            <td><?= $debet_bulan_kemarin + $g1['debet'] -  $kredit_bulan_kemarin + $g1['kredit'] ?></td>
                                            <td></td>
                                        <?php } elseif ($debet_bulan_kemarin + $g1['debet'] < $kredit_bulan_kemarin + $g1['kredit']) {

                                        ?>
                                            <td></td>
                                            <td><?= $kredit_bulan_kemarin + $g1['kredit'] - $debet_bulan_kemarin + $g1['debet'] ?></td>
                                        <?php } ?>

                                    </tr>
                                <?php } else { ?>

                                <?php } ?>

                                <?php if ($g2['debet'] != $g2['kredit']) { ?>
                                    <tr>
                                        <td>30 <?= $bulan ?></td>
                                        <td>Posting</td>
                                        <td>Jurnal Pengeluaran Kas</td>
                                        <td>
                                            <?php
                                            echo $g2['debet'];
                                            ?>
                                        </td>
                                        <td>
                                            <?= $g2['kredit'] ?>
                                        </td>

                                        <?php if (($debet_bulan_kemarin + $g1['debet'] + $g2['debet']) > ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'])) { ?>
                                            <td><?= ($debet_bulan_kemarin + $g1['debet'] + $g2['debet']) - ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit']) ?></td>
                                            <td></td>

                                        <?php } elseif (($debet_bulan_kemarin + $g1['debet'] + $g2['debet']) < ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'])) { ?>
                                            <td></td>
                                            <td><?= ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit']) - ($debet_bulan_kemarin + $g1['debet'] + $g2['debet']) ?></td>
                                        <?php } ?>

                                    </tr>
                                <?php } else { ?>

                                <?php } ?>

                                <?php if ($g3['debet'] != $g3['kredit']) { ?>
                                    <tr>
                                        <td>30 <?= $bulan ?></td>
                                        <td>Posting</td>
                                        <td>Jurnal Pembelian</td>
                                        <td>
                                            <?php
                                            echo $g3['debet'];
                                            ?>
                                        </td>
                                        <td>
                                            <?= $g3['kredit'] ?>
                                        </td>

                                        <?php if (($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet']) > ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'] + $g3['kredit'])) { ?>
                                            <td><?= ($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet']) - ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'] + $g3['kredit']) ?></td>
                                            <td></td>

                                        <?php } elseif (($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'])) { ?>
                                            <td></td>
                                            <td><?= ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'] + $g3['kredit']) - ($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet']) ?></td>
                                        <?php } ?>

                                    </tr>
                                <?php } else { ?>

                                <?php } ?>

                                <?php if ($g4['debet'] != $g4['kredit']) { ?>
                                    <tr>
                                        <td>30 <?= $bulan ?></td>
                                        <td>Posting</td>
                                        <td>Jurnal Penjualan</td>
                                        <td>
                                            <?php
                                            echo $g4['debet'];
                                            ?>
                                        </td>
                                        <td>
                                            <?= $g4['kredit'] ?>
                                        </td>

                                        <?php if (($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet']) > ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'])) { ?>
                                            <td><?= ($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet']) - ($kredit_bulan_kemarin +  $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit']) ?></td>
                                            <td></td>

                                        <?php } elseif (($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet']) < ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'])) { ?>
                                            <td></td>
                                            <td><?= ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit']) - ($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet']) ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php } else { ?>

                                <?php } ?>

                                <?php if ($g5['debet'] != $g5['kredit']) { ?>
                                    <tr>
                                        <td>30 <?= $bulan ?></td>
                                        <td>Posting</td>
                                        <td>Jurnal Umum</td>
                                        <td>
                                            <?php
                                            echo $g5['debet'];
                                            ?>
                                        </td>
                                        <td>
                                            <?= $g5['kredit'] ?>
                                        </td>
                                        <?php if (($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td><?= ($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                            <td></td>

                                        <?php } elseif (($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td></td>
                                            <td><?= ($kredit_bulan_kemarin + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($debet_bulan_kemarin + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php } else { ?>

                                <?php } ?>


                            <?php } else { ?>

                                <?php if ($g1['debet'] != $g1['kredit']) { ?>
                                    <tr>
                                        <td><?= longdateum_indo(date('Y-m-d')) ?></td>
                                        <td>Posting</td>
                                        <td>Jurnal Penerimaan Kas</td>
                                        <td>
                                            <?= $g1['debet'] ?>
                                        </td>
                                        <td>
                                            <?= $g1['kredit'] ?>
                                        </td>

                                        <?php if ($g1['debet']  >  $g1['kredit']) {
                                            $a_debet = $g1['debet'];
                                            $a_kredit = $g1['kredit'];
                                        ?>
                                            <td><?= $g1['debet'] - $g1['kredit'] ?></td>
                                            <td></td>
                                        <?php } elseif ($g1['debet'] <  $g1['kredit']) {

                                        ?>
                                            <td></td>
                                            <td><?= $g1['kredit'] - $g1['debet'] ?></td>
                                        <?php } ?>

                                    </tr>
                                <?php } else { ?>

                                <?php } ?>

                                <?php if ($g2['debet'] != $g2['kredit']) { ?>
                                    <tr>
                                        <td><?= longdateum_indo(date('Y-m-d')) ?></td>
                                        <td>Posting</td>
                                        <td>Jurnal Pengeluaran Kas</td>
                                        <td>
                                            <?php
                                            echo $g2['debet'];
                                            ?>
                                        </td>
                                        <td>
                                            <?= $g2['kredit'] ?>
                                        </td>

                                        <?php if (($g1['debet'] + $g2['debet']) > ($g1['kredit'] + $g2['kredit'])) { ?>
                                            <td><?= ($g1['debet'] + $g2['debet']) - ($g1['kredit'] + $g2['kredit']) ?></td>
                                            <td></td>

                                        <?php } elseif (($g1['debet'] + $g2['debet']) < ($g1['kredit'] + $g2['kredit'])) { ?>
                                            <td></td>
                                            <td><?= ($g1['kredit'] + $g2['kredit']) - ($g1['debet'] + $g2['debet']) ?></td>
                                        <?php } ?>

                                    </tr>
                                <?php } else { ?>

                                <?php } ?>

                                <?php if ($g3['debet'] != $g3['kredit']) { ?>
                                    <tr>
                                        <td><?= longdateum_indo(date('Y-m-d')) ?></td>
                                        <td>Posting</td>
                                        <td>Jurnal Pembelian</td>
                                        <td>
                                            <?php
                                            echo $g3['debet'];
                                            ?>
                                        </td>
                                        <td>
                                            <?= $g3['kredit'] ?>
                                        </td>

                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'])) { ?>
                                            <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit']) ?></td>
                                            <td></td>

                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'])) { ?>
                                            <td></td>
                                            <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet']) ?></td>
                                        <?php } ?>

                                    </tr>
                                <?php } else { ?>

                                <?php } ?>

                                <?php if ($g4['debet'] != $g4['kredit']) { ?>
                                    <tr>
                                        <td><?= longdateum_indo(date('Y-m-d')) ?></td>
                                        <td>Posting</td>
                                        <td>Jurnal Penjualan</td>
                                        <td>
                                            <?php
                                            echo $g4['debet'];
                                            ?>
                                        </td>
                                        <td>
                                            <?= $g4['kredit'] ?>
                                        </td>

                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'])) { ?>
                                            <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit']) ?></td>
                                            <td></td>

                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'])) { ?>
                                            <td></td>
                                            <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet']) ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php } else { ?>

                                <?php } ?>

                                <?php if ($g5['debet'] != $g5['kredit']) { ?>
                                    <tr>
                                        <td><?= longdateum_indo(date('Y-m-d')) ?></td>
                                        <td>Posting</td>
                                        <td>Jurnal Umum</td>
                                        <td>
                                            <?php
                                            echo $g5['debet'];
                                            ?>
                                        </td>
                                        <td>
                                            <?= $g5['kredit'] ?>
                                        </td>
                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                            <td></td>

                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td></td>
                                            <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php } else { ?>

                                <?php } ?>

                            <?php } ?>




                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 ">
                    <p>&nbsp;</p>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>