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
                        <h2>Form Edit Data jkk</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php
                        if ($pilihan[0] == 'menu') { ?>
                            <form class="bg-white pd-20" action="<?= base_url('pilihan/jkk/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form class="bg-white pd-20" action="<?= base_url('jurnal/jkk/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                                <?php } ?>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $jkk->tanggal ?>" required>
                                        <input class="form-control" type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>" required>
                                        <input class='form-control' type='hidden' name='no_transaksi' value='<?= $jkk->no_transaksi ?>' required>
                                    </div>
                                </div>

                                <?php if ($jkk->no_akun == 211) { ?>
                                    <!-- <input class='form-control' type='hidden' name='no_transaksi' value='<?= $jkk->no_transaksi ?>' required>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $jkk->tanggal ?>" required>
                                        </div>
                                    </div> -->
                                    <div id='jkkapp1'>
                                        <div class='form-group row pemb'>
                                            <label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <select class='custom-select col-12' name='id_utang_dagang' id='id_piutang'>
                                                    <?php foreach ($utang_dagang as $utang) : ?>
                                                        <option value='<?= $utang->id_utang_dagang ?>' selected> <?= $utang->nama_utang_dagang ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='form-group row penj1'>
                                            <label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <input class='form-control' type='hidden' name='pil' value='1' required>
                                                <input class='form-control' type='text' name='id_jkk_utang_dagang' value='<?= $jkk->id_jkk ?>' required>
                                                <input class='form-control' type='text' name='id_jkk_akun_utang_dagang' value='<?= $jkk->no_akun ?>' required>
                                                <input class='form-control' id='jkk_utang' type='number' name='debet1' value='<?= $jkk->debet ?>' placeholder='Jumlah utang dagang' required>
                                            </div>
                                        </div>
                                        <div class='form-group row penj_kas'>
                                            <label class='col-sm-12 col-md-2 col-form-label'>KAS</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <?php
                                                $jkk_kas = "SELECT * FROM jurnal_pengeluaran_kas WHERE no_transaksi = $jkk->no_transaksi AND no_akun = 111";
                                                $qjkk_kas = $this->db->query($jkk_kas)->row_array();
                                                ?>
                                                <input class='form-control' type='text' name='id_jkk_kas' value='<?= $qjkk_kas['id_jkk'] ?>' required>
                                                <input class='form-control' type='text' name='id_jkk_akun_kas' value='<?= $qjkk_kas['no_akun'] ?>' required>
                                                <input class='form-control' id='jkk_kas' type='text' name='kredit1' value="<?= $qjkk_kas['kredit'] ?>" placeholder='Jumlah Kas Keluar' required>
                                            </div>
                                        </div>
                                    </div>

                                <?php } elseif ($jkk->no_akun == 511) { ?>
                                    <!-- <input class='form-control' type='hidden' name='no_transaksi' value='<?= $jkk->no_transaksi ?>' required>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $jkk->tanggal ?>" required>
                                        </div>
                                    </div> -->

                                    <div id='jkkapp2'>
                                        <div class='form-group row'>
                                            <label class='col-sm-12 col-md-2 col-form-label'>Pembelian</label>
                                            <div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required>
                                                <input class='form-control' type='hidden' name='id_jkk_pembelian' required>
                                                <input class='form-control' type='hidden' name='id_jkk_akun_pembelian' required>
                                                <input class='form-control' type='number' id='jkk_beli' name='debet2' value='<?= $jkk->debet ?>' placeholder='Jumlah Pembelian' required>
                                            </div>
                                        </div>
                                        <div class='form-group row'>
                                            <label class='col-sm-12 col-md-2 col-form-label'>syarat</label>
                                            <div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='syarat2' id='jkk_syarat'>
                                                    <option value='1'>Tidak ada</option>
                                                    <option value='2'>2/10, n/30</option>
                                                    <option value='3'>3/10, n/30</option>
                                                </select></div>
                                        </div>

                                        <div class='form-group row '>
                                            <label class='col-sm-12 col-md-2 col-form-label'>Potongan pembelian</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <?php
                                                $jkk_potpemb = "SELECT * FROM jurnal_pengeluaran_kas WHERE no_transaksi = $jkk->no_transaksi AND no_akun = 513";
                                                $qjkk_potpemb = $this->db->query($jkk_potpemb)->row_array();
                                                ?>
                                                <input class='form-control' type='text' name='id_jkk_potongan_pembelian' value='<?= $qjkk_potpemb['id_jkk'] ?>' required>
                                                <input class='form-control' type='text' name='id_jkk_akun_potongan_pembelian' value='<?= $qjkk_potpemb['no_akun'] ?>' required>
                                                <input class='form-control' type='text' id='jkk_potpemb' name='kredit2potpemb' value='<?= $qjkk_potpemb['kredit'] ?>' placeholder='Jumlah Kas Masuk' required>
                                            </div>
                                        </div>
                                        <div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label>
                                            <div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='no_akun_kas2' required>
                                                <?php
                                                $jkk_kas = "SELECT * FROM jurnal_pengeluaran_kas WHERE no_transaksi = $jkk->no_transaksi AND no_akun = 111";
                                                $qjkk_kas = $this->db->query($jkk_kas)->row_array();
                                                ?>
                                                <input class='form-control' type='number' name='id_jkk_kas' value='<?= $qjkk_kas['id_jkk'] ?>' placeholder='Jumlah Kas keluar' required>
                                                <input class='form-control' type='number' name='id_jkk_akun_kas' value='<?= $qjkk_kas['no_akun'] ?>' placeholder='Jumlah Kas keluar' required>
                                                <input class='form-control' id='jkk_kas' type='number' name='kredit2' value='<?= $qjkk_kas['kredit'] ?>' placeholder='Jumlah Kas keluar' required>
                                            </div>
                                        </div>
                                    </div>

                                <?php } else { ?>
                                    <!-- <input class='form-control' type='hidden' name='no_transaksi' value='<?= $jkk->no_transaksi ?>' required>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $jkk->tanggal ?>" required>
                                        </div>
                                    </div> -->
                                    <div id='jkkapp3'>
                                        <div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Pilih Akun Serba Serbi</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <select class='custom-select col-12' name='id_jkk_akun_serba' id='no_akun'>
                                                    <?php foreach ($akun as $aku) : ?>
                                                        <?php if ($aku == $jkk->no_akun) { ?>
                                                            <option value='<?= $aku ?>' selected>
                                                                <?php if ($aku == 18) {
                                                                    echo 'Beban sewa';
                                                                } elseif ($aku == 19) {
                                                                    echo 'Beban Iklan';
                                                                } elseif ($aku == 20) {
                                                                    echo 'Beban Gaji';
                                                                } elseif ($aku == 21) {
                                                                    echo 'Beban Macam-macam';
                                                                } ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option value='<?= $aku ?>'>
                                                                <?php if ($aku == 18) {
                                                                    echo 'Beban sewa';
                                                                } elseif ($aku == 19) {
                                                                    echo 'Beban Iklan';
                                                                } elseif ($aku == 20) {
                                                                    echo 'Beban Gaji';
                                                                } elseif ($aku == 21) {
                                                                    echo 'Beban Macam-macam';
                                                                } ?>
                                                            </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='form-group row'>
                                            <label class='col-sm-12 col-md-2 col-form-label'>Akun</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <input class='form-control' type='number' name='pil' value='3' required>
                                                <input class='form-control' type='number' name='id_jkk_serba' value='<?= $jkk->id_jkk ?>' placeholder='Jumlah Kas Masuk' required>
                                                <input class='form-control' id='jkk_akun_serba' type='number' name='debet3' value='<?= $jkk->debet ?>' placeholder='Jumlah Kas Masuk' required>
                                            </div>
                                        </div>
                                        <div class='form-group row'>
                                            <label class='col-sm-12 col-md-2 col-form-label'>KAS</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <?php
                                                $jkk_kas3 = "SELECT * FROM jurnal_pengeluaran_kas WHERE no_transaksi = $jkk->no_transaksi AND no_akun = 111";
                                                $qjkk_kas3 = $this->db->query($jkk_kas3)->row_array();
                                                ?>
                                                <input class='form-control' type='text' name='id_jkk_kas' value='<?= $qjkk_kas3['id_jkk'] ?>' required>
                                                <input class='form-control' type='text' name='id_jkk_akun_kas' value='<?= $qjkk_kas3['no_akun'] ?>' placeholder='Jumlah Kas Masuk' required>
                                                <input class='form-control' id='jkk_kas' type='text' name='kredit3' value='<?= $qjkk_kas3['kredit'] ?>' placeholder='Jumlah Kas Masuk' required>
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