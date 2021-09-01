<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>
        <?php
        if ($pilihan[0] == 'menu') { ?>
            <a class="btn btn-dark" href="<?= base_url('pilihan/menu/ada/' . $bulan_pilih[0] . '/' . $tahun_pilih[0]) ?>">Kembali</a>
        <?php } else {
        } ?>

        <?php
        if ($pilihan[0] == 'menu') { ?>
            <a href="<?= base_url('pilihan/kertas_kerja/cetak/' . $bulan_pilih[0] . '/' . $tahun_pilih[0]) ?>" target="_blank" class="btn btn-dark"><i class="fa fa-print"></i>Cetak</a>
        <?php } else { ?>
            <a href="<?= base_url('kertas_kerja/cetak') ?>" target="_blank" class="btn btn-dark"><i class="fa fa-print"></i>Cetak</a>
        <?php }

        ?>
        <!-- <a href="<?= base_url('kertas_kerja/cetak') ?>" type="button" class="btn btn-primary">Cancel</a> -->
        <div class="row">

            <br>
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Kertas Kerja</h5>

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
            <div class="table-responsive">

                <table class="display text-dark" style="width:100%" border="1" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead class="text-center">
                        <tr>
                            <th rowspan="2">No Akun</th>
                            <th rowspan="2">Nama Akun</th>
                            <th colspan="2">NERACA</th>
                            <th colspan="2">JURNAL PENYESUAIAN</th>
                            <th colspan="2">NSD</th>
                            <th colspan="2">LABA-RUGI</th>
                            <th colspan="2">NERACA</th>
                        </tr>
                        <tr>
                            <th>DEBET</th>
                            <th>KREDIT</th>
                            <th>DEBET</th>
                            <th>KREDIT</th>
                            <th>DEBET</th>
                            <th>KREDIT</th>
                            <th>DEBET</th>
                            <th>KREDIT</th>
                            <th>DEBET</th>
                            <th>KREDIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($akun as $ak) : ?>
                            <!-- Neraca -->
                            <tr>
                                <td><?= $ak->no_akun ?></td>
                                <td><?= $ak->nama_akun ?></td>

                                <?php
                                if ($pilihan[0] == 'menu') { ?>

                                    <?php
                                    $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun ";
                                    $g1 = $this->db->query($q1)->row_array();
                                    $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $a = $g1['debet'] + $g1['kredit'];

                                    $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND $ak->no_akun";
                                    $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    $g2 = $this->db->query($q2)->row_array();
                                    // perhitungan jumlah 
                                    $b = $g2['debet'] + $g2['kredit'];

                                    $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun";
                                    $g3 = $this->db->query($q3)->row_array();
                                    $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $c = $g3['debet'] + $g3['kredit'];

                                    $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun";
                                    $g4 = $this->db->query($q4)->row_array();
                                    $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $d = $g4['debet'] + $g4['kredit'];

                                    $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun";
                                    $g5 = $this->db->query($q5)->row_array();
                                    $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $e = $g5['debet'] + $g5['kredit'];


                                    // Data saldo bulan kemarin
                                    $s1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun";
                                    $sn1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    if ($sn1 > 0) {
                                        $sg1 = $this->db->query($s1)->row_array();
                                    } else {
                                        $sg1['debet'] = 0;
                                        $sg1['kredit'] = 0;
                                    }

                                    // perhitungan jumlah 
                                    $a = $sg1['debet'] + $sg1['kredit'];

                                    $s2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun";
                                    $sn2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah
                                    if ($sn2 > 0) {
                                        $sg2 = $this->db->query($s2)->row_array();
                                    } else {
                                        $sg2['debet'] = 0;
                                        $sg2['kredit'] = 0;
                                    }
                                    $b = $sg2['debet'] + $sg2['kredit'];

                                    $s3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $sn3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    if ($sn2 > 0) {
                                        $sg3 = $this->db->query($s3)->row_array();
                                    } else {
                                        $sg2['debet'] = 0;
                                        $sg2['kredit'] = 0;
                                    }
                                    $c = $sg3['debet'] + $sg3['kredit'];

                                    $s4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $sn4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    if ($sn4 > 0) {
                                        $sg4 = $this->db->query($s4)->row_array();
                                    } else {
                                        $sg4['debet'] = 0;
                                        $sg4['kredit'] = 0;
                                    }
                                    $d = $sg4['debet'] + $sg4['kredit'];

                                    $s5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $sn5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    if ($sn5 > 0) {
                                        $sg5 = $this->db->query($s5)->row_array();
                                    } else {
                                        $sg5['debet'] = 0;
                                        $sg5['kredit'] = 0;
                                    }
                                    $e = $sg5['debet'] + $sg5['kredit'];

                                    $s6 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE MONTH(tanggal) < $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
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
                                <?php } else { ?>
                                    <?php
                                    $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun ";
                                    $g1 = $this->db->query($q1)->row_array();
                                    $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $a = $g1['debet'] + $g1['kredit'];

                                    $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                                    $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    $g2 = $this->db->query($q2)->row_array();
                                    // perhitungan jumlah 
                                    $b = $g2['debet'] + $g2['kredit'];

                                    $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                                    $g3 = $this->db->query($q3)->row_array();
                                    $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $c = $g3['debet'] + $g3['kredit'];

                                    $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                                    $g4 = $this->db->query($q4)->row_array();
                                    $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $d = $g4['debet'] + $g4['kredit'];

                                    $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                                    $g5 = $this->db->query($q5)->row_array();
                                    $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $e = $g5['debet'] + $g5['kredit'];
                                    ?>
                                <?php } ?>


                                <?php if ($pilihan[0] == 'menu') { ?>
                                    <?php if (($debet_bulan_kemarin  + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($kredit_bulan_kemarin  + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php if (($debet_bulan_kemarin  + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td><?= rupiah1(($debet_bulan_kemarin  + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])  - ($kredit_bulan_kemarin  + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) ?></td>
                                            <td></td>
                                        <?php } elseif (($debet_bulan_kemarin  + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($kredit_bulan_kemarin  + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td></td>
                                            <td><?= rupiah1(($kredit_bulan_kemarin  + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($debet_bulan_kemarin  + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?></td>
                                        <?php } ?>
                                    <?php } elseif (($debet_bulan_kemarin  + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($kredit_bulan_kemarin  + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php if (($debet_bulan_kemarin  + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($kredit_bulan_kemarin  + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td><?= rupiah1(($debet_bulan_kemarin  + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($kredit_bulan_kemarin  + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) ?></td>
                                            <td></td>
                                        <?php } elseif (($debet_bulan_kemarin  + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($kredit_bulan_kemarin  + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td></td>
                                            <td><?= rupiah1(($kredit_bulan_kemarin  + $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($debet_bulan_kemarin  + $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?></td>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <td></td>
                                        <td></td>
                                    <?php } ?>


                                <?php } else { ?>
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td><?= rupiah1(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) ?></td>
                                            <td></td>
                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td></td>
                                            <td><?= rupiah1(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?></td>
                                        <?php } ?>
                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td><?= rupiah1(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) ?></td>
                                            <td></td>
                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td></td>
                                            <td><?= rupiah1(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?></td>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <td></td>
                                        <td></td>
                                    <?php } ?>

                                <?php } ?>

                                <!-- Jurnal Penyesuaian -->
                                <?php if ($pilihan[0] == 'menu') { ?>
                                    <?php
                                    $jps1 = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun ");
                                    $jpsr = $jps1->row();
                                    if ($jps1->num_rows() > 0) {
                                        if ($jpsr->debet > 0) { ?>
                                            <td>
                                                <?php if ($jpsr->debet > 0) {
                                                    echo rupiah1($jpsr->debet);
                                                } else {
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($jpsr->kredit > 0) {
                                                    echo rupiah1($jpsr->kredit);
                                                } else {
                                                } ?>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <?php if ($jpsr->debet > 0) {
                                                    echo rupiah1($jpsr->debet);
                                                } else {
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($jpsr->kredit > 0) {
                                                    echo rupiah1($jpsr->kredit);
                                                } else {
                                                } ?>
                                            </td>
                                        <?php }
                                    } else { ?>

                                        <td></td>
                                        <td></td>

                                    <?php
                                    }
                                    ?>
                                <?php } else { ?>
                                    <?php
                                    $jps1 = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun ");
                                    $jpsr = $jps1->row();
                                    if ($jps1->num_rows() > 0) {
                                        if ($jpsr->debet > 0) { ?>
                                            <td>
                                                <?php if ($jpsr->debet > 0) {
                                                    echo rupiah1($jpsr->debet);
                                                } else {
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($jpsr->kredit > 0) {
                                                    echo rupiah1($jpsr->kredit);
                                                } else {
                                                } ?>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <?php if ($jpsr->debet > 0) {
                                                    echo rupiah1($jpsr->debet);
                                                } else {
                                                } ?>
                                            </td>
                                            <td>
                                                <?php if ($jpsr->kredit > 0) {
                                                    echo rupiah1($jpsr->kredit);
                                                } else {
                                                } ?>
                                            </td>
                                        <?php }
                                    } else { ?>

                                        <td></td>
                                        <td></td>
                                    <?php
                                    }
                                    ?>
                                <?php } ?>






                                <!-- NSD -->

                                <?php
                                if ($pilihan[0] == 'menu') {
                                    $nsdebet = $debet_bulan_kemarin  +  $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'];
                                    $nsdkredit = $kredit_bulan_kemarin  +  $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'];
                                } else {
                                    $nsdebet = $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'];
                                    $nsdkredit =  $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'];
                                }
                                if (($nsdebet + $jpsr->debet) > ($nsdkredit + $jpsr->kredit)) { ?>
                                    <td><?= rupiah1(($nsdebet + $jpsr->debet) - ($nsdkredit + $jpsr->kredit)) ?></td>
                                    <td></td>

                                <?php } else { ?>
                                    <td></td>
                                    <td><?= rupiah1(($nsdkredit + $jpsr->kredit) - ($nsdebet + $jpsr->debet)); ?> </td>
                                <?php }  ?>




                                <!-- Laba rugi -->
                                <?php
                                if ($ak->no_akun < 411) { ?>
                                    <td></td>
                                    <td></td>
                                <?php } else { ?>
                                    <?php if (($nsdebet + $jpsr->debet) > ($nsdkredit + $jpsr->kredit)) { ?>
                                        <td><?= rupiah1(($nsdebet + $jpsr->debet) - ($nsdkredit + $jpsr->kredit)) ?></td>
                                        <td></td>

                                    <?php } else { ?>
                                        <td></td>
                                        <td><?= rupiah1(($nsdkredit + $jpsr->kredit) - ($nsdebet + $jpsr->debet)); ?> </td>
                                    <?php }  ?>
                                <?php } ?>



                                <!-- Neraca -->
                                <?php
                                if ($ak->no_akun > 399) { ?>
                                    <td></td>
                                    <td></td>
                                <?php } else { ?>
                                    <?php if (($nsdebet + $jpsr->debet) > ($nsdkredit + $jpsr->kredit)) { ?>
                                        <td><?= rupiah1(($nsdebet + $jpsr->debet) - ($nsdkredit + $jpsr->kredit)) ?></td>
                                        <td></td>

                                    <?php } else { ?>
                                        <td></td>
                                        <td><?= rupiah1(($nsdkredit + $jpsr->kredit) - ($nsdebet + $jpsr->debet)); ?> </td>
                                    <?php }  ?>
                                <?php } ?>
                            </tr>
                        <?php endforeach; ?>




















                        <!-- Total Bawah -->
                        <tr>
                            <td></td>
                            <td></td>
                            <!-- PILIHAN Total Neraca saldo RUMUS-->
                            <td>
                                <?php
                                if ($pilihan[0] == 'menu') { ?>
                                    <?php $total_debet = 0;
                                    foreach ($akun as $ak) : ?>
                                        <?php
                                        $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND   no_akun = $ak->no_akun ";
                                        $g1 = $this->db->query($q1)->row_array();
                                        $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $a = $g1['debet'] + $g1['kredit'];

                                        $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND   no_akun = $ak->no_akun";
                                        $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                        $g2 = $this->db->query($q2)->row_array();
                                        // perhitungan jumlah 
                                        $b = $g2['debet'] + $g2['kredit'];

                                        $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND   no_akun = $ak->no_akun";
                                        $g3 = $this->db->query($q3)->row_array();
                                        $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $c = $g3['debet'] + $g3['kredit'];

                                        $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND   no_akun = $ak->no_akun";
                                        $g4 = $this->db->query($q4)->row_array();
                                        $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $d = $g4['debet'] + $g4['kredit'];

                                        $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND   no_akun = $ak->no_akun";
                                        $g5 = $this->db->query($q5)->row_array();
                                        $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $e = $g5['debet'] + $g5['kredit'];
                                        ?>
                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                            $total_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']))  ?>

                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                        <?php } else {
                                        } ?>

                                    <?php endforeach;
                                    echo rupiah1($total_debet);
                                    ?>
                                    <!-- Total Neraca saldo RUMUS -->
                                <?php } else { ?>
                                    <?php $total_debet = 0;
                                    foreach ($akun as $ak) : ?>
                                        <?php
                                        $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun ";
                                        $g1 = $this->db->query($q1)->row_array();
                                        $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $a = $g1['debet'] + $g1['kredit'];

                                        $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                                        $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                        $g2 = $this->db->query($q2)->row_array();
                                        // perhitungan jumlah 
                                        $b = $g2['debet'] + $g2['kredit'];

                                        $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                                        $g3 = $this->db->query($q3)->row_array();
                                        $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $c = $g3['debet'] + $g3['kredit'];

                                        $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                                        $g4 = $this->db->query($q4)->row_array();
                                        $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $d = $g4['debet'] + $g4['kredit'];

                                        $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                                        $g5 = $this->db->query($q5)->row_array();
                                        $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $e = $g5['debet'] + $g5['kredit'];
                                        ?>
                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                            $total_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']))  ?>

                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                        <?php } else {
                                        } ?>

                                    <?php endforeach;
                                    echo rupiah1($total_debet);
                                    ?>
                                <?php } ?>


                            </td>
                            <td>

                                <?php
                                if ($pilihan[0] == 'menu') { ?>

                                    <?php $total_kredit = 0;
                                    foreach ($akun as $ak) : ?>
                                        <?php
                                        $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun ";
                                        $g1 = $this->db->query($q1)->row_array();
                                        $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $a = $g1['debet'] + $g1['kredit'];

                                        $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                        $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                        $g2 = $this->db->query($q2)->row_array();
                                        // perhitungan jumlah 
                                        $b = $g2['debet'] + $g2['kredit'];

                                        $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                        $g3 = $this->db->query($q3)->row_array();
                                        $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $c = $g3['debet'] + $g3['kredit'];

                                        $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                        $g4 = $this->db->query($q4)->row_array();
                                        $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $d = $g4['debet'] + $g4['kredit'];

                                        $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                        $g5 = $this->db->query($q5)->row_array();
                                        $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $e = $g5['debet'] + $g5['kredit'];
                                        ?>
                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                            $total_kredit += (($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?>
                                        <?php } else {
                                        } ?>

                                    <?php endforeach;
                                    echo rupiah1($total_kredit);
                                    ?>
                                    <!-- TOTAL NSD  -->
                                <?php } else { ?>
                                    <?php $total_kredit = 0;
                                    foreach ($akun as $ak) : ?>
                                        <?php
                                        $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun ";
                                        $g1 = $this->db->query($q1)->row_array();
                                        $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $a = $g1['debet'] + $g1['kredit'];

                                        $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                                        $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                        $g2 = $this->db->query($q2)->row_array();
                                        // perhitungan jumlah 
                                        $b = $g2['debet'] + $g2['kredit'];

                                        $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                                        $g3 = $this->db->query($q3)->row_array();
                                        $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $c = $g3['debet'] + $g3['kredit'];

                                        $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                                        $g4 = $this->db->query($q4)->row_array();
                                        $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $d = $g4['debet'] + $g4['kredit'];

                                        $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                                        $g5 = $this->db->query($q5)->row_array();
                                        $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $e = $g5['debet'] + $g5['kredit'];
                                        ?>
                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                            $total_kredit += (($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?>
                                        <?php } else {
                                        } ?>

                                    <?php endforeach;
                                    echo rupiah1($total_kredit);
                                    ?>


                                <?php } ?>



                            </td>


                            <!-- Total Jurnal Penyesuaian -->
                            <?php
                            if ($pilihan[0] == 'menu') { ?>
                                <?php
                                $jp1 = "SELECT SUM(debet) as debet_jps, SUM(kredit) as kredit_jps FROM jurnal_penyesuaian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] ";
                                $jpsg1 = $this->db->query($jp1)->row_array();

                                ?>
                            <?php } else { ?>
                                <?php
                                $jp1 = "SELECT SUM(debet) as debet_jps, SUM(kredit) as kredit_jps FROM jurnal_penyesuaian ";
                                $jpsg1 = $this->db->query($jp1)->row_array();

                                ?>
                            <?php } ?>

                            <td>
                                <?= rupiah1($jpsg1['debet_jps']) ?>
                            </td>
                            <td>
                                <?= rupiah1($jpsg1['kredit_jps']) ?>
                            </td>

                            <!-- PILIHAN Total NSD -->
                            <?php
                            if ($pilihan[0] == 'menu') { ?>
                                <?php
                                $nsdtotal_debet = 0;
                                $nsdtotal_kredit = 0;
                                foreach ($akun as $ak) :
                                    $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun ";
                                    $g1 = $this->db->query($q1)->row_array();
                                    $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah
                                    $a = $g1['debet'] + $g1['kredit'];

                                    $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    $g2 = $this->db->query($q2)->row_array();
                                    // perhitungan jumlah
                                    $b = $g2['debet'] + $g2['kredit'];

                                    $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $g3 = $this->db->query($q3)->row_array();
                                    $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah
                                    $c = $g3['debet'] + $g3['kredit'];

                                    $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $g4 = $this->db->query($q4)->row_array();
                                    $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah
                                    $d = $g4['debet'] + $g4['kredit'];

                                    $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $g5 = $this->db->query($q5)->row_array();
                                    $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah
                                    $e = $g5['debet'] + $g5['kredit'];

                                    $jps1 = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun ");
                                    $jpsr = $jps1->row();

                                    $nsddebet = $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'];
                                    $nsdkredit = $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'];

                                    $tndebet = $nsddebet + $jpsr->debet;
                                    $tnkredit = $nsdkredit + $jpsr->kredit;

                                    if ($tndebet  > $tnkredit) {
                                        $nsdtotal_debet += (($tndebet) - ($tnkredit));
                                    } else if ($tnkredit > $tndebet) {
                                        $nsdtotal_kredit += (($tnkredit) - ($tndebet));
                                    }

                                endforeach;
                                ?>
                            <?php } else { ?>
                                <?php
                                $nsdtotal_debet = 0;
                                $nsdtotal_kredit = 0;
                                foreach ($akun as $ak) :
                                    $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun ";
                                    $g1 = $this->db->query($q1)->row_array();
                                    $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah
                                    $a = $g1['debet'] + $g1['kredit'];

                                    $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                                    $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    $g2 = $this->db->query($q2)->row_array();
                                    // perhitungan jumlah
                                    $b = $g2['debet'] + $g2['kredit'];

                                    $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                                    $g3 = $this->db->query($q3)->row_array();
                                    $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah
                                    $c = $g3['debet'] + $g3['kredit'];

                                    $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                                    $g4 = $this->db->query($q4)->row_array();
                                    $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah
                                    $d = $g4['debet'] + $g4['kredit'];

                                    $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                                    $g5 = $this->db->query($q5)->row_array();
                                    $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah
                                    $e = $g5['debet'] + $g5['kredit'];

                                    $jps1 = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun ");
                                    $jpsr = $jps1->row();

                                    $nsddebet = $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'];
                                    $nsdkredit = $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'];

                                    $tndebet = $nsddebet + $jpsr->debet;
                                    $tnkredit = $nsdkredit + $jpsr->kredit;

                                    if ($tndebet  > $tnkredit) {
                                        $nsdtotal_debet += (($tndebet) - ($tnkredit));
                                    } else if ($tnkredit > $tndebet) {
                                        $nsdtotal_kredit += (($tnkredit) - ($tndebet));
                                    }

                                endforeach;
                                ?>
                            <?php } ?>

                            <td>
                                <!-- Jumlah debet =  -->
                                <?= rupiah1($nsdtotal_debet) ?>
                            </td>

                            <td>
                                <!-- jumlah kredit =  -->
                                <?= rupiah1($nsdtotal_kredit) ?>
                            </td>

                            <!-- PILIHAN Total Laba Rugi -->
                            <?php
                            if ($pilihan[0] == 'menu') { ?>
                                <?php
                                $latotal_debet = 0;
                                $latotal_kredit = 0;
                                $nrtotal_debet = 0;
                                $nrtotal_kredit = 0;
                                foreach ($akun as $ak) :
                                    $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun ";
                                    $g1 = $this->db->query($q1)->row_array();

                                    $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $g2 = $this->db->query($q2)->row_array();

                                    $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $g3 = $this->db->query($q3)->row_array();

                                    $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $g4 = $this->db->query($q4)->row_array();

                                    $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $g5 = $this->db->query($q5)->row_array();

                                    $jps1 = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun ");
                                    $jpsr = $jps1->row();

                                    $nsddebet = $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'];
                                    $nsdkredit = $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'];

                                    $tndebet = $nsddebet + $jpsr->debet;
                                    $tnkredit = $nsdkredit + $jpsr->kredit;

                                    if ($ak->no_akun > 399) {
                                        if ($tndebet  > $tnkredit) {
                                            $latotal_debet += (($tndebet) - ($tnkredit));
                                        } else if ($tnkredit > $tndebet) {
                                            $latotal_kredit += (($tnkredit) - ($tndebet));
                                        }
                                    } else {
                                        $latotal_debet += 0;
                                        $latotal_kredit += 0;
                                    }


                                    if ($ak->no_akun < 400) {
                                        if ($tndebet  > $tnkredit) {
                                            $nrtotal_debet += (($tndebet) - ($tnkredit));
                                        } else if ($tnkredit > $tndebet) {
                                            $nrtotal_kredit += (($tnkredit) - ($tndebet));
                                        }
                                    } else {
                                        $nrtotal_debet += 0;
                                        $nrtotal_kredit += 0;
                                    }


                                endforeach;
                                ?>
                            <?php } else { ?>
                                <?php
                                $latotal_debet = 0;
                                $latotal_kredit = 0;
                                $nrtotal_debet = 0;
                                $nrtotal_kredit = 0;
                                foreach ($akun as $ak) :
                                    $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun ";
                                    $g1 = $this->db->query($q1)->row_array();

                                    $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                                    $g2 = $this->db->query($q2)->row_array();

                                    $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                                    $g3 = $this->db->query($q3)->row_array();

                                    $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                                    $g4 = $this->db->query($q4)->row_array();

                                    $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                                    $g5 = $this->db->query($q5)->row_array();

                                    $jps1 = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun ");
                                    $jpsr = $jps1->row();

                                    $nsddebet = $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'];
                                    $nsdkredit = $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'];

                                    $tndebet = $nsddebet + $jpsr->debet;
                                    $tnkredit = $nsdkredit + $jpsr->kredit;

                                    if ($ak->no_akun > 399) {
                                        if ($tndebet  > $tnkredit) {
                                            $latotal_debet += (($tndebet) - ($tnkredit));
                                        } else if ($tnkredit > $tndebet) {
                                            $latotal_kredit += (($tnkredit) - ($tndebet));
                                        }
                                    } else {
                                        $latotal_debet += 0;
                                        $latotal_kredit += 0;
                                    }


                                    if ($ak->no_akun < 400) {
                                        if ($tndebet  > $tnkredit) {
                                            $nrtotal_debet += (($tndebet) - ($tnkredit));
                                        } else if ($tnkredit > $tndebet) {
                                            $nrtotal_kredit += (($tnkredit) - ($tndebet));
                                        }
                                    } else {
                                        $nrtotal_debet += 0;
                                        $nrtotal_kredit += 0;
                                    }


                                endforeach;
                                ?>
                            <?php } ?>

                            <!-- Laba rugi -->
                            <td> <?= rupiah1($latotal_debet) ?></td>
                            <td> <?= rupiah1($latotal_kredit) ?></td>

                            <!-- Neraca -->
                            <td> <?= rupiah1($nrtotal_debet) ?></td>
                            <td> <?= rupiah1($nrtotal_kredit) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <br>

            <!-- <table>
                <thead>
                    <tr>
                        <th>
                            <?= rupiah1($latotal_kredit - $latotal_debet) ?>
                        </th>
                    </tr>


                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?= rupiah1($latotal_kredit - $latotal_debet) ?>
                        </td>
                    </tr>
                </tbody>

            </table>
            <p>
                Selisih-nya : <?= rupiah1($latotal_kredit - $latotal_debet) ?>
            </p>
            <br>


            <p>
                Selisih-nya : <?= rupiah1($nrtotal_debet - $nrtotal_kredit) ?>
            </p>
            
            <div>
                Ini Debet :
                <?php
                $nsdtotal_debet = 0;
                // $nsdtotal_kredit = 0;
                foreach ($akun as $ak) :
                    $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun ";
                    $g1 = $this->db->query($q1)->row_array();
                    $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $a = $g1['debet'] + $g1['kredit'];

                    $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                    $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                    $g2 = $this->db->query($q2)->row_array();
                    // perhitungan jumlah
                    $b = $g2['debet'] + $g2['kredit'];

                    $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                    $g3 = $this->db->query($q3)->row_array();
                    $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $c = $g3['debet'] + $g3['kredit'];

                    $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                    $g4 = $this->db->query($q4)->row_array();
                    $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $d = $g4['debet'] + $g4['kredit'];

                    $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                    $g5 = $this->db->query($q5)->row_array();
                    $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $e = $g5['debet'] + $g5['kredit'];

                    $jps1 = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun ");
                    $jpsr = $jps1->row();

                    $nsddebet = $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'];
                    $nsdkredit = $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'];

                    $tndebet = $nsddebet + $jpsr->debet;
                    $tnkredit = $nsdkredit + $jpsr->kredit;

                    if ($tndebet  > $tnkredit) {
                        echo $nsdtotal_debet += (($tndebet) - ($tnkredit));
                    } else if ($tnkredit > $tndebet) {
                        // $nsdtotal_kredit += (($tnkredit) - ($tndebet));

                    }



                endforeach;

                ?>

            </div>
            <br>
            
            <div>
                ini Kredit :
                <?php
                // $nsdtotal_debet = 0;
                $nsdtotal_kredit = 0;
                foreach ($akun as $ak) :
                    $q1 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun ";
                    $g1 = $this->db->query($q1)->row_array();
                    $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $a = $g1['debet'] + $g1['kredit'];

                    $q2 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                    $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                    $g2 = $this->db->query($q2)->row_array();
                    // perhitungan jumlah
                    $b = $g2['debet'] + $g2['kredit'];

                    $q3 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                    $g3 = $this->db->query($q3)->row_array();
                    $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $c = $g3['debet'] + $g3['kredit'];

                    $q4 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                    $g4 = $this->db->query($q4)->row_array();
                    $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $d = $g4['debet'] + $g4['kredit'];

                    $q5 = "SELECT tanggal, COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                    $g5 = $this->db->query($q5)->row_array();
                    $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $e = $g5['debet'] + $g5['kredit'];

                    $jps1 = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun ");
                    $jpsr = $jps1->row();

                    $nsddebet = $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'];
                    $nsdkredit = $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'];

                    $tndebet = $nsddebet + $jpsr->debet;
                    $tnkredit = $nsdkredit + $jpsr->kredit;



                    if ($tnkredit > $tndebet) {
                        // echo (($tnkredit) - ($tndebet)) ;
                        echo $nsdtotal_kredit += (($tnkredit) - ($tndebet));
                    } else if ($tndebet  > $tnkredit) {
                    }


                endforeach;

                ?>
                <?= $nsdtotal_kredit ?>
-->



        </div>

    </div>
</div>
</div>