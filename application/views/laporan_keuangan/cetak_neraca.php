<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIA TOKO NORKAYATI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    function rupiah($angka)
    {

        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }

    function rupiah1($angka)
    {

        $hasil_rupiah = number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
    ?>

    <div class="container">



        <div class="clearfix"></div>

        <br>
        <br>

        <div class="row">
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>Laporan Laba-Rugi</h5>
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
            <div class="col-sm-12  table-responsive">
                <table class="table table-bordered border-dark" style="width:100%" border="1">
                    <thead class="text-center">
                        <tr>
                            <th>Nama Akun</th>
                            <th>Kredit</th>
                            <th>Debet</th>
                            <th>Jumlah 1</th>
                            <th>Jumlah 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $penjualan = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '4%'")->result();
                        ?>


                        <?php
                        if ($pilihan[0] == 'menu') { ?>
                            <?php
                            $penber_debet = 0;
                            $penber_kredit = 0;
                            foreach ($penjualan as $jual) : ?>
                                <?php
                                $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE  MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $jual->no_akun ";
                                $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $jual->no_akun")->num_rows();
                                if ($n1 > 0) {
                                    $g1 = $this->db->query($q1)->row_array();
                                } else {
                                    $g1['debet'] = 0;
                                    $g1['kredit'] = 0;
                                }
                                // perhitungan jumlah 
                                $a = $g1['debet'] + $g1['kredit'];

                                $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $jual->no_akun";
                                $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $jual->no_akun")->num_rows();
                                if ($n2 > 0) {
                                    $g2 = $this->db->query($q2)->row_array();
                                } else {
                                    $g2['debet'] = 0;
                                    $g2['kredit'] = 0;
                                }
                                // perhitungan jumlah 
                                $b = $g2['debet'] + $g2['kredit'];

                                $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $jual->no_akun";
                                $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $jual->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($n3 > 0) {
                                    $g3 = $this->db->query($q3)->row_array();
                                } else {
                                    $g3['debet'] = 0;
                                    $g3['kredit'] = 0;
                                }
                                $c = $g3['debet'] + $g3['kredit'];

                                $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $jual->no_akun";
                                $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $jual->no_akun")->num_rows();
                                if ($n4 > 0) {
                                    $g4 = $this->db->query($q4)->row_array();
                                } else {
                                    $g4['debet'] = 0;
                                    $g4['kredit'] = 0;
                                }
                                // perhitungan jumlah 
                                $d = $g4['debet'] + $g4['kredit'];

                                $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $jual->no_akun";
                                $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $jual->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($n5 > 0) {
                                    $g5 = $this->db->query($q5)->row_array();
                                } else {
                                    $g5['debet'] = 0;
                                    $g5['kredit'] = 0;
                                }
                                $e = $g5['debet'] + $g5['kredit'];

                                ?>

                                <tr>
                                    <td><?= $jual->nama_akun ?></td>

                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) ?></td>
                                            <td></td>
                                            <td></td>

                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                            <td></td>
                                            <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?></td>
                                            <td></td>

                                        <?php } ?>

                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>

                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) ?></td>
                                            <td></td>
                                            <td></td>


                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td></td>
                                            <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?></td>
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
                                    $penber_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']));
                                } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                    $penber_kredit +=   ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']);
                                }
                                ?>
                            <?php endforeach; ?>

                        <?php } else { ?>
                            <?php
                            $penber_debet = 0;
                            $penber_kredit = 0;
                            foreach ($penjualan as $jual) : ?>
                                <?php
                                $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $jual->no_akun ";
                                $g1 = $this->db->query($q1)->row_array();
                                $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $jual->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $a = $g1['debet'] + $g1['kredit'];

                                $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $jual->no_akun";
                                $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $jual->no_akun")->num_rows();
                                $g2 = $this->db->query($q2)->row_array();
                                // perhitungan jumlah 
                                $b = $g2['debet'] + $g2['kredit'];

                                $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $jual->no_akun";
                                $g3 = $this->db->query($q3)->row_array();
                                $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $jual->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $c = $g3['debet'] + $g3['kredit'];

                                $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $jual->no_akun";
                                $g4 = $this->db->query($q4)->row_array();
                                $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $jual->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $d = $g4['debet'] + $g4['kredit'];

                                $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $jual->no_akun";
                                $g5 = $this->db->query($q5)->row_array();
                                $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $jual->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $e = $g5['debet'] + $g5['kredit'];

                                ?>

                                <tr class="text-dark">
                                    <td><?= $jual->nama_akun ?></td>

                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) ?></td>
                                            <td></td>
                                            <td></td>
                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td></td>
                                            <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?></td>
                                            <td></td>
                                        <?php } ?>
                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) ?></td>
                                            <td></td>
                                            <td></td>
                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                            <td></td>
                                            <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?></td>
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
                        <?php } ?>
                        <tr class="text-danger">
                            <td>PENJUALAN BERSIH</td>
                            <td></td>
                            <td></td>
                            <td><?php $penjualan_bersih = ($penber_kredit - $penber_debet);
                                echo rupiah($penjualan_bersih) ?></td>
                            <td></td>
                        </tr>
                        <?php
                        $persediaan = $this->db->query("SELECT * FROM akun WHERE no_akun = 114")->result();
                        ?>
                        <?php foreach ($persediaan as $sedia) : ?>
                            <tr class="text-dark">
                                <?php
                                if ($pilihan[0] == 'menu') { ?>
                                    <?php $perbg = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE  MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 114 AND kredit != 0");
                                    $perawal = $perbg->row();
                                    ?>
                                <?php } else { ?>
                                    <?php $perbg = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_akun = 114 AND kredit != 0");
                                    $perawal = $perbg->row();
                                    ?>
                                <?php } ?>

                                <td><?= $sedia->nama_akun ?> </td>
                                <td></td>
                                <td>
                                    <?php
                                    if ($perbg->num_rows() > 0) {
                                        echo rupiah($perawal->kredit);
                                    } else {
                                        echo 0;
                                    }
                                    ?>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>

                        <?php $pembelian = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '5%' AND no_akun != 514")->result(); ?>

                        <?php
                        $beli_debet = 0;
                        $beli_kredit = 0;
                        foreach ($pembelian as $beli) : ?>
                            <?php
                            if ($pilihan[0] == 'menu') { ?>
                                <?php
                                $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $beli->no_akun ";
                                $g1 = $this->db->query($q1)->row_array();
                                $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $beli->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $a = $g1['debet'] + $g1['kredit'];

                                $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $beli->no_akun";
                                $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $beli->no_akun")->num_rows();
                                $g2 = $this->db->query($q2)->row_array();
                                // perhitungan jumlah 
                                $b = $g2['debet'] + $g2['kredit'];

                                $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $beli->no_akun";
                                $g3 = $this->db->query($q3)->row_array();
                                $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $beli->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $c = $g3['debet'] + $g3['kredit'];

                                $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $beli->no_akun";
                                $g4 = $this->db->query($q4)->row_array();
                                $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $beli->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $d = $g4['debet'] + $g4['kredit'];

                                $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE  MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = $beli->no_akun";
                                $g5 = $this->db->query($q5)->row_array();
                                $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $beli->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $e = $g5['debet'] + $g5['kredit'];

                                ?>
                            <?php } else { ?>
                                <?php
                                $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $beli->no_akun ";
                                $g1 = $this->db->query($q1)->row_array();
                                $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $beli->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $a = $g1['debet'] + $g1['kredit'];

                                $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $beli->no_akun";
                                $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $beli->no_akun")->num_rows();
                                $g2 = $this->db->query($q2)->row_array();
                                // perhitungan jumlah 
                                $b = $g2['debet'] + $g2['kredit'];

                                $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $beli->no_akun";
                                $g3 = $this->db->query($q3)->row_array();
                                $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $beli->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $c = $g3['debet'] + $g3['kredit'];

                                $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $beli->no_akun";
                                $g4 = $this->db->query($q4)->row_array();
                                $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $beli->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $d = $g4['debet'] + $g4['kredit'];

                                $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $beli->no_akun";
                                $g5 = $this->db->query($q5)->row_array();
                                $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $beli->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $e = $g5['debet'] + $g5['kredit'];
                                ?>
                            <?php } ?>

                            <tr class="text-dark">
                                <td><?= $beli->nama_akun ?></td>
                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) ?></td>
                                        <td></td>
                                        <td></td>
                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <td></td>
                                        <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?></td>
                                        <td></td>
                                    <?php } ?>
                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) ?></td>
                                        <td></td>
                                        <td></td>
                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) { ?>
                                        <td></td>
                                        <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'])) ?></td>
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
                            <td><?php $pembelian_bersih = ($beli_debet - $beli_kredit);
                                echo  rupiah($pembelian_bersih) ?></td>
                            <td></td>
                        </tr>
                        <tr class="text-danger">
                            <?php
                            if ($pilihan[0] == 'menu') { ?>
                                <?php $pbg_awal = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 114 AND kredit != 0");
                                $perawal = $pbg_awal->row();
                                ?>
                            <?php } else { ?>
                                <?php $pbg_awal = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_akun = 114 AND kredit != 0");
                                $perawal = $pbg_awal->row();
                                ?>
                            <?php } ?>

                            <td>BARANG TERSEDIA UNTUK DI JUAL</td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php
                                if ($pbg_awal->num_rows() > 0) {

                                    $btud = ($pembelian_bersih + $perawal->kredit);
                                    echo rupiah($btud);
                                } else {
                                    $btud = ($pembelian_bersih + 0);
                                    echo rupiah($btud);
                                }
                                ?>
                            </td>
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
                            <?php
                            if ($pilihan[0] == 'menu') { ?>
                                <?php $pbg_akhir = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE  MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 114 AND debet != 0");
                                $perakhir = $pbg_akhir->row();
                                ?>
                            <?php } else { ?>
                                <?php $pbg_akhir = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_akun = 114 AND debet != 0");
                                $perakhir = $pbg_akhir->row();
                                ?>

                            <?php } ?>

                            <td>HARGA POKOK PENJUALAN</td>
                            <td></td>
                            <td></td>
                            <td>
                                <?php
                                if ($pbg_akhir->num_rows() > 0) {

                                    $hpp = ($btud - $perakhir->debet);
                                    echo rupiah($hpp);
                                } else {
                                    $hpp = ($btud - 0);
                                    echo rupiah($hpp);
                                }
                                ?>


                            </td>
                            <td></td>
                        </tr>
                        <tr class="text-danger">
                            <td>LABA KOTOR</td>
                            <td></td>
                            <td></td>
                            <td><?php $laba_kotor = ($penjualan_bersih - $hpp);
                                echo rupiah($laba_kotor); ?></td>
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
                            if ($pilihan[0] == 'menu') { ?>

                                <?php
                                $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun ";
                                $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($n1 > 0) {
                                    $g1 = $this->db->query($q1)->row_array();
                                } else {
                                    $g1['debet'] = 0;
                                    $g1['kredit'] = 0;
                                }
                                $a = $g1['debet'] + $g1['kredit'];

                                $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun";
                                $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($n2 > 0) {
                                    $g2 = $this->db->query($q2)->row_array();
                                } else {
                                    $g2['debet'] = 0;
                                    $g2['kredit'] = 0;
                                }
                                $b = $g2['debet'] + $g2['kredit'];

                                $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun";
                                $g3 = $this->db->query($q3)->row_array();
                                $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($n3 > 0) {
                                    $g3 = $this->db->query($q2)->row_array();
                                } else {
                                    $g3['debet'] = 0;
                                    $g3['kredit'] = 0;
                                }
                                $c = $g3['debet'] + $g3['kredit'];

                                $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun";
                                $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($n4 > 0) {
                                    $g4 = $this->db->query($q4)->row_array();
                                } else {
                                    $g4['debet'] = 0;
                                    $g4['kredit'] = 0;
                                }
                                $d = $g4['debet'] + $g4['kredit'];

                                $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun";
                                $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun")->num_rows();
                                // perhitungan jumlah 
                                if ($n5 > 0) {
                                    $g5 = $this->db->query($q5)->row_array();
                                } else {
                                    $g5['debet'] = 0;
                                    $g5['kredit'] = 0;
                                }
                                $e = $g5['debet'] + $g5['kredit'];

                                $q6 = $this->db->query("SELECT  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE  MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $beb->no_akun ");
                                $n6 = $q6->row();
                                if ($q6->num_rows() > 0) {
                                    $g6 = $this->db->query($q5)->row_array();
                                } else {
                                    $g6['debet'] = 0;
                                    $g6['kredit'] = 0;
                                }
                                ?>

                            <?php } else { ?>

                                <?php
                                $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $beb->no_akun ";
                                $g1 = $this->db->query($q1)->row_array();
                                $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $beb->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $a = $g1['debet'] + $g1['kredit'];

                                $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $beb->no_akun";
                                $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $beb->no_akun")->num_rows();
                                $g2 = $this->db->query($q2)->row_array();
                                // perhitungan jumlah 
                                $b = $g2['debet'] + $g2['kredit'];

                                $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $beb->no_akun";
                                $g3 = $this->db->query($q3)->row_array();
                                $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $beb->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $c = $g3['debet'] + $g3['kredit'];

                                $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $beb->no_akun";
                                $g4 = $this->db->query($q4)->row_array();
                                $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $beb->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $d = $g4['debet'] + $g4['kredit'];

                                $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $beb->no_akun";
                                $g5 = $this->db->query($q5)->row_array();
                                $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $beb->no_akun")->num_rows();
                                // perhitungan jumlah 
                                $e = $g5['debet'] + $g5['kredit'];
                                $q6 = $this->db->query("SELECT  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE no_akun = $beb->no_akun ");
                                $n6 = $q6->row();

                                ?>
                            <?php } ?>

                            <tr class="text-dark">
                                <td><?= $beb->nama_akun ?></td>

                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                        <?php $beb_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])); ?>
                                        <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) ?></td>
                                        <td></td>
                                        <td></td>

                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                        <?php $beb_kredit += ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']); ?>
                                        <td></td>
                                        <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet'])) ?></td>
                                        <td></td>
                                    <?php } ?>

                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>

                                    <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                        <?php $beb_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])); ?>
                                        <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) ?></td>
                                        <td></td>
                                        <td></td>

                                    <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                        <?php $beb_kredit += ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']); ?>
                                        <td></td>
                                        <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet'])) ?></td>
                                        <td></td>
                                        </td>
                                        </td>

                                    <?php } ?>

                                <?php } else { ?>
                                    <?php if ($g6['debet'] > 0) { ?>
                                        <?php $beb_debet += $g6->debet; ?>
                                        <td><?= rupiah($g6->debet) ?></td>
                                        <td></td>
                                        <td></td>
                                    <?php } elseif ($g6['kredit'] > 0) { ?>
                                        <?php $beb_kredit += $g6->kredit; ?>
                                        <td></td>
                                        <td><?= rupiah($g6->kredit) ?></td>
                                        <td></td>
                                    <?php } else { ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    <?php } ?>

                                <?php } ?>
                                <td>
                                </td>
                            </tr>
                        <?php endforeach; ?>


                        <tr class="text-dark">
                            <td></td>
                            <td></td>
                            <td><?php $total_beban = $beb_debet;
                                echo rupiah($total_beban); ?> </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="text-danger">
                            <td>LABA BERSIH</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php $laba_rugi = $laba_kotor - $total_beban;
                                echo rupiah($laba_rugi); ?></td>
                        </tr>
                    </tbody>
                </table>




                <hr>
                <div class="col-md-12 text-center">
                    <h5>Toko Norkayati</h5>
                    <h5>Laporan Perubahan Modal</h5>
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


                    <table class="table table-bordered border-dark" style="width:100%" border="1" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead class="text-center">
                            <tr>
                                <th>Nama Akun</th>
                                <th>Debet</th>
                                <th>KREDIT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>MODAL AWAL</td>
                                <td></td>
                                <td>

                                    <?php
                                    if ($pilihan[0] == 'menu') { ?>
                                        <?php
                                        $mo1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND no_akun = 311 ";
                                        $mn1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311")->num_rows();
                                        if ($mn1 > 0) {
                                            $mi1 = $this->db->query($mo1)->row_array();
                                        } else {
                                            $mi1['debet'] = 0;
                                            $mi1['kredit'] = 0;
                                        }
                                        // perhitungan jumlah 

                                        $mo2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311";
                                        $mn2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311")->num_rows();
                                        // perhitungan jumlah 
                                        if ($mn2 > 0) {
                                            $mi2 = $this->db->query($mo2)->row_array();
                                        } else {
                                            $mi2['debet'] = 0;
                                            $mi2['kredit'] = 0;
                                        }

                                        $mo3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311";
                                        $mn3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311")->num_rows();
                                        // perhitungan jumlah 
                                        if ($mn3 > 0) {
                                            $mi3 = $this->db->query($mo3)->row_array();
                                        } else {
                                            $mi3['debet'] = 0;
                                            $mi3['kredit'] = 0;
                                        }

                                        $mo4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311";
                                        $mn4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311")->num_rows();
                                        // perhitungan jumlah 
                                        if ($mn4 > 0) {
                                            $mi4 = $this->db->query($mo4)->row_array();
                                        } else {
                                            $mi4['debet'] = 0;
                                            $mi4['kredit'] = 0;
                                        }

                                        $mo5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311";
                                        $mn5 = $this->db->query("SELECT * FROM jurnal_umum WHERE MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311")->num_rows();
                                        // perhitungan jumlah 
                                        if ($mn5 > 0) {
                                            $mi5 = $this->db->query($mo5)->row_array();
                                        } else {
                                            $mi5['debet'] = 0;
                                            $mi5['kredit'] = 0;
                                        }

                                        $mo6 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE MONTH(tanggal) = $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311";
                                        $mn6 = $this->db->query("SELECT * FROM jurnal_umum WHERE MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = 311")->num_rows();
                                        // perhitungan jumlah 
                                        if ($mn6 > 0) {
                                            $mi6 = $this->db->query($mo6)->row_array();
                                        } else {
                                            $mi6['debet'] = 0;
                                            $mi6['kredit'] = 0;
                                        }

                                        if (($mi1['debet'] + $mi2['debet'] + $mi3['debet'] + $mi4['debet'] + $mi5['debet'] + $mi6['debet']) > ($mi1['kredit'] + $mi2['kredit'] + $mi3['kredit'] + $mi4['kredit'] + $mi5['kredit'] + $mi6['kredit'])) {
                                            $nilai_modal_awal = (($mi1['debet'] + $mi2['debet'] + $mi3['debet'] + $mi4['debet'] + $mi5['debet'] + $mi6['debet']) - ($mi1['kredit'] + $mi2['kredit'] + $mi3['kredit'] + $mi4['kredit'] + $mi5['kredit'] + $mi6['kredit']));
                                        } elseif (($mi1['debet'] + $mi2['debet'] + $mi3['debet'] + $mi4['debet'] + $mi5['debet'] + $mi6['debet']) < ($mi1['kredit'] + $mi2['kredit'] + $mi3['kredit'] + $mi4['kredit'] + $mi5['kredit'] + $mi6['kredit'])) {
                                            $nilai_modal_awal = (($mi1['kredit'] + $mi2['kredit'] + $mi3['kredit'] + $mi4['kredit'] + $mi5['kredit'] + $mi6['kredit']) - ($mi1['debet'] + $mi2['debet'] + $mi3['debet'] + $mi4['debet'] + $mi5['debet'] + $mi6['debet']));
                                        }
                                        // echo $mi1['kredit'];
                                        echo rupiah($nilai_modal_awal);

                                        ?>

                                    <?php } else { ?>
                                        <?php
                                        $mo1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = 311 ";
                                        $mi1 = $this->db->query($mo1)->row_array();
                                        $mn1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = 311")->num_rows();
                                        // perhitungan jumlah 


                                        $mo2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = 311";
                                        $mi2 = $this->db->query($mo2)->row_array();
                                        $mn2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = 311")->num_rows();
                                        // perhitungan jumlah 


                                        $mo3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = 311";
                                        $mi3 = $this->db->query($mo3)->row_array();
                                        $mn3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = 311")->num_rows();
                                        // perhitungan jumlah 


                                        $mo4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = 311";
                                        $mi4 = $this->db->query($mo4)->row_array();
                                        $mn4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = 311")->num_rows();
                                        // perhitungan jumlah 


                                        $mo5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = 311";
                                        $mi5 = $this->db->query($mo5)->row_array();
                                        $mn5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = 311")->num_rows();
                                        // perhitungan jumlah 

                                        if (($mi1['debet'] + $mi2['debet'] + $mi3['debet'] + $mi4['debet'] + $mi5['debet']) > ($mi1['kredit'] + $mi2['kredit'] + $mi3['kredit'] + $mi4['kredit'] + $mi5['kredit'])) {
                                            $nilai_modal_awal = ($mi1['debet'] + $mi2['debet'] + $mi3['debet'] + $mi4['debet'] + $mi5['debet']) - ($mi1['kredit'] + $mi2['kredit'] + $mi3['kredit'] + $mi4['kredit'] + $mi5['kredit']);
                                        } elseif (($mi1['debet'] + $mi2['debet'] + $mi3['debet'] + $mi4['debet'] + $mi5['debet']) < ($mi1['kredit'] + $mi2['kredit'] + $mi3['kredit'] + $mi4['kredit'] + $mi5['kredit'])) {
                                            $nilai_modal_awal = (($mi1['kredit'] + $mi2['kredit'] + $mi3['kredit'] + $mi4['kredit'] + $mi5['kredit']) - ($mi1['debet'] + $mi2['debet'] + $mi3['debet'] + $mi4['debet'] + $mi5['debet']));
                                        }
                                        echo rupiah($nilai_modal_awal);
                                        ?>
                                    <?php } ?>


                                </td>
                            </tr>
                            <tr>
                                <td>LABA</td>
                                <td>
                                    <?php $laba_rugi = $laba_kotor - $total_beban;
                                    echo rupiah($laba_rugi);  ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Prive</td>
                                <td>


                                    <?php
                                    $pro1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = 312 ";
                                    $pri1 = $this->db->query($pro1)->row_array();
                                    $prn1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = 312")->num_rows();
                                    // perhitungan jumlah 


                                    $pro2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = 312";
                                    $pri2 = $this->db->query($pro2)->row_array();
                                    $prn2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = 312")->num_rows();
                                    // perhitungan jumlah 


                                    $pro3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = 312";
                                    $pri3 = $this->db->query($pro3)->row_array();
                                    $prn3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = 312")->num_rows();
                                    // perhitungan jumlah 


                                    $pro4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = 312";
                                    $pri4 = $this->db->query($pro4)->row_array();
                                    $prn4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = 312")->num_rows();
                                    // perhitungan jumlah 

                                    $pro5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = 312";
                                    $pri5 = $this->db->query($pro5)->row_array();
                                    $prn5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = 312")->num_rows();
                                    // perhitungan jumlah 

                                    if (($pri1['debet'] + $pri2['debet'] + $pri3['debet'] + $pri4['debet'] + $pri5['debet']) > ($pri1['kredit'] + $pri2['kredit'] + $pri3['kredit'] + $pri4['kredit'] + $pri5['kredit'])) {
                                        $prive_laporan = ($pri1['debet'] + $pri2['debet'] + $pri3['debet'] + $pri4['debet'] + $pri5['debet']) - ($pri1['kredit'] + $pri2['kredit'] + $pri3['kredit'] + $pri4['kredit'] + $pri5['kredit']);
                                    } elseif (($pri1['debet'] + $pri2['debet'] + $pri3['debet'] + $pri4['debet'] + $pri5['debet']) < ($pri1['kredit'] + $pri2['kredit'] + $pri3['kredit'] + $pri4['kredit'] + $pri5['kredit'])) {
                                        $prive_laporan = (($pri1['kredit'] + $pri2['kredit'] + $pri3['kredit'] + $pri4['kredit'] + $pri5['kredit']) - ($pri1['debet'] + $pri2['debet'] + $pri3['debet'] + $pri4['debet'] + $pri5['debet']));
                                    } else {
                                        $prive_laporan = 0;
                                    }
                                    echo rupiah($prive_laporan);
                                    ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>PENAMBAHAN MODAL</td>
                                <td></td>
                                <td><?php $penambahan_modal = $laba_rugi - $prive_laporan;
                                    echo rupiah($penambahan_modal); ?></td>
                            </tr>
                            <tr>
                                <td>MODAL AKHIR</td>
                                <td></td>
                                <td><?php $modal_akhir = $nilai_modal_awal + $penambahan_modal;
                                    echo rupiah($modal_akhir); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>

                <div class="col-md-12 text-center">
                    <h5>Toko Norkayati</h5>
                    <h5>Laporan Neraca</h5>
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
                <div class="row">


                    <div class="col-lg-6">
                        <table class="table table-bordered border-dark" style="width:100%" border="1" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead class="text-center">
                                <tr>
                                    <th>NO AKUN</th>
                                    <th>NAMA AKUN</th>
                                    <th>DEBET</th>
                                    <th>KREDIT</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($pilihan[0] == 'menu') { ?>

                                <?php } else { ?>

                                <?php } ?>
                                <?php
                                $aktiva = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '1%'")->result();
                                ?>

                                <?php
                                $aktiva_debet = 0;
                                $aktiva_kredit = 0;
                                foreach ($aktiva as $akti) : ?>
                                    <?php
                                    if ($pilihan[0] == 'menu') { ?>
                                        <?php
                                        $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $akti->no_akun ";
                                        $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah
                                        if ($n1 > 0) {
                                            $g1 = $this->db->query($q1)->row_array();
                                        } else {
                                            $g1['debet'] = 0;
                                            $g1['kredit'] = 0;
                                        }
                                        $a = $g1['debet'] + $g1['kredit'];

                                        $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $akti->no_akun";
                                        $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        if ($n2 > 0) {
                                            $g2 = $this->db->query($q2)->row_array();
                                        } else {
                                            $g2['debet'] = 0;
                                            $g2['kredit'] = 0;
                                        }
                                        $b = $g2['debet'] + $g2['kredit'];

                                        $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $akti->no_akun";
                                        $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        if ($n3 > 0) {
                                            $g3 = $this->db->query($q3)->row_array();
                                        } else {
                                            $g3['debet'] = 0;
                                            $g3['kredit'] = 0;
                                        }
                                        $c = $g3['debet'] + $g3['kredit'];

                                        $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $akti->no_akun";
                                        $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        if ($n4 > 0) {
                                            $g4 = $this->db->query($q4)->row_array();
                                        } else {
                                            $g4['debet'] = 0;
                                            $g4['kredit'] = 0;
                                        }
                                        $d = $g4['debet'] + $g4['kredit'];

                                        $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $akti->no_akun";
                                        $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        if ($n5 > 0) {
                                            $g5 = $this->db->query($q5)->row_array();
                                        } else {
                                            $g5['debet'] = 0;
                                            $g5['kredit'] = 0;
                                        }
                                        $e = $g5['debet'] + $g5['kredit'];

                                        $q6 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $akti->no_akun";
                                        $n6 = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        if ($n6 > 0) {
                                            $g6 = $this->db->query($q6)->row_array();
                                        } else {
                                            $g6['debet'] = 0;
                                            $g6['kredit'] = 0;
                                        }
                                        $e = $g5['debet'] + $g5['kredit'];
                                        ?>
                                    <?php } else { ?>
                                        <?php
                                        $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $akti->no_akun ";
                                        $g1 = $this->db->query($q1)->row_array();
                                        $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $a = $g1['debet'] + $g1['kredit'];

                                        $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $akti->no_akun";
                                        $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $akti->no_akun")->num_rows();
                                        $g2 = $this->db->query($q2)->row_array();
                                        // perhitungan jumlah 
                                        $b = $g2['debet'] + $g2['kredit'];

                                        $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $akti->no_akun";
                                        $g3 = $this->db->query($q3)->row_array();
                                        $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $c = $g3['debet'] + $g3['kredit'];

                                        $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $akti->no_akun";
                                        $g4 = $this->db->query($q4)->row_array();
                                        $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $d = $g4['debet'] + $g4['kredit'];

                                        $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $akti->no_akun";
                                        $g5 = $this->db->query($q5)->row_array();
                                        $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $e = $g5['debet'] + $g5['kredit'];

                                        $q6 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE no_akun = $akti->no_akun";
                                        $g6 = $this->db->query($q6)->row_array();
                                        $n6 = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_akun = $akti->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $e = $g5['debet'] + $g5['kredit'];
                                        ?>
                                    <?php } ?>



                                    <tr>
                                        <td><?= $akti->no_akun ?></td>
                                        <td><?= $akti->nama_akun ?></td>

                                        <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                            <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                                <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) ?></td>
                                                <td></td>
                                            <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>

                                                <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet'])) ?></td>
                                                <td></td>
                                            <?php } ?>
                                        <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) + $g6['debet'] < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                            <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                                <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) ?></td>
                                                <td></td>

                                            <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                                <td></td>
                                                <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet'])) ?></td>


                                            <?php } ?>
                                        <?php } else { ?>
                                            <td></td>
                                            <td></td>

                                        <?php } ?>

                                    </tr>

                                    <?php
                                    if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) {
                                        $aktiva_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit']));
                                    } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']  + $g6['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) {
                                        $aktiva_kredit +=   ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']);
                                    }
                                    ?>

                                <?php endforeach; ?>

                                <tr>
                                    <td></td>

                                    <td>Jumlah</td>
                                    <td><?= rupiah($aktiva_debet) ?></td>
                                    <td><?= rupiah($aktiva_kredit)  ?></td>
                                </tr>
                            </tbody>
                        </table>


                    </div>



                    <div class="col-lg-6">
                        <table class="table table-bordered border-dark" style="width:100%" border="1" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead class="text-center">
                                <tr>
                                    <th>NO AKUN</th>
                                    <th>NAMA AKUN</th>
                                    <th>DEBET</th>
                                    <th>KREDIT</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $pasiva = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '2%' OR no_akun LIKE '3%'")->result();
                                ?>
                                <?php
                                $pasiva_debet = 0;
                                $pasiva_kredit = 0;
                                foreach ($pasiva as $pasi) : ?>
                                    <?php if ($pilihan[0] == 'menu') { ?>
                                        <?php
                                        $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun ";
                                        $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah
                                        if ($n1 > 0) {
                                            $g1 = $this->db->query($q1)->row_array();
                                        } else {
                                            $g1['debet'] = 0;
                                            $g1['kredit'] = 0;
                                        }
                                        $a = $g1['debet'] + $g1['kredit'];

                                        $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun";
                                        $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        if ($n2 > 0) {
                                            $g2 = $this->db->query($q2)->row_array();
                                        } else {
                                            $g2['debet'] = 0;
                                            $g2['kredit'] = 0;
                                        }
                                        $b = $g2['debet'] + $g2['kredit'];

                                        $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun";
                                        $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        if ($n3 > 0) {
                                            $g3 = $this->db->query($q3)->row_array();
                                        } else {
                                            $g3['debet'] = 0;
                                            $g3['kredit'] = 0;
                                        }
                                        $c = $g3['debet'] + $g3['kredit'];

                                        $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun";
                                        $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        if ($n4 > 0) {
                                            $g4 = $this->db->query($q4)->row_array();
                                        } else {
                                            $g4['debet'] = 0;
                                            $g4['kredit'] = 0;
                                        }
                                        $d = $g4['debet'] + $g4['kredit'];

                                        $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun";
                                        $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        if ($n5 > 0) {
                                            $g5 = $this->db->query($q5)->row_array();
                                        } else {
                                            $g5['debet'] = 0;
                                            $g5['kredit'] = 0;
                                        }
                                        $e = $g5['debet'] + $g5['kredit'];

                                        $q6 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun";
                                        $n6 = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        if ($n6 > 0) {
                                            $g6 = $this->db->query($q6)->row_array();
                                        } else {
                                            $g6['debet'] = 0;
                                            $g6['kredit'] = 0;
                                        }
                                        $e = $g5['debet'] + $g5['kredit'];
                                        ?>
                                    <?php } else { ?>
                                        <?php
                                        $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $pasi->no_akun ";
                                        $g1 = $this->db->query($q1)->row_array();
                                        $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $a = $g1['debet'] + $g1['kredit'];

                                        $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $pasi->no_akun";
                                        $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $pasi->no_akun")->num_rows();
                                        $g2 = $this->db->query($q2)->row_array();
                                        // perhitungan jumlah 
                                        $b = $g2['debet'] + $g2['kredit'];

                                        $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $pasi->no_akun";
                                        $g3 = $this->db->query($q3)->row_array();
                                        $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $c = $g3['debet'] + $g3['kredit'];

                                        $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $pasi->no_akun";
                                        $g4 = $this->db->query($q4)->row_array();
                                        $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $d = $g4['debet'] + $g4['kredit'];

                                        $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $pasi->no_akun";
                                        $g5 = $this->db->query($q5)->row_array();
                                        $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $e = $g5['debet'] + $g5['kredit'];

                                        $q6 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE no_akun = $pasi->no_akun";
                                        $g6 = $this->db->query($q6)->row_array();
                                        $n6 = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_akun = $pasi->no_akun")->num_rows();
                                        // perhitungan jumlah 
                                        $e = $g5['debet'] + $g5['kredit'];
                                        ?>
                                    <?php } ?>
                                    <?php
                                    if ($pasi->no_akun == 311) { ?>

                                        <tr>
                                            <td><?= $pasi->no_akun ?></td>
                                            <td><?= $pasi->nama_akun ?></td>

                                            <td></td>
                                            <td><?= rupiah($modal_akhir) ?></td>

                                        </tr>

                                    <?php } else { ?>

                                        <tr>
                                            <td><?= $pasi->no_akun ?></td>
                                            <td><?= $pasi->nama_akun ?></td>

                                            <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                                    <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) ?></td>
                                                    <td></td>
                                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                                    <td></td>
                                                    <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet'])) ?></td>

                                                <?php } ?>
                                            <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) + $g6['debet'] < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                                <?php if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                                    <td><?= rupiah(($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) ?></td>
                                                    <td></td>
                                                <?php } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit'])) { ?>
                                                    <td></td>
                                                    <td><?= rupiah(($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'] + $g6['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet'] + $g6['debet'])) ?></td>


                                                <?php } ?>
                                            <?php } else { ?>
                                                <td></td>
                                                <td></td>
                                            <?php } ?>

                                        </tr>
                                    <?php }
                                    ?>


                                    <?php
                                    if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                        $pasiva_debet += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']));
                                    } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                        $pasiva_kredit +=   ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']);
                                    }
                                    ?>
                                <?php endforeach; ?>


                                <tr>
                                    <td></td>

                                    <td>Jumlah</td>
                                    <?php
                                    $pasivan = $this->db->query("SELECT * FROM akun WHERE no_akun LIKE '2%' OR no_akun LIKE '3%' AND no_akun != 311")->result();
                                    ?>
                                    <?php
                                    $pasiva_debetn = 0;
                                    $pasiva_kreditn = 0;
                                    foreach ($pasivan as $pasi) : ?>
                                        <?php if ($pilihan[0] == 'menu') { ?>
                                            <?php
                                            $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun ";
                                            $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah
                                            if ($n1 > 0) {
                                                $g1 = $this->db->query($q1)->row_array();
                                            } else {
                                                $g1['debet'] = 0;
                                                $g1['kredit'] = 0;
                                            }
                                            $a = $g1['debet'] + $g1['kredit'];

                                            $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun";
                                            $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah 
                                            if ($n2 > 0) {
                                                $g2 = $this->db->query($q2)->row_array();
                                            } else {
                                                $g2['debet'] = 0;
                                                $g2['kredit'] = 0;
                                            }
                                            $b = $g2['debet'] + $g2['kredit'];

                                            $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun";
                                            $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah 
                                            if ($n3 > 0) {
                                                $g3 = $this->db->query($q3)->row_array();
                                            } else {
                                                $g3['debet'] = 0;
                                                $g3['kredit'] = 0;
                                            }
                                            $c = $g3['debet'] + $g3['kredit'];

                                            $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun";
                                            $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah 
                                            if ($n4 > 0) {
                                                $g4 = $this->db->query($q4)->row_array();
                                            } else {
                                                $g4['debet'] = 0;
                                                $g4['kredit'] = 0;
                                            }
                                            $d = $g4['debet'] + $g4['kredit'];

                                            $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun";
                                            $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah 
                                            if ($n5 > 0) {
                                                $g5 = $this->db->query($q5)->row_array();
                                            } else {
                                                $g5['debet'] = 0;
                                                $g5['kredit'] = 0;
                                            }
                                            $e = $g5['debet'] + $g5['kredit'];

                                            $q6 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE  MONTH(tanggal) <= $bulan_pilih[0] AND YEAR(tanggal) = $tahun_pilih[0] AND  no_akun = $pasi->no_akun";
                                            $n6 = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah 
                                            if ($n6 > 0) {
                                                $g6 = $this->db->query($q6)->row_array();
                                            } else {
                                                $g6['debet'] = 0;
                                                $g6['kredit'] = 0;
                                            }
                                            $e = $g5['debet'] + $g5['kredit'];
                                            ?>
                                        <?php } else { ?>
                                            <?php
                                            $q1 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE no_akun = $pasi->no_akun ";
                                            $g1 = $this->db->query($q1)->row_array();
                                            $n1 = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah 
                                            $a = $g1['debet'] + $g1['kredit'];

                                            $q2 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE no_akun = $pasi->no_akun";
                                            $n2 = $this->db->query("SELECT * FROM jurnal_pengeluaran_kas WHERE no_akun = $pasi->no_akun")->num_rows();
                                            $g2 = $this->db->query($q2)->row_array();
                                            // perhitungan jumlah 
                                            $b = $g2['debet'] + $g2['kredit'];

                                            $q3 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pembelian WHERE no_akun = $pasi->no_akun";
                                            $g3 = $this->db->query($q3)->row_array();
                                            $n3 = $this->db->query("SELECT * FROM jurnal_pembelian WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah 
                                            $c = $g3['debet'] + $g3['kredit'];

                                            $q4 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penjualan WHERE no_akun = $pasi->no_akun";
                                            $g4 = $this->db->query($q4)->row_array();
                                            $n4 = $this->db->query("SELECT * FROM jurnal_penjualan WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah 
                                            $d = $g4['debet'] + $g4['kredit'];

                                            $q5 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE no_akun = $pasi->no_akun";
                                            $g5 = $this->db->query($q5)->row_array();
                                            $n5 = $this->db->query("SELECT * FROM jurnal_umum WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah 
                                            $e = $g5['debet'] + $g5['kredit'];

                                            $q6 = "SELECT tanggal,  COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penyesuaian WHERE no_akun = $pasi->no_akun";
                                            $g6 = $this->db->query($q6)->row_array();
                                            $n6 = $this->db->query("SELECT * FROM jurnal_penyesuaian WHERE no_akun = $pasi->no_akun")->num_rows();
                                            // perhitungan jumlah 
                                            $e = $g5['debet'] + $g5['kredit'];
                                            ?>
                                        <?php } ?>





                                        <?php
                                        if (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) > ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                            $pasiva_debetn += (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) - ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']));
                                        } elseif (($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']) < ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit'])) {
                                            $pasiva_kreditn +=   ($g1['kredit'] + $g2['kredit'] + $g3['kredit'] + $g4['kredit'] + $g5['kredit']) - ($g1['debet'] + $g2['debet'] + $g3['debet'] + $g4['debet'] + $g5['debet']);
                                        }
                                        ?>
                                    <?php endforeach; ?>



                                    <td><?= rupiah($pasiva_debetn) ?></td>
                                    <td><?= rupiah($pasiva_kreditn + $modal_akhir) ?></td>
                                </tr>


                            </tbody>
                        </table>


                    </div>
                </div>
            </div>



        </div>
    </div>

    </div>
    <script>
        window.print()
    </script>

</body>

</html>