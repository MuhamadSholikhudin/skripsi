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
                <h5>Neraca Saldo</h5>
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

            <table class="display text-dark" style="width:100%" border="1">
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
                        <?php if ($pilihan[0] == 'menu') { ?>
                            <?php
                            $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun ";
                            $g1 = $this->db->query($q1)->row_array();
                            $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $a = $g1['debet'] + $g1['kredit'];

                            $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
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
                            ?>
                        <?php } elseif ($pilihan[0] == 'samping') { ?>
                            <?php
                            $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE  no_akun = $ak->no_akun ";
                            $g1 = $this->db->query($q1)->row_array();
                            $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $a = $g1['debet'] + $g1['kredit'];

                            $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE  no_akun = $ak->no_akun";
                            $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                            $g2 = $this->db->query($q2)->row_array();
                            // perhitungan jumlah 
                            $b = $g2['debet'] + $g2['kredit'];

                            $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE  no_akun = $ak->no_akun";
                            $g3 = $this->db->query($q3)->row_array();
                            $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $c = $g3['debet'] + $g3['kredit'];

                            $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE  no_akun = $ak->no_akun";
                            $g4 = $this->db->query($q4)->row_array();
                            $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $d = $g4['debet'] + $g4['kredit'];

                            $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE  no_akun = $ak->no_akun";
                            $g5 = $this->db->query($q5)->row_array();
                            $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $ak->no_akun")->num_rows();
                            // perhitungan jumlah 
                            $e = $g5['debet'] + $g5['kredit'];
                            ?>
                        <?php } ?>


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
                            <?php if ($pilihan[0] == 'menu') { ?>
                                <?php $total_debet = 0;
                                foreach ($akun as $ak) : ?>
                                    <?php
                                    $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun ";
                                    $g1 = $this->db->query($q1)->row_array();
                                    $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $a = $g1['debet'] + $g1['kredit'];

                                    $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
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
                                    ?>
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                        $total_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']))  ?>

                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                    <?php } else {
                                    } ?>

                                <?php endforeach;
                                echo $total_debet;
                                ?>
                            <?php } elseif ($pilihan[0] == 'samping') { ?>
                                <?php $total_debet = 0;
                                foreach ($akun as $ak) : ?>
                                    <?php
                                    $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE  no_akun = $ak->no_akun ";
                                    $g1 = $this->db->query($q1)->row_array();
                                    $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $a = $g1['debet'] + $g1['kredit'];

                                    $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE  no_akun = $ak->no_akun";
                                    $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    $g2 = $this->db->query($q2)->row_array();
                                    // perhitungan jumlah 
                                    $b = $g2['debet'] + $g2['kredit'];

                                    $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE  no_akun = $ak->no_akun";
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
                            <?php } ?>


                        </td>
                        <td>
                            <?php if ($pilihan[0] == 'menu') { ?>
                                <?php $total_kredit = 0;
                                foreach ($akun as $ak) : ?>
                                    <?php
                                    $q1 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pemasukan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun ";
                                    $g1 = $this->db->query($q1)->row_array();
                                    $n1 = $this->db->query("SELECT * FROM jurnal_pemasukan_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $a = $g1['debet'] + $g1['kredit'];

                                    $q2 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $ak->no_akun")->num_rows();
                                    $g2 = $this->db->query($q2)->row_array();
                                    // perhitungan jumlah 
                                    $b = $g2['debet'] + $g2['kredit'];

                                    $q3 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $ak->no_akun";
                                    $g3 = $this->db->query($q3)->row_array();
                                    $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $c = $g3['debet'] + $g3['kredit'];

                                    $q4 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun";
                                    $g4 = $this->db->query($q4)->row_array();
                                    $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $ak->no_akun")->num_rows();
                                    // perhitungan jumlah 
                                    $d = $g4['debet'] + $g4['kredit'];

                                    $q5 = "SELECT tanggal, SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $ak->no_akun";
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
                            <?php } elseif ($pilihan[0] == 'samping') { ?>
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
                            <?php } ?>



                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="d-none">
                <?php foreach ($akun as $ak) : ?>
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