<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>

        <div class="page-title">
            <div class="title_center">
                <h3>Selamat datang, <small> </small></h3>

            </div>

        </div>

        <div class="clearfix"></div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit Data Jurnal Penyesuaian</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php
                        if ($pilihan[0] == 'menu') { ?>
                            <form class="bg-white pd-20" action="<?= base_url('pilihan/jps/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form class="bg-white pd-20" action="<?= base_url('jps/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                                <?php } ?>

                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="date" id="" name="tanggal" value="<?= $jps->tanggal ?>" placeholder="jpsmlah penjpsalan" required>
                                        <input class="form-control" type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>" required>
                                        <input class="form-control" type="hidden" id="" name="no_transaksi" value="<?= $jps->no_transaksi ?>" placeholder="jpsmlah penjpsalan" required>
                                    </div>
                                </div>

                                <?php
                                $akun_pertama = "SELECT * FROM akun WHERE no_akun = $jps->no_akun";
                                $akun_1 = $this->db->query($akun_pertama)->row_array();


                                $akun_kedua = "SELECT * FROM jurnal_penyesuaian WHERE no_transaksi = '$jps->no_transaksi' AND no_akun <> $jps->no_akun";
                                $akun_2 = $this->db->query($akun_kedua)->row_array();
                                $no_akun_2 = $akun_2['no_akun'];
                                $nama_kredit = "SELECT * FROM akun WHERE no_akun = $no_akun_2";
                                $nama_2 = $this->db->query($nama_kredit)->row_array();

                                ?>
                                <div class="form-group row ">
                                    <label class="col-sm-12 col-md-2 col-form-label"><?= $akun_1['nama_akun'] ?>1 </label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="" required>
                                        <input class="form-control" type="hidden" id="id_jps1" name="id_jps1" value="<?= $jps->id_jps ?>" placeholder="jpsmlah" required>
                                        <input class="form-control" type="hidden" id="no_akun1" name="no_akun1" value="<?= $jps->no_akun ?>" placeholder="jpsmlah" required>
                                        <input class="form-control" type="number" id="jumlah1" name="debet1" value="<?= $jps->debet ?>" placeholder="Nominal" required>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <label class="col-sm-12 col-md-2 col-form-label"><?= $nama_2['nama_akun'] ?></label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" id="id_jps2" name="id_jps2" value="<?= $akun_2['id_jps'] ?>" required>
                                        <input class="form-control" type="hidden" id="no_akun2" name="no_akun2" value="<?= $akun_2['no_akun'] ?>" required>
                                        <input class="form-control" type="number" id="jumlah2" name="kredit2" value="<?= $akun_2['kredit'] ?>" placeholder="Nominal" required>
                                    </div>
                                </div>

                                <script>
                                    $("#jumlah1").keydown(function() {
                                        var jumlah1 = $(this).val();
                                        $("#jumlah2").val(jumlah1);
                                    });
                                    $("#jumlah1").keyup(function() {
                                        var jumlah1 = $(this).val();
                                        $("#jumlah2").val(jumlah1);
                                    });
                                </script>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Tekan Simpan Untuk Mengubah -></label>
                                    <div class="col-sm-12 col-md-8">
                                        <button type="submit" class="btn btn-primary" role="button">Simpan</button>
                                    </div>
                                </div>
                                </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>