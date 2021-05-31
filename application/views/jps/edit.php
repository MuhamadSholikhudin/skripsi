<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>

        <div class="page-title">
            <div class="title_center">
                <h3>Selamat datang,  <small> Bendahara Disdikpora</small></h3>

            </div>

        </div>

        <div class="clearfix"></div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit Data jkm</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form class="bg-white pd-20" action="<?= base_url('jpsrnal/jps/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row pemb">
                                <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="date" id="" name="tanggal" value="<?= $jps->tanggal ?>" placeholder="jpsmlah penjpsalan" required>
                                    <input class="form-control" type="hidden" id="" name="no_transaksi" value="<?= $jps->no_transaksi ?>" placeholder="jpsmlah penjpsalan" required>
                                </div>
                            </div>
                            <?php if ($jps->id_akun == 8) { ?>

                                <div class='form-group row'>
                                    <label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label>
                                    <div class='col-sm-12 col-md-10'>

                                        <select class='custom-select col-12' name='id_utang_dagang' id='id_akun'>
                                            <?php foreach ($utang_dagang as $utang) : ?>
                                                <?php if ($utang->id_utang_dagang == $jps->id_utang_dagang) { ?>
                                                    <option value='<?= $utang->id_utang_dagang ?>' selected>
                                                        <?= $utang->nama_utang_dagang ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value='<?= $utang->id_utang_dagang ?>'>
                                                        <?= $utang->nama_utang_dagang ?>
                                                    </option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Utang Dagang</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="1" required>
                                        <input class="form-control" type="number" id="id_jps_utang1" name="id_jps_utang" value="<?= $jps->id_jps ?>" placeholder="jpsmlah penjpsalan" required>
                                        <input class="form-control" type="number" id="id_jps_akun_utang1" name="id_jps_akun_utang1" value="<?= $jps->id_akun ?>" placeholder="jpsmlah penjpsalan" required>
                                        <input class="form-control" type="number" id="jps_ut11" name="debet1" value="<?= $jps->debet ?>" placeholder="jpsmlah penjpsalan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Retur Pembelian</label>
                                    <div class="col-sm-12 col-md-10">
                                        <?php
                                        $jpsretur = "SELECT * FROM jps WHERE no_transaksi = '$jps->no_transaksi' AND id_akun != 8";
                                        $jpsre = $this->db->query($jpsretur)->row_array();
                                        ?>
                                        <input class="form-control" type="number" id="id_jps_retur_pembelian" name="id_jps_retur_pembelian" value="<?= $jpsre['id_jps'] ?>" placeholder="jpsmlah" required>
                                        <input class="form-control" type="number" id="id_akun_pembelian" name="id_akun_returpembelian" value="<?= $jpsre['id_akun'] ?>" placeholder="jpsmlah" required>
                                        <input class="form-control" type="number" id="jps_retur_pem11" name="kredit1" value="<?= $jpsre['kredit'] ?>" placeholder="jpsmlah" required>
                                    </div>
                                </div>

                            <?php } elseif ($jps->id_akun == 13) { ?>
                                <div class="form-group row ">
                                    <label class="col-sm-12 col-md-2 col-form-label">Retur Penjpsalan</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="2" required>
                                        <input class="form-control" type="number" id="id_jps_retur_penjpsalan" name="id_jps_retur_penjpsalan" value="<?= $jps->id_jps ?>" placeholder="jpsmlah" required>
                                        <input class="form-control" type="number" id="id_akun_retur_penjpsalan" name="id_akun_retur_penjpsalan" value="<?= $jps->id_akun ?>" placeholder="jpsmlah" required>
                                        <input class="form-control" type="number" id="jps_retur_penj12" name="debet2" value="<?= $jps->debet ?>" placeholder="jpsmlah" required>
                                    </div>
                                </div>

                                <div class='form-group row'>
                                    <label class='col-sm-12 col-md-2 col-form-label'>Akun Piutang Dagang</label>
                                    <div class='col-sm-12 col-md-10'>

                                        <?php
                                        $jpspiutang = "SELECT * FROM jps WHERE no_transaksi = '$jps->no_transaksi' AND id_akun != 13";
                                        $jps_1 = $this->db->query($jpspiutang)->row_array();
                                        ?>
                                        <select class='custom-select col-12' name='id_akun_piutang_dagang2'>
                                            <?php foreach ($piutang_dagang as $piutang) : ?>
                                                <?php if ($piutang->id_piutang_dagang == $jps_1['id_piutang_dagang']) { ?>
                                                    <option value='<?= $piutang->id_piutang_dagang ?>' selected><?= $piutang->nama_piutang_dagang ?></option>
                                                <?php } else { ?>
                                                    <option value='<?= $piutang->id_piutang_dagang ?>'><?= $piutang->nama_piutang_dagang ?></option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-12 col-md-2 col-form-label">Piutang Dagang</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="number" name="id_jps_piutang_dagang" value="<?= $jps_1['id_jps'] ?>" required>
                                        <input class="form-control" type="number" name="id_jps_akun_piutang_dagang" value="<?= $jps_1['id_akun'] ?>" required>
                                        <input class="form-control" type="number" id="jps_piutang12" name="kredit2" value="<?= $jps_1['kredit'] ?>" placeholder="jpsmlah" required>
                                    </div>
                                </div>
                            <?php } ?>

                            <script>
                                $("#jps_retur_penj").keydown(function() {
                                    var jpsmlah = $(this).val();
                                    $("#jps_piutang1").val(jpsmlah);
                                });
                                $("#jps_retur_penj12").keyup(function() {
                                    var jpsmlah = $(this).val();
                                    $("#jps_piutang12").val(jpsmlah);
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