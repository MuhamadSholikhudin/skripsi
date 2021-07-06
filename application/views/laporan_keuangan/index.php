<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>

        <div class="page-title">
            <div class="title_center">
                <h3>Selamat datang, </h3>

            </div>

        </div>

        <div class="clearfix"></div>
        <br>
        <br>
        <div class="row">

            <div class="col-sm-12">
                <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead class="text-center">
                        <tr>
                            <th colspan="5">Toko Norkayati</th>
                        </tr>
                        <tr>
                            <th colspan="5">LAPORAN LABA RUGI</th>
                        </tr>
                        <tr>
                            <th colspan="5">PERIODE <?= date('Y') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $penjualan = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '4%'")->result();
                        ?>
                        <?php
                        $penber_debet = 0;
                        $penber_kredit = 0;
                        foreach ($penjualan as $jual) : ?>
                            <?php
                            $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkm WHERE no_akun = $jual->no_akun ";
                            $g1 = $this->db->query($q1)->row_array();
                            $n1 = $this->db->query("SELECT * FROM jkm WHERE no_akun = $jual->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $a = $g1['debet'] + $g1['kredit'];

                            $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkk WHERE no_akun = $jual->no_akun";
                            $n2 = $this->db->query("SELECT * FROM jkk WHERE no_akun = $jual->no_akun")->num_rows();
                            $g2 = $this->db->query($q2)->row_array();
                            // perhitungan jumlah 
                            $b = $g2['debet'] + $g2['kredit'];

                            $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jb WHERE no_akun = $jual->no_akun";
                            $g3 = $this->db->query($q3)->row_array();
                            $n3 = $this->db->query("SELECT * FROM jb WHERE no_akun = $jual->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $c = $g3['debet'] + $g3['kredit'];

                            $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jj WHERE no_akun = $jual->no_akun";
                            $g4 = $this->db->query($q4)->row_array();
                            $n4 = $this->db->query("SELECT * FROM jj WHERE no_akun = $jual->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $d = $g4['debet'] + $g4['kredit'];

                            $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM ju WHERE no_akun = $jual->no_akun";
                            $g5 = $this->db->query($q5)->row_array();
                            $n5 = $this->db->query("SELECT * FROM ju WHERE no_akun = $jual->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $e = $g5['debet'] + $g5['kredit'];

                            ?>

                            <tr>
                                <td><?= $jual->nama_akun ?></td>

                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                        <td></td>
                                        <td></td>


                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                        <td></td>
                                        <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                        <td></td>

                                    <?php } ?>

                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    `
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                        <td></td>
                                        <td></td>


                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <td></td>
                                        <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                        <td></td>
                                        </td>
                                        </td>

                                    <?php } ?>

                                <?php } else { ?>


                                <?php } ?>


                                <td></td>
                            </tr>

                            <?php
                            if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                $penber_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']));
                            } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                $penber_kredit +=   ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']);
                            }
                            ?>
                        <?php endforeach; ?>
                        <tr class="text-danger">
                            <td>PENJUALAN BERSIH</td>
                            <td></td>
                            <td></td>
                            <td><?= $penjualan_bersih = ($penber_kredit - $penber_debet) ?></td>
                            <td></td>
                        </tr>
                        <?php
                        $persediaan = $this->db->query("SELECT * FROM akun WHERE no_akun = 114")->result();
                        ?>
                        <?php foreach ($persediaan as $sedia) : ?>
                            <tr>
                                <?php $perawal = $this->db->query("SELECT * FROM jps WHERE no_akun = 114 AND kredit != 0")->row(); ?>
                                <td><?= $sedia->nama_akun ?> </td>
                                <td></td>
                                <td><?= $perawal->kredit ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php
                        $pembelian = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '5%' AND no_akun != 514")->result();
                        ?>
                        <?php
                        $beli_debet = 0;
                        $beli_kredit = 0;
                        foreach ($pembelian as $beli) : ?>

                            <?php
                            $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkm WHERE no_akun = $beli->no_akun ";
                            $g1 = $this->db->query($q1)->row_array();
                            $n1 = $this->db->query("SELECT * FROM jkm WHERE no_akun = $beli->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $a = $g1['debet'] + $g1['kredit'];

                            $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkk WHERE no_akun = $beli->no_akun";
                            $n2 = $this->db->query("SELECT * FROM jkk WHERE no_akun = $beli->no_akun")->num_rows();
                            $g2 = $this->db->query($q2)->row_array();
                            // perhitungan jumlah 
                            $b = $g2['debet'] + $g2['kredit'];

                            $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jb WHERE no_akun = $beli->no_akun";
                            $g3 = $this->db->query($q3)->row_array();
                            $n3 = $this->db->query("SELECT * FROM jb WHERE no_akun = $beli->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $c = $g3['debet'] + $g3['kredit'];

                            $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jj WHERE no_akun = $beli->no_akun";
                            $g4 = $this->db->query($q4)->row_array();
                            $n4 = $this->db->query("SELECT * FROM jj WHERE no_akun = $beli->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $d = $g4['debet'] + $g4['kredit'];

                            $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM ju WHERE no_akun = $beli->no_akun";
                            $g5 = $this->db->query($q5)->row_array();
                            $n5 = $this->db->query("SELECT * FROM ju WHERE no_akun = $beli->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $e = $g5['debet'] + $g5['kredit'];

                            ?>
                            <tr>
                                <td><?= $beli->nama_akun ?></td>
                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                        <td></td>
                                        <td></td>


                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                        <td></td>
                                        <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                        <td></td>

                                    <?php } ?>

                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    `
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                        <td></td>
                                        <td></td>


                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <td></td>
                                        <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                        <td></td>
                                        </td>
                                        </td>

                                    <?php } ?>

                                <?php } else { ?>

                                    <td></td>
                                    <td></td>
                                    <td></td>

                                <?php } ?>
                                <td></td>
                            </tr>
                            <?php
                            if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                $beli_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']));
                            } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                $beli_kredit +=   ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']);
                            }
                            ?>
                        <?php endforeach; ?>
                        <tr class="text-danger">
                            <td>PEMBELIAN BERSIH</td>
                            <td></td>
                            <td></td>
                            <td><?= $pembelian_bersih = ($beli_debet - $beli_kredit) ?></td>
                            <td></td>
                        </tr>
                        <tr class="text-danger">
                            <?php $perawal = $this->db->query("SELECT * FROM jps WHERE no_akun = 114 AND kredit != 0")->row(); ?>

                            <td>BARANG TERSEDIA UNTUK DI JUAL</td>
                            <td></td>
                            <td></td>
                            <td><?= $btud = ($pembelian_bersih + $perawal->kredit) ?></td>
                            <td></td>
                        </tr>
                        <!-- <?php foreach ($persediaan as $sedia) : ?>
                            <tr>
                                <td><?= $sedia->nama_akun ?></td>
                                <td>Jumlah 1</td>
                                <td>Jumlah 2</td>
                                <td>Jumlah 3</td>
                                <td>Jumlah 3</td>
                            </tr>
                        <?php endforeach; ?> -->
                        <tr class="text-danger">
                            <?php $perakhir = $this->db->query("SELECT * FROM jps WHERE no_akun = 114 AND debet != 0")->row(); ?>
                            <td>HARGA POKOK PENJUALAN</td>
                            <td></td>
                            <td></td>
                            <td><?= $hpp = ($btud - $perakhir->debet) ?></td>
                            <td></td>
                        </tr>
                        <tr class="text-danger">
                            <td>LABA KOTOR</td>
                            <td></td>
                            <td></td>
                            <td><?= $laba_kotor = ($penjualan_bersih - $hpp) ?></td>
                            <td></td>
                        </tr>
                        <?php
                        $beban = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '6%'")->result();
                        ?>



                        <?php
                        $beb_debet = 0;
                        $beb_kredit = 0;
                        foreach ($beban as $beb) : ?>
                            <?php
                            $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkm WHERE no_akun = $beb->no_akun ";
                            $g1 = $this->db->query($q1)->row_array();
                            $n1 = $this->db->query("SELECT * FROM jkm WHERE no_akun = $beb->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $a = $g1['debet'] + $g1['kredit'];

                            $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkk WHERE no_akun = $beb->no_akun";
                            $n2 = $this->db->query("SELECT * FROM jkk WHERE no_akun = $beb->no_akun")->num_rows();
                            $g2 = $this->db->query($q2)->row_array();
                            // perhitungan jumlah 
                            $b = $g2['debet'] + $g2['kredit'];

                            $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jb WHERE no_akun = $beb->no_akun";
                            $g3 = $this->db->query($q3)->row_array();
                            $n3 = $this->db->query("SELECT * FROM jb WHERE no_akun = $beb->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $c = $g3['debet'] + $g3['kredit'];

                            $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jj WHERE no_akun = $beb->no_akun";
                            $g4 = $this->db->query($q4)->row_array();
                            $n4 = $this->db->query("SELECT * FROM jj WHERE no_akun = $beb->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $d = $g4['debet'] + $g4['kredit'];

                            $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM ju WHERE no_akun = $beb->no_akun";
                            $g5 = $this->db->query($q5)->row_array();
                            $n5 = $this->db->query("SELECT * FROM ju WHERE no_akun = $beb->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $e = $g5['debet'] + $g5['kredit'];
                            $jps1 = $this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit FROM jps WHERE no_akun = $beb->no_akun ");
                            $jpsr = $jps1->row();
                            ?>

                            <tr>
                                <td><?= $beb->nama_akun ?></td>

                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php $beb_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])); ?>
                                        <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                        <td></td>
                                        <td></td>



                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php $beb_kredit += ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']); ?>
                                        <td></td>
                                        <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                        <td></td>

                                    <?php } ?>

                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    `
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php $beb_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])); ?>
                                        <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                        <td></td>
                                        <td></td>


                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php $beb_kredit += ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']); ?>
                                        <td></td>
                                        <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                        <td></td>
                                        </td>
                                        </td>

                                    <?php } ?>

                                <?php } else { ?>
                                    <?php if ($jpsr->debet > 0) { ?>
                                        <?php $beb_debet += $jpsr->debet; ?>
                                        <td><?= $jpsr->debet ?></td>
                                        <td></td>
                                        <td></td>
                                    <?php } elseif ($jpsr->kredit > 0) { ?>
                                        <?php $beb_kredit += $jpsr->kredit; ?>
                                        <td></td>
                                        <td><?= $jpsr->kredit ?></td>
                                        <td></td>
                                    <?php } ?> <?php } ?>
                                <td>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="text-danger">
                            <td></td>
                            <td></td>
                            <td><?= $total_beban = $beb_debet ?> </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="text-danger">
                            <td>LABA BERSIH</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?= $laba_rugi = $laba_kotor - $total_beban  ?></td>
                        </tr>
                    </tbody>
                </table>

                <hr>


                <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead class="text-center">
                        <tr>
                            <th colspan="4">TOKO NORKAYATI</th>
                        </tr>
                        <tr>
                            <th colspan="4">LAPORAN PERUBAHAN MODAL</th>
                        </tr>
                        <tr>
                            <th colspan="4">PERIODE <?= date("Y") ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MODAL AWAL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>LABA</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>PENAMBAHAN MODAL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>MODAL AKHIR</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <hr>


                <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead class="text-center">
                        <tr>
                            <th colspan="4">TOKO NORKAYATI</th>
                        </tr>
                        <tr>
                            <th colspan="4">LAPORAN NERACA</th>
                        </tr>
                        <tr>
                            <th colspan="4">PERIODE <?= date("Y") ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MODAL AWAL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>LABA</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>PENAMBAHAN MODAL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>MODAL AKHIR</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>