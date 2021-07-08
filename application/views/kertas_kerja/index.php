<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">

            <br>
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Kertas Kerja</h5>
                <h5>Periode <?= date('m-Y') ?> </h5>
            </div>

            <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
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
                            $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun ";
                            $g1 = $this->db->query($q1)->row_array();
                            $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $a = $g1['debet'] + $g1['kredit'];

                            $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                            $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                            $g2 = $this->db->query($q2)->row_array();
                            // perhitungan jumlah 
                            $b = $g2['debet'] + $g2['kredit'];

                            $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                            $g3 = $this->db->query($q3)->row_array();
                            $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $c = $g3['debet'] + $g3['kredit'];

                            $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                            $g4 = $this->db->query($q4)->row_array();
                            $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $d = $g4['debet'] + $g4['kredit'];

                            $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                            $g5 = $this->db->query($q5)->row_array();
                            $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $e = $g5['debet'] + $g5['kredit'];
                            ?>

                            <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                    <td></td>

                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <td></td>
                                    <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                <?php } ?>

                            <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                    <td></td>

                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <td></td>
                                    <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                <?php } ?>

                            <?php } else { ?>
                                <td></td>
                                <td></td>
                            <?php } ?>

                            <!-- Jurnal Penyesuaian -->
                            <?php
                            $jps1 = $this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun ");
                            $jpsr = $jps1->row();
                            if ($jps1->num_rows() > 0) {
                                if ($jpsr->debet > 0) { ?>
                                    <td>
                                        <?php if ($jpsr->debet > 0) {
                                            echo $jpsr->debet;
                                        } else {
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if ($jpsr->kredit > 0) {
                                            echo $jpsr->kredit;
                                        } else {
                                        } ?>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <?php if ($jpsr->debet > 0) {
                                            echo $jpsr->debet;
                                        } else {
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if ($jpsr->kredit > 0) {
                                            echo $jpsr->kredit;
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


                            <!-- NSD -->
                            <?php
                            $nsdebet = $g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'];
                            $nsdkredit = $g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'];

                            if (($nsdebet + $jpsr->debet) > ($nsdkredit + $jpsr->kredit)) { ?>
                                <td><?= rupiah1(($nsdebet + $jpsr->debet) - ($nsdkredit + $jpsr->kredit)) ?></td>
                                <td>0</td>

                            <?php } else { ?>
                                <td>0</td>
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
                                    <td>0</td>

                                <?php } else { ?>
                                    <td>0</td>
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
                                    <td>0</td>

                                <?php } else { ?>
                                    <td>0</td>
                                    <td><?= rupiah1(($nsdkredit + $jpsr->kredit) - ($nsdebet + $jpsr->debet)); ?> </td>
                                <?php }  ?>
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>


                    <!-- Total Bawah -->
                    <tr>
                        <td></td>
                        <td></td>
                        <!-- Total Neraca saldo -->
                        <td>

                            <?php $total_debet = 0;
                            foreach ($akun as $ak) : ?>
                                <?php
                                $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun ";
                                $g1 = $this->db->query($q1)->row_array();
                                $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $a = $g1['debet'] + $g1['kredit'];

                                $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                                $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                $g2 = $this->db->query($q2)->row_array();
                                // perhitungan jumlah 
                                $b = $g2['debet'] + $g2['kredit'];

                                $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                                $g3 = $this->db->query($q3)->row_array();
                                $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $c = $g3['debet'] + $g3['kredit'];

                                $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                                $g4 = $this->db->query($q4)->row_array();
                                $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $d = $g4['debet'] + $g4['kredit'];

                                $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
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
                            echo $total_debet;
                            ?>
                        </td>
                        <td>
                            <?php $total_kredit = 0;
                            foreach ($akun as $ak) : ?>
                                <?php
                                $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun ";
                                $g1 = $this->db->query($q1)->row_array();
                                $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $a = $g1['debet'] + $g1['kredit'];

                                $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                                $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                $g2 = $this->db->query($q2)->row_array();
                                // perhitungan jumlah 
                                $b = $g2['debet'] + $g2['kredit'];

                                $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                                $g3 = $this->db->query($q3)->row_array();
                                $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $c = $g3['debet'] + $g3['kredit'];

                                $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                                $g4 = $this->db->query($q4)->row_array();
                                $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $d = $g4['debet'] + $g4['kredit'];

                                $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
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
                            echo $total_kredit;
                            ?>
                        </td>


                        <!-- Total Jurnal Penyesuaian -->
                        <?php
                        $jp1 = "SELECT SUM(debet) as debet_jps, SUM(kredit) as kredit_jps FROM jurnal_penyesuaian ";
                        $jpsg1 = $this->db->query($jp1)->row_array();

                        ?>
                        <td>
                            <?= $jpsg1['debet_jps'] ?>
                        </td>
                        <td>
                            <?= $jpsg1['kredit_jps'] ?>

                        </td>

                        <!-- Total NSD -->

                        <?php
                        $nsdtotal_debet = 0;
                        $nsdtotal_kredit = 0;
                        foreach ($akun as $ak) :
                            $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun ";
                            $g1 = $this->db->query($q1)->row_array();
                            $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah
                            $a = $g1['debet'] + $g1['kredit'];

                            $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                            $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                            $g2 = $this->db->query($q2)->row_array();
                            // perhitungan jumlah
                            $b = $g2['debet'] + $g2['kredit'];

                            $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                            $g3 = $this->db->query($q3)->row_array();
                            $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah
                            $c = $g3['debet'] + $g3['kredit'];

                            $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                            $g4 = $this->db->query($q4)->row_array();
                            $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah
                            $d = $g4['debet'] + $g4['kredit'];

                            $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                            $g5 = $this->db->query($q5)->row_array();
                            $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah
                            $e = $g5['debet'] + $g5['kredit'];

                            $jps1 = $this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun ");
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
                        <td>
                            <!-- Jumlah debet =  -->
                            <?= rupiah1($nsdtotal_debet) ?>
                        </td>

                        <td>
                            <!-- jumlah kredit =  -->
                            <?= rupiah1($nsdtotal_kredit) ?>
                        </td>

                        <!-- Total Laba Rugi -->
                        <?php
                        $latotal_debet = 0;
                        $latotal_kredit = 0;
                        $nrtotal_debet = 0;
                        $nrtotal_kredit = 0;
                        foreach ($akun as $ak) :
                            $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun ";
                            $g1 = $this->db->query($q1)->row_array();

                            $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                            $g2 = $this->db->query($q2)->row_array();

                            $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                            $g3 = $this->db->query($q3)->row_array();

                            $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                            $g4 = $this->db->query($q4)->row_array();

                            $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                            $g5 = $this->db->query($q5)->row_array();

                            $jps1 = $this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun ");
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
                        <!-- Laba rugi -->
                        <td> <?= rupiah1($latotal_debet) ?></td>
                        <td> <?= rupiah1($latotal_kredit) ?></td>

                        <!-- Neraca -->
                        <td> <?= rupiah1($nrtotal_debet) ?></td>
                        <td> <?= rupiah1($nrtotal_kredit) ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p>
                Selisih-nya : <?= rupiah1($latotal_kredit - $latotal_debet) ?>
            </p>
            <br>


            <p>
                Selisih-nya : <?= rupiah1($nrtotal_debet - $nrtotal_kredit) ?>
            </p>
            <!--  
            <div>
                Ini Debet :
                <?php
                $nsdtotal_debet = 0;
                // $nsdtotal_kredit = 0;
                foreach ($akun as $ak) :
                    $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun ";
                    $g1 = $this->db->query($q1)->row_array();
                    $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $a = $g1['debet'] + $g1['kredit'];

                    $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                    $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                    $g2 = $this->db->query($q2)->row_array();
                    // perhitungan jumlah
                    $b = $g2['debet'] + $g2['kredit'];

                    $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                    $g3 = $this->db->query($q3)->row_array();
                    $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $c = $g3['debet'] + $g3['kredit'];

                    $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                    $g4 = $this->db->query($q4)->row_array();
                    $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $d = $g4['debet'] + $g4['kredit'];

                    $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                    $g5 = $this->db->query($q5)->row_array();
                    $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $e = $g5['debet'] + $g5['kredit'];

                    $jps1 = $this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun ");
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
                    $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun ";
                    $g1 = $this->db->query($q1)->row_array();
                    $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $a = $g1['debet'] + $g1['kredit'];

                    $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun";
                    $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                    $g2 = $this->db->query($q2)->row_array();
                    // perhitungan jumlah
                    $b = $g2['debet'] + $g2['kredit'];

                    $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE no_akun = $ak->no_akun";
                    $g3 = $this->db->query($q3)->row_array();
                    $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $c = $g3['debet'] + $g3['kredit'];

                    $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE no_akun = $ak->no_akun";
                    $g4 = $this->db->query($q4)->row_array();
                    $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $d = $g4['debet'] + $g4['kredit'];

                    $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE no_akun = $ak->no_akun";
                    $g5 = $this->db->query($q5)->row_array();
                    $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                    // perhitungan jumlah
                    $e = $g5['debet'] + $g5['kredit'];

                    $jps1 = $this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penyesuaian WHERE no_akun = $ak->no_akun ");
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