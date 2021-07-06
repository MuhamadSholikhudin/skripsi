<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>

        <div class="page-title">
            <div class="title_center">
                <h3>Selamat datang, <?= $this->session->userdata('namalengkap') ?> <small> Bendahara Disdikpora</small></h3>

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
                        <form class="bg-white pd-20" action="<?= base_url('jurnal/ju/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row pemb">
                                <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="date" id="" name="tanggal" value="<?= $ju->tanggal ?>" placeholder="Jumlah penjualan" required>
                                    <input class="form-control" type="hidden" id="" name="no_transaksi" value="<?= $ju->no_transaksi ?>" placeholder="Jumlah penjualan" required>
                                </div>
                            </div>
                            <?php if ($ju->no_akun == 8) { ?>

                                <div class='form-group row'>
                                    <label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label>
                                    <div class='col-sm-12 col-md-10'>

                                        <select class='custom-select col-12' name='id_utang_dagang' id='no_akun'>
                                            <?php foreach ($utang_dagang as $utang) : ?>
                                                <?php if ($utang->id_utang_dagang == $ju->id_utang_dagang) { ?>
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
                                        <input class="form-control" type="number" id="id_ju_utang1" name="id_ju_utang" value="<?= $ju->id_ju ?>" placeholder="Jumlah penjualan" required>
                                        <input class="form-control" type="number" id="id_ju_akun_utang1" name="id_ju_akun_utang1" value="<?= $ju->no_akun ?>" placeholder="Jumlah penjualan" required>
                                        <input class="form-control" type="number" id="ju_ut11" name="debet1" value="<?= $ju->debet ?>" placeholder="Jumlah penjualan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Retur Pembelian</label>
                                    <div class="col-sm-12 col-md-10">
                                        <?php
                                        $juretur = "SELECT * FROM ju WHERE no_transaksi = '$ju->no_transaksi' AND no_akun != 8";
                                        $jure = $this->db->query($juretur)->row_array();
                                        ?>
                                        <input class="form-control" type="number" id="id_ju_retur_pembelian" name="id_ju_retur_pembelian" value="<?= $jure['id_ju'] ?>" placeholder="Jumlah" required>
                                        <input class="form-control" type="number" id="no_akun_pembelian" name="no_akun_returpembelian" value="<?= $jure['no_akun'] ?>" placeholder="Jumlah" required>
                                        <input class="form-control" type="number" id="ju_retur_pem11" name="kredit1" value="<?= $jure['kredit'] ?>" placeholder="Jumlah" required>
                                    </div>
                                </div>

                            <?php } elseif ($ju->no_akun == 13) { ?>
                                <div class="form-group row ">
                                    <label class="col-sm-12 col-md-2 col-form-label">Retur Penjualan</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="2" required>
                                        <input class="form-control" type="number" id="id_ju_retur_penjualan" name="id_ju_retur_penjualan" value="<?= $ju->id_ju ?>" placeholder="Jumlah" required>
                                        <input class="form-control" type="number" id="no_akun_retur_penjualan" name="no_akun_retur_penjualan" value="<?= $ju->no_akun ?>" placeholder="Jumlah" required>
                                        <input class="form-control" type="number" id="ju_retur_penj12" name="debet2" value="<?= $ju->debet ?>" placeholder="Jumlah" required>
                                    </div>
                                </div>

                                <div class='form-group row'>
                                    <label class='col-sm-12 col-md-2 col-form-label'>Akun Piutang Dagang</label>
                                    <div class='col-sm-12 col-md-10'>

                                        <?php
                                        $jupiutang = "SELECT * FROM ju WHERE no_transaksi = '$ju->no_transaksi' AND no_akun != 13";
                                        $ju_1 = $this->db->query($jupiutang)->row_array();
                                        ?>
                                        <select class='custom-select col-12' name='no_akun_piutang_dagang2'>
                                            <?php foreach ($piutang_dagang as $piutang) : ?>
                                                <?php if ($piutang->id_piutang_dagang == $ju_1['id_piutang_dagang']) { ?>
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
                                        <input class="form-control" type="number" name="id_ju_piutang_dagang" value="<?= $ju_1['id_ju'] ?>" required>
                                        <input class="form-control" type="number" name="id_ju_akun_piutang_dagang" value="<?= $ju_1['no_akun'] ?>" required>
                                        <input class="form-control" type="number" id="ju_piutang12" name="kredit2" value="<?= $ju_1['kredit'] ?>" placeholder="Jumlah" required>
                                    </div>
                                </div>
                            <?php } ?>

                            <script>
                                $("#ju_retur_penj").keydown(function() {
                                    var jumlah = $(this).val();
                                    $("#ju_piutang1").val(jumlah);
                                });
                                $("#ju_retur_penj12").keyup(function() {
                                    var jumlah = $(this).val();
                                    $("#ju_piutang12").val(jumlah);
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