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


            <?php



            $cars = array(
                array("jurnal_pemasukan_kas", "no_transaksi", "2021-07-08"),
                array("jurnal_pemasukan_kas", "no_transaksi", "2021-07-08"),
                array("jurnal_pemasukan_kas", "no_transaksi", "2021-11-11"),
                array("jurnal_pemasukan_kas", "no_transaksi", "2021-05-08")
            );

            echo "SELECT * FROM " . $cars[0][0] . " WHERE no_transaksi = '" . $cars[0][1] . "' AND tanggal = '" . $cars[0][2] . "'.<br>";
            echo $cars[0][0] . ": In stock: " . $cars[0][1] . ", sold: " . $cars[0][2] . ".<br>";
            echo $cars[1][0] . ": In stock: " . $cars[1][1] . ", sold: " . $cars[1][2] . ".<br>";
            echo $cars[2][0] . ": In stock: " . $cars[2][1] . ", sold: " . $cars[2][2] . ".<br>";
            echo $cars[3][0] . ": In stock: " . $cars[3][1] . ", sold: " . $cars[3][2] . ".<br>";


            $arr = array('2021-07-15', '01-01-2014', '01-01-2015', '09-02-2013', '01-01-2013');
            function date_sort($a, $b)
            {
                return strtotime($a) - strtotime($b);
            }
            usort($arr, "date_sort");


            foreach ($arr as $ra) :
                $jkma = $this->db->query("SELECT * FROM jurnal_penerimaan_kas WHERE tanggal = '$ra' ")->num_rows();
                echo $jkma;
                echo '<br>';
            endforeach;

            $jkms = $this->db->query("SELECT tanggal, no_transaksi FROM jurnal_penerimaan_kas ")->result();

            // foreach($jkms as $hj):
            // echo "array('". $hj->tanggal."', ". "'" . $hj->no_transaksi . "', " . "'" . $hj->debet . "', " . "'" . $hj->kredit . "'), <br>";

            // echo 'aku';
            // endforeach;

            print_r($jkms);
            // $arr = array('Hello', 'World!', 'Beautiful', 'Day!');
            // echo implode(" ", $jkms);

echo '<br>';
            $str = "I am simple boy!";
            print_r(explode(" ", $str));
            
            ?>

            <div class="col-lg-6">
                <h3 class="text-center">Data Piutang Dagang</h3>
                <?php foreach ($piutang as $piu) : ?>
                    <div class="col-md-6 text-left">
                        <strong><?= $piu->nama_piutang_dagang ?></strong>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong> No : <?= $piu->no_piutang_dagang ?> </strong>
                    </div>

                    <table class="display mb-3" width="100%">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>REF</th>
                                <th>DEBET</th>
                                <th>KREDIT</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <?php
                                $pjkm = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_penerimaan_kas WHERE id_piutang_dagang = $piu->id_piutang_dagang")->row();
                                $pjj = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0)  as kredit FROM jurnal_penjualan WHERE id_piutang_dagang = $piu->id_piutang_dagang")->row();
                                $pju = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE id_piutang_dagang = $piu->id_piutang_dagang")->row();
                                $debet = $pjkm->debet + $pjj->debet + $pju->debet;
                                $kredit = $pjkm->kredit +  $pjj->kredit  + $pju->kredit;
                                ?>
                                <?php
                                if (($pjkm->debet + $pjj->debet + $pju->debet) > ($pjkm->kredit +  $pjj->kredit  + $pju->kredit)) { ?>

                                    <td><?= ($pjkm->debet + $pjj->debet + $pju->debet) - ($pjkm->kredit + $pjj->kredit + $pju->kredit) ?> </td>
                                    <td></td>
                                <?php
                                } elseif (($pjkm->debet + $pjj->debet + $pju->debet) < ($pjkm->kredit +  $pjj->kredit  + $pju->kredit)) { ?>
                                    <td></td>
                                    <td><?= ($pjkm->kredit + $pjj->kredit + $pju->kredit) - ($pjkm->debet + $pjj->debet + $pju->debet) ?> </td>

                                <?php
                                }
                                ?>

                            </tr>

                        </tbody>
                    </table>
                <?php endforeach ?>
            </div>


            <div class="col-lg-6">
                <h3 class="text-center">Data Utang Dagang</h3>
                <table class="display" width="100%">
                    <thead>
                        <tr>
                            <th>No Utang Dagang</th>
                            <th>Nama Utang Dagang</th>
                            <th>DEBET</th>
                            <th>KREDIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utang as $piu) : ?>
                            <tr>
                                <td><?= $piu->no_utang_dagang ?></td>
                                <td><?= $piu->nama_utang_dagang ?></td>
                                <?php
                                $pjkk = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_pengeluaran_kas WHERE id_utang_dagang = $piu->id_utang_dagang")->row();
                                $pjb = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0)  as kredit FROM jurnal_pembelian WHERE id_utang_dagang = $piu->id_utang_dagang")->row();
                                $pju = $this->db->query("SELECT COALESCE(SUM(debet), 0) as debet, COALESCE(SUM(kredit), 0) as kredit FROM jurnal_umum WHERE id_utang_dagang = $piu->id_utang_dagang")->row();
                                $debet = $pjkk->debet + $pjb->debet + $pju->debet;
                                $kredit = $pjkk->kredit +  $pjb->kredit  + $pju->kredit;
                                ?>
                                <?php
                                if (($pjkk->debet + $pjb->debet + $pju->debet) > ($pjkk->kredit +  $pjb->kredit  + $pju->kredit)) { ?>

                                    <td><?= ($pjkk->debet + $pjb->debet + $pju->debet) - ($pjkk->kredit + $pjb->kredit + $pju->kredit) ?> </td>
                                    <td></td>
                                <?php
                                } elseif (($pjkk->debet + $pjb->debet + $pju->debet) < ($pjkk->kredit +  $pjb->kredit  + $pju->kredit)) { ?>
                                    <td></td>
                                    <td><?= ($pjkk->kredit + $pjb->kredit + $pju->kredit) - ($pjkk->debet + $pjb->debet + $pju->debet) ?> </td>

                                <?php
                                }
                                ?>
                                <!-- <td>

                                <?= $pjkm->debet ?> /
                                <?= $pjj->debet ?> /
                                <?= $pju->debet ?> /

                            </td>
                            <td>
                                <?= $pjkm->kredit ?> /
                                <?= $pjkm->kredit ?> /
                                <?= $pju->kredit ?> /
                            </td> -->
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>