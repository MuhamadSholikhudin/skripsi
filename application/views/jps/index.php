<div class="right_col bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?= base_url('jps/tambah') ?>" role="button">Tambah jps</a>
            </div>
            <br>
            <div class="col-md-12 text-center">
                <h5>Toko Norkayati</h5>
                <h5>jpsrnal Umum</h5>
                <h5>Periode <?= date('m-Y') ?> </h5>
            </div>

            <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead class="text-center">
                    <tr>
                        <th>Tanggal</th>
                        <th colspan="2">Akun</th>
                        <th>Ref</th>
                        <th>DEBET</th>
                        <th>KREDIT</th>
                        <th>Aksi</th>

                    </tr>

                </thead>
                <tbody>
                    <?php foreach ($jps as $ak) : ?>

                        <tr>
                            <td><?= $ak->tanggal ?></td>
                            <td>
                                <?php
                                $qq = "SELECT  akun.nama_akun as nama_akun FROM jps JOIN akun ON jps.no_akun = akun.no_akun  WHERE jps.no_transaksi = '$ak->no_transaksi' ";
                                $gg = $this->db->query($qq)->row_array();
                                echo $gg['nama_akun'];
                                ?>
                            </td>
                            <td></td>

                            <td></td>
                            <td><?= rupiah($ak->debet) ?></td>
                            <td></td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="<?= base_url('jps/edit/') . $ak->no_transaksi ?>"><i class="fa fa-edit"></i> Ubah</a>
                                        <a class="dropdown-item" href="<?= base_url('jps/hapus/') . $ak->no_transaksi ?>"><i class="fa fa-trash"></i> Hapus</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><?php
                                $q2 = "SELECT  jps.kredit, akun.nama_akun as nama_akun FROM jps JOIN akun ON jps.no_akun = akun.no_akun  WHERE jps.no_transaksi = '$ak->no_transaksi' AND jps.no_akun != $ak->no_akun";
                                $g2 = $this->db->query($q2)->row_array();

                                ?>
                                <?= $g2['nama_akun']; ?></td>
                            <td></td>


                            <td></td>
                            <td><?= rupiah($g2['kredit']) ?></td>
                            <td>

                            </td>
                        </tr>

                        
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <?php
                            $qk = "SELECT SUM(debet) as total_debet, SUM(kredit) as total_kredit FROM jps ";
                            $gk = $this->db->query($qk)->row_array();
                            echo rupiah($gk['total_debet']);
                            ?>
                        </td>
                        <td>
                            <?php

                            echo rupiah($gk['total_kredit']);
                            ?>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>