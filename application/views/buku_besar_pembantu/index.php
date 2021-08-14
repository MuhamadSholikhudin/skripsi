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

            <table class="display" width="100%">
                <thead>
                    <tr>
                        <th>No Piutang Dagang</th>
                        <th>Nama Piutang Dagang</th>
                        <th>DEBET</th>
                        <th>KREDIT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($piutang as $piu) : ?>
                        <tr>
                            <td><?= $piu->no_piutang_dagang ?></td>
                            <td><?= $piu->nama_piutang_dagang ?></td>
                            <?php
                            $pjkm = $this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penerimaan_kas WHERE id_piutang_dagang = $piu->id_piutang_dagang")->row();
                            $pjj = $this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_penjualan WHERE id_piutang_dagang = $piu->id_piutang_dagang")->row();
                            $pju = $this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit FROM jurnal_umum WHERE id_piutang_dagang = $piu->id_piutang_dagang")->row();
                            echo $debet = $pjkm->debet + $pjj->debet + $pju->debet;
                            echo $kredit = $pjkm->kredit +  $pjkm->kredit  + $pju->kredit;
                            ?>
                            <?php
                                if (($debet) > ($kredit)){
                                    echo '<td>'. $debet - $kredit.'</td>';
                                    echo '<td> </td>';
                                }elseif(($debet) < ($kredit)){
                                    echo '<td> </td>';
                                echo '<td>' .  $kredit - $debet . '</td>';
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