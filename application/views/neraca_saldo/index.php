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
                <h5>Jurnal Neraca Saldo</h5>
                <h5>Periode <?= date('m-Y') ?> </h5>
            </div>

            <table border="1">
                <thead>
                    <tr>

                        <th>No Akun</th>
                        <th>Nama Akun</th>
                        <th>Debet</th>
                        <th>Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($akun as $ak) : ?>
                        <?php
                        $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkm WHERE id_akun = $ak->id_akun ";
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

                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                            <tr>
                                <td><?= $ak->no_akun ?></td>
                                <td><?= $ak->nama_akun ?></td>
                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <td><?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?></td>
                                    <td></td>

                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <td></td>
                                    <td><?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?></td>
                                <?php } ?>
                            </tr>
                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                            <tr>
                                <td><?= $ak->no_akun ?></td>
                                <td><?= $ak->nama_akun ?></td>
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

                    <?php endforeach; ?>
                   
                    <tr>
                        <td>
                        </td>
                        <td>Total</td>
                        <td>

                            <?php $total_debet = 0;
                            foreach ($akun as $ak) : ?>
                                <?php
                                $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkm WHERE id_akun = $ak->id_akun ";
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
                                $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkm WHERE id_akun = $ak->id_akun ";
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
                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { 
                                    $total_kredit += ( ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ) ?>
                                <?php } else {

                                } ?>

                            <?php endforeach;
                            echo $total_kredit;
                            ?>

                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="d-none">
                <?php foreach ($akun as $ak) : ?>
                    <?php
                    $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jkm WHERE id_akun = $ak->id_akun ";
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
                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                            <?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?>
                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                            <?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?>
                        <?php } ?>
                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                            <?= ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) ?>
                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                            <?= ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) ?>
                        <?php } ?>
                    <?php } else {
                    } ?>

                <?php endforeach; ?>
            </div>


        </div>
    </div>
</div>