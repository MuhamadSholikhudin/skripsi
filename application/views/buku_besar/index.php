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
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Buku Besar</h5>
                <h5>Periode <?= date('m-Y') ?> </h5>
            </div>


            <?php foreach ($akun as $ak) : ?>

                <div class="col-md-6 text-left">
                    <strong><?= $ak->nama_akun ?></strong>
                </div>
                <div class="col-md-6 text-right">
                    <strong> No : <?= $ak->no_akun ?> </strong>
                </div>
                <div class="col-sm-12">
                    <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
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
                            <?php
                            $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkm WHERE id_akun = $ak->id_akun";
                            $g1 = $this->db->query($q1)->row_array();
                            $n1 = $this->db->query("SELECT * FROM jkm WHERE id_akun = $ak->id_akun")->num_rows();
                            // perhitungan jumlah 
                            $a = $g1['debet'] + $g1['kredit'];

                            $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkk WHERE id_akun = $ak->id_akun";
                            $n2 = $this->db->query("SELECT * FROM jkk WHERE id_akun = $ak->id_akun")->num_rows();
                            $g2 = $this->db->query($q2)->row_array();
                            // perhitungan jumlah 
                            $b = $g2['debet'] + $g2['kredit'];

                            $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jb WHERE id_akun = $ak->id_akun";
                            $g3 = $this->db->query($q3)->row_array();
                            $n3 = $this->db->query("SELECT * FROM jb WHERE id_akun = $ak->id_akun")->num_rows();
                            // perhitungan jumlah 
                            $c = $g3['debet'] + $g3['kredit'];

                            $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jj WHERE id_akun = $ak->id_akun";
                            $g4 = $this->db->query($q4)->row_array();
                            $n4 = $this->db->query("SELECT * FROM jj WHERE id_akun = $ak->id_akun")->num_rows();
                            // perhitungan jumlah 
                            $d = $g4['debet'] + $g4['kredit'];

                            $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM ju WHERE id_akun = $ak->id_akun";
                            $g5 = $this->db->query($q5)->row_array();
                            $n5 = $this->db->query("SELECT * FROM ju WHERE id_akun = $ak->id_akun")->num_rows();
                            // perhitungan jumlah 
                            $e = $g5['debet'] + $g5['kredit'];
                            ?>

                            <tr>
                                <td></td>
                                <td>Saldo</td>
                                <td></td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php if ($g1['debet'] != $g1['kredit']) { ?>
                                <tr>
                                    <td><?= $g1['tanggal'] ?></td>
                                    <td>Posting</td>
                                    <td>JKM</td>
                                    <td>
                                        <?= $g1['debet'] ?>
                                    </td>
                                    <td>
                                        <?= $g1['kredit'] ?>
                                    </td>
                                    <?php if ($g1['debet'] > $g1['kredit']) {
                                        $a_debet = $g1['debet'];
                                        $a_kredit = $g1['kredit'];
                                    ?>
                                        <td><?= $g1['debet'] ?></td>
                                        <td></td>
                                    <?php } elseif ($g1['debet'] < $g1['kredit']) {

                                    ?>
                                        <td></td>
                                        <td><?= $g1['kredit'] ?></td>
                                    <?php } ?>

                                </tr>
                            <?php } else { ?>

                            <?php } ?>

                            <?php if ($g2['debet'] != $g2['kredit']) { ?>
                                <tr>
                                    <td><?= $g2['tanggal'] ?></td>
                                    <td>Posting</td>
                                    <td>JKK</td>
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
                                    <td><?= $g3['tanggal'] ?></td>
                                    <td>Posting</td>
                                    <td>JB</td>
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
                                    <td><?= $g4['tanggal'] ?></td>
                                    <td>Posting</td>
                                    <td>JP</td>
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
                                    <td><?= $g5['tanggal'] ?></td>
                                    <td>Posting</td>
                                    <td>JU</td>
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