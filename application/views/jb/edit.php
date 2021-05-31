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
                        <form class="bg-white pd-20" action="<?= base_url('jurnal/jb/aksi_edit') ?>" method="POST" enctype="multipart/form-data">

                            <?php if ($jb->id_akun == 15) { ?>
                                <input class='form-control' type='hidden' name='no_transaksi' value='<?= $jb->no_transaksi ?>' required>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $jb->tanggal ?>" required>
                                    </div>
                                </div>
                                <div id='jbapp1'>
                                    <div class='form-group row pemb'>
                                        <label class='col-sm-12 col-md-2 col-form-label'>No Faktur</label>
                                        <div class='col-sm-12 col-md-10'>
                                            <input class='form-control' type='text' id='jb_faktur' name='no_faktur' value='<?= $jb->no_faktur ?>' placeholder='Tulis faktur Pembelian' required>
                                        </div>
                                    </div>
                                    <div class='form-group row penj1'>
                                        <label class='col-sm-12 col-md-2 col-form-label'>Pembelian</label>
                                        <div class='col-sm-12 col-md-10'>
                                            <input class='form-control' type='hidden' name='pil' value='1' required>
                                            <input class='form-control' type='hidden' name='id_jb_pembelian' value='<?= $jb->id_jb ?>' required>
                                            <input class='form-control' type='hidden' name='id_jb_akun_pembelian' value='<?= $jb->id_akun ?>' required>
                                            <input class='form-control' id='jb_beli' type='number' name='debet1' value='<?= $jb->debet ?>' placeholder='Jumlah Pembelian' required>
                                        </div>
                                    </div>
                                    <div class='form-group row pemb'>
                                        <label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label>
                                        <div class='col-sm-12 col-md-10'>
                                            <?php
                                            $jbutang = "SELECT * FROM jb WHERE no_transaksi = '$jb->no_transaksi' AND id_akun = 8";
                                            $jb_1 = $this->db->query($jbutang)->row_array();
                                            ?>
                                            <select class='custom-select col-12' name='id_utang_dagang' id='id_akun'>
                                                <?php foreach ($utang_dagang as $utang) : ?>
                                                    <?php if ($utang->id_utang_dagang == $jb_1['id_utang_dagang']) { ?>
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
                                    <div class='form-group row penj_kas'>
                                        <label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label>
                                        <div class='col-sm-12 col-md-10'>
                                            <input class='form-control' type='hidden' name='id_jb_utang' value="<?= $jb_1['id_jb']; ?>" required>
                                            <input class='form-control' type='hidden' name='id_jb_akun_utang' value="<?= $jb_1['id_akun']; ?>" required>
                                            <input class='form-control' id='jb_utang' type='number' name='kredit1' value="<?= $jb_1['kredit']; ?>" placeholder='Jumlah Utang Dagang' required></div>
                                    </div>
                                </div>

                            <?php } else { ?>
                                <input class='form-control' type='hidden' name='no_transaksi' value='<?= $jb->no_transaksi ?>' required>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $jb->tanggal ?>" required>
                                    </div>
                                </div>
                                <div id='jbapp2'>
                                    <div class='form-group row '>
                                        <label class='col-sm-12 col-md-2 col-form-label'>No Faktur</label>
                                        <div class='col-sm-12 col-md-10'>
                                            <input class='form-control' type='text' id='jb_faktur' name='no_faktur' value='<?= $jb->no_faktur ?>' placeholder='Tulis faktur Pembelian' required>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label class='col-sm-12 col-md-2 col-form-label'>Pilih Akun Serba Serbi</label>
                                        <div class='col-sm-12 col-md-10'>
                                            <select class='custom-select col-12' name='id_jb_akun_serba_serbi' id='id_akun'>

                                                <?php foreach ($akun as $aku) : ?>
                                                    <?php if ($aku == $jb->id_akun) { ?>
                                                        <option value='<?= $aku ?>' selected>
                                                            <?php if ($aku == 5) {
                                                                echo 'Perlengkapan';
                                                            } elseif ($aku == 6) {
                                                                echo 'Peralatan';
                                                            } ?>
                                                        </option>
                                                    <?php } else { ?>
                                                        <option value='<?= $aku ?>'>
                                                            <?php if ($aku == 5) {
                                                                echo 'Perlengkapan';
                                                            } elseif ($aku == 6) {
                                                                echo 'Peralatan';
                                                            } ?>
                                                        </option>
                                                    <?php } ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label class='col-sm-12 col-md-2 col-form-label'>Nominal Akun</label>
                                        <div class='col-sm-12 col-md-10'>
                                            <input class='form-control' type='hidden' name='pil' value='2' required>
                                            <input class='form-control' type='hidden' name='id_jb_akun' value='<?= $jb->id_jb ?>' required>
                                            <input class='form-control' id='akun_serba' type='text' name='debet2' value='<?= $jb->debet ?>' placeholder='Jumlah' required>
                                        </div>
                                    </div>
                                    <div class='form-group row '>
                                        <label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label>
                                        <div class='col-sm-12 col-md-10'>
                                            <?php
                                            $jbutang2 = "SELECT * FROM jb WHERE no_transaksi = '$jb->no_transaksi' AND id_akun = 8";
                                            $jb_12 = $this->db->query($jbutang2)->row_array();
                                            ?>
                                            <select class='custom-select col-12' name='id__utang' id='id_akun'>
                                                <?php foreach ($utang_dagang as $utang) : ?>
                                                    <?php if ($utang->id_utang_dagang == $jb_12['id_utang_dagang']) { ?>
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
                                    <div class='form-group row'>
                                        <label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label>
                                        <div class='col-sm-12 col-md-10'>
                                            <input class='form-control' type='hidden' name='id_jb_utang_dagang' value='<?= $jb_12['id_jb'] ?>' required>
                                            <input class='form-control' type='hidden' name='id_jb_akun_utang_dagang' value='<?= $jb_12['id_akun'] ?>' required>
                                            <input class='form-control' id='jb_utang' type='text' name='kredit2' value='<?= $jb_12['kredit'] ?>' placeholder='Jumlah Kas Masuk' required>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>


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