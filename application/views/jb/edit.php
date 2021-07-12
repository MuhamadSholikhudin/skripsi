<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>

        <div class="page-title">
            <div class="title_center">
                <h3>Selamat datang, <?= $this->session->userdata('nama') ?> <small> </small></h3>

            </div>

        </div>

        <div class="clearfix"></div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit Data JB</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php
                        if ($pilihan[0] == 'menu') { ?>
                            <form class="bg-white pd-20" action="<?= base_url('pilihan/jb/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form class="bg-white pd-20" action="<?= base_url('jurnal/jb/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                                <?php } ?>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $jb->tanggal ?>" required>
                                        <input class="form-control" type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>" required>
                                        <input class='form-control' type='hidden' name='no_transaksi' value='<?= $jb->no_transaksi ?>' required>

                                    </div>
                                </div>
                                <?php if ($jb->no_akun == 511) { ?>

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
                                                <input class='form-control' type='hidden' name='id_jb_akun_pembelian' value='<?= $jb->no_akun ?>' required>
                                                <input class='form-control' id='jb_beli1' type='number' name='debet1' value='<?= $jb->debet ?>' placeholder='Jumlah Pembelian' required>
                                            </div>
                                        </div>
                                        <div class='form-group row pemb'>
                                            <label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <?php
                                                $jbutang = "SELECT * FROM jurnal_pembelian WHERE no_transaksi = '$jb->no_transaksi' AND no_akun = 211";
                                                $jb_1 = $this->db->query($jbutang)->row_array();
                                                ?>
                                                <select class='custom-select col-12' name='id_utang_dagang' id='no_akun'>
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
                                                <input class='form-control' type='hidden' name='id_jb_akun_utang' value="<?= $jb_1['no_akun']; ?>" required>
                                                <input class='form-control' id='jb_utang1' type='number' name='kredit1' value="<?= $jb_1['kredit']; ?>" placeholder='Jumlah Utang Dagang' required></div>
                                        </div>
                                    </div>
                                    <script>
                                        $("#jb_beli1").keydown(function() {
                                            var jumlah = $(this).val();
                                            $("#jb_utang1").val(jumlah);
                                        });
                                        $("#jb_beli1").keyup(function() {
                                            var jumlah = $(this).val();
                                            $("#jb_utang1").val(jumlah);
                                        });
                                    </script>
                                <?php } else { ?>

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
                                                <select class='custom-select col-12' name='id_jb_akun_serba_serbi' id='no_akun'>

                                                    <?php foreach ($akun as $aku) : ?>
                                                        <?php if ($aku->no_akun == $jb->no_akun) { ?>
                                                            <option value="<?= $aku->no_akun ?>" selected>
                                                                <?= $aku->nama_akun ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option value="<?= $aku->no_akun ?>">
                                                                <?=  $aku->nama_akun ?>
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
                                                <!-- <input class='form-control' type='hidden' name='id_jb_akun_serba_serbi' value='<?= $jb->no_akun ?>' required> -->
                                                <input class='form-control' id='akun_serba' type='text' name='debet2' value='<?= $jb->debet ?>' placeholder='Jumlah' required>
                                            </div>
                                        </div>
                                        <div class='form-group row '>
                                            <label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <?php
                                                $jbutang2 = "SELECT * FROM jurnal_pembelian WHERE no_transaksi = '$jb->no_transaksi' AND no_akun = 211";
                                                $jb_12 = $this->db->query($jbutang2)->row_array();
                                                ?>
                                                <select class='custom-select col-12' name='id__utang' id='no_akun'>
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
                                                <input class='form-control' type='number' name='id_jb_utang_dagang' value='<?= $jb_12['id_jb'] ?>' required>
                                                <input class='form-control' type='number' name='id_jb_akun_utang_dagang' value='<?= $jb_12['no_akun'] ?>' required>
                                                <input class='form-control' id='jb_utang' type='number' name='kredit2' value='<?= $jb_12['kredit'] ?>' placeholder='Jumlah Kas Masuk' required>
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