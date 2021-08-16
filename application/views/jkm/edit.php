<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>

        <!-- <div class="page-title">
            <div class="title_center">
                <h3>Selamat datang, <?= $jkm->no_akun ?></h3>
            </div>
        </div> -->

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
                        <?php
                        if ($pilihan[0] == 'menu') { ?>
                            <form class="bg-white pd-20" action="<?= base_url('pilihan/jkm/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form class="bg-white pd-20" action="<?= base_url('jurnal/jkm/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                                <?php } ?>


                                <!-- <div class="form-group d-none row">
                                <label class="col-sm-12 col-md-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="id_jkm" value="" placeholder="kode barang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">No jkm</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="no_jkm" value="" placeholder="Nama Panjang barang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama jkm</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama_jkm" value="" placeholder="Nama Panjang barang" required>
                                </div>
                            </div> -->

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $jkm->tanggal ?>" required>
                                        <input class="form-control" type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>" required>
                                        <input class='form-control' type='hidden' name='no_transaksi' value='<?= $jkm->no_transaksi ?>' required>
                                    </div>
                                </div>

                                <?php if ($jkm->no_akun == 411) { ?>
                                    <div id='jkmapp1'>
                                        <div class='form-group row penj1'><label class='col-sm-12 col-md-2 col-form-label'>Penjualan</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <input class='form-control' type='hidden' name='pil' value='1' required>
                                                <input class='form-control' type='hidden' name='no_akun_penjualan' value='12' required>
                                                <input class='form-control' type='hidden' name='akun_penjualan' value='<?= $jkm->id_jkm ?>' required>
                                                <input class='form-control' id='jkm_jual' type='number' name='kredit1' placeholder='Jumlah penjualan' value='<?= $jkm->kredit ?>' required>

                                            </div>
                                        </div>
                                        <div class='form-group row penj_kas'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label>
                                            <div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='no_akun_kas' value='1' required>
                                                <?php
                                                $qk = "SELECT * FROM jurnal_penerimaan_kas WHERE no_transaksi = $jkm->no_transaksi AND no_akun = 111";
                                                $gk = $this->db->query($qk)->row_array();
                                                ?>
                                                <input class='form-control' type='hidden' name='akun_kas' value='<?= $gk['id_jkm']; ?>' required>
                                                <input class='form-control' id='jkm_kas' type='text' name='debet1' value='<?= $gk['debet']; ?>' placeholder='Jumlah Kas Masuk' required>
                                            </div>
                                        </div>
                                    </div>

                                <?php } elseif ($jkm->no_akun == 113) { ?>
                                    <!-- <input class='form-control' type='hidden' name='no_transaksi' value='<?= $jkm->no_transaksi ?>' required> -->

                                    <div id='jkmapp2'>
                                        <div class='form-group row'> <label class='col-sm-12 col-md-2 col-form-label'>Piutang Dagang</label>
                                            <div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required>
                                                <!-- <input class='form-control' type='hidden' name='no_akun_piutang_dagang' value='3' required> -->
                                                <input class='form-control' type='number' name='akun_piutang' value='<?= $jkm->id_jkm ?>' required>
                                                <input class='form-control' type='number' id='jkm_piutang' name='kredit2' value='<?= $jkm->kredit ?>' placeholder='Jumlah piutang dagang' required></div>
                                        </div>
                                        <div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun Piutang DAgang</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <select class='custom-select col-12' name='no_akun_piutang_dagang2'>
                                                    <?php foreach ($piutang_dagang as $piutang) : ?>
                                                        <?php if ($piutang->id_piutang_dagang == $jkm->id_piutang_dagang) { ?>
                                                            <option value='<?= $piutang->id_piutang_dagang ?>' selected><?= $piutang->nama_piutang_dagang ?></option>
                                                        <?php } else { ?>
                                                            <option value='<?= $piutang->id_piutang_dagang ?>'><?= $piutang->nama_piutang_dagang ?></option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>syarat</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <select class='custom-select col-12' name='syarat2' id='jkm_syarat2'>
                                                    <option value='1'>-</option>
                                                    <option value='2'>2/10, n/30</option>
                                                    <option value='3'>3/10, n/30</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>Potongan penjualan</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <input class='form-control' type='hidden' name='no_akun_potongan_penjualan2' required>
                                                <?php
                                                $qk1 = "SELECT * FROM jurnal_penerimaan_kas WHERE no_transaksi = $jkm->no_transaksi AND no_akun = 413";
                                                $gp = $this->db->query($qk1)->row_array();
                                                ?>
                                                <input class='form-control' type='number' name='akun_pot_pen' value='<?= $gp['id_jkm']; ?>' required>
                                                <input class='form-control' type='number' id='jkm_potpenj' name='debet2potpenj' value='<?= $gp['debet'] ?>' placeholder='Potongan penjualan' required>
                                            </div>
                                        </div>
                                        <div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <input class='form-control' type='hidden' name='no_akun_kas2' required>
                                                <?php
                                                $qk2 = "SELECT * FROM jurnal_penerimaan_kas WHERE no_transaksi = $jkm->no_transaksi AND no_akun = 111";
                                                $gk2 = $this->db->query($qk2)->row_array();
                                                ?>
                                                <input class='form-control' type='number' name='akun_kas1' value='<?= $gk2['id_jkm']; ?>' required>
                                                <input class='form-control' id='jkm_kas' type='number' name='debet2' value='<?= $gk2['debet'] ?>' placeholder='Jumlah Kas Masuk' required>
                                            </div>
                                        </div>
                                    </div>

                                <?php } else { ?>
                                    <!-- <input class='form-control' type='hidden' name='no_transaksi' value='<?= $jkm->no_transaksi ?>' required> -->

                                    <div id='jkmapp3'>
                                        <div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Pilih Akun Serba Serbi</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <select class='custom-select col-12' name='no_akun'>

                                                    <?php foreach ($akun as $aku) : ?>
                                                        <?php if ($aku->no_akun == $jkm->no_akun) { ?>
                                                            <option value='<?= $aku->no_akun ?>' selected>
                                                                <?= $aku->nama_akun ?>
                                                            </option>
                                                        <?php } else { ?>
                                                            <option value='<?= $aku->no_akun ?>'>
                                                                <?= $aku->nama_akun ?>

                                                            </option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Jumlah Nominal</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <input class='form-control' type='hidden' name='pil' value='3' required>
                                                <input class='form-control' type='hidden' name='akun_serba' value='<?= $jkm->id_jkm ?>' required>
                                                <input class='form-control' id='akun_serba' type='number' name='kredit3' value='<?= $jkm->kredit ?>' placeholder='Jumlah Kas Masuk' required>
                                            </div>
                                        </div>
                                        <div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label>
                                            <div class='col-sm-12 col-md-10'>
                                                <!-- <input class='form-control' type='hidden' name='no_akun_kas3' required> -->
                                                <?php
                                                $qk3 = "SELECT * FROM jurnal_penerimaan_kas WHERE no_transaksi = '$jkm->no_transaksi' AND no_akun = 111";
                                                $gk3 = $this->db->query($qk3)->row_array();
                                                ?>
                                                <input class='form-control' type='hidden' name='akun_kas3' value='<?= $gk3['id_jkm']; ?>' required>
                                                <input class='form-control' id='jkm_kas' type='text' name='debet3' value='<?= $gk3['debet'] ?>' placeholder='Jumlah Kas Masuk' required>
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