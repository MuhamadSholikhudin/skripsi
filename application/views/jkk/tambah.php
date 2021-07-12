<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Data Barang</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php
                        if ($pilihan[0] == 'menu') { ?>
                            <form class="bg-white pd-20" action="<?= base_url('pilihan/jkk/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form class="bg-white pd-20" action="<?= base_url('jurnal/jkk/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                                <?php } ?>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Kas Keluar Pada</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="custom-select col-12" name="kategori_jkk" id="kategori_jkk">
                                            <option value="utang_dagang">Utang Dagang</option>
                                            <option value="pembelian">Pembelian</option>
                                            <option value="akun">Akun serba-serbi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <?php if ($pilihan[0] == 'menu') { ?>
                                            <?php
                                            $date = date_create("$tahun_pilih[0]-$bulan_pilih[0]-15");
                                            $date_pilih = date_format($date, "Y-m-d");
                                            ?>
                                            <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $date_pilih ?>" required>
                                            <input class="form-control" type="hidden" name="bulan_pilih" value="<?= $bulan_pilih[0] ?>" required>
                                            <input class="form-control" type="hidden" name="tahun_pilih" value="<?= $tahun_pilih[0] ?>" required>

                                        <?php } else { ?>
                                            <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>" required>

                                        <?php }
                                        ?>
                                        <input class="form-control" type="text" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>" required>

                                        <!-- <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>" required> -->
                                    </div>
                                </div>
                                <div id="piljkk">



                                </div>

                                <!-- Utang Dagang-->
                                <div class='form-group row pemb'><label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label>
                                    <div class='col-sm-12 col-md-10'>
                                        <select class='custom-select col-12' name='id_akun_utang_dagang' id='id_utang'>
                                            <?php foreach ($utang_dagang as $utang) : ?>
                                                <option value='<?= $utang->id_utang_dagang ?>'> <?= $utang->nama_utang_dagang ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">Utang Dagang</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="1" required>
                                        <input class="form-control" type="hidden" name="akun_utang_dagang" required>
                                        <input class="form-control" type="number" id="jkk_utang" name="debet1" placeholder="Jumlah penjualan" required>
                                    </div>
                                </div>
                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">KAS</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="no_akun_kas" required>
                                        <input class="form-control" type="number" id="jkk_kas" name="kredit1" placeholder="Jumlah Kas Masuk" required>
                                    </div>
                                </div>

                                <!-- piutang dagang -->
                                <!-- <div class="form-group row penj">
                                <label class="col-sm-12 col-md-2 col-form-label">Penjualan</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="hidden" name="pil" value="2" required>
                                    <input class="form-control" type="hidden" name="no_akun_piutang_dagang" required>
                                    <input class="form-control" type="number" id="jkm_piutang" name="kredit2" placeholder="Jumlah piutang dagang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">syarat</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="syarat2" id="jkm_syarat">
                                        <option value="1">Tidak ada</option>
                                        <option value="2">2/10, n/30</option>
                                        <option value="3">3/10, n/30</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-12 col-md-2 col-form-label">Potongan penjualan</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="hidden" name="no_akun_potongan_penjualan2" required>
                                    <input class="form-control" type="number" id="jkm_potpenj" name="debet2" placeholder="Jumlah Kas Masuk" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">KAS</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="hidden" name="no_akun_kas2" required>
                                    <input class="form-control" id="jkm_kas" type="number" name="debet2" placeholder="Jumlah Kas Masuk" required>
                                </div>
                            </div> -->


                                <!-- Akun serba-serbi -->
                                <!-- <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Pilih Akun Serba Serbi</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="syarat" id="syarat">
                                        <option value="0">Tidak ada</option>
                                        <option value="0.02">2/10, n/30</option>
                                        <option value="0.03">3/10, n/30</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row penj">
                                <label class="col-sm-12 col-md-2 col-form-label">KAS</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="hidden" name="no_akun_pil3" required>
                                    <input class="form-control" type="text" name="kredit3" placeholder="Jumlah Kas Masuk" required>
                                </div>
                            </div>
                            <div class="form-group row penj">
                                <label class="col-sm-12 col-md-2 col-form-label">KAS</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="hidden" name="no_akun_kas3" required>
                                    <input class="form-control" type="text" name="debet3" placeholder="Jumlah Kas Masuk" required>
                                </div>
                            </div> -->


                                <!-- <div class="form-group row jkm">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama jkm</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama_jkm" placeholder="Isi Nama jkm" required>
                                </div>
                            </div> -->

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Tekan Simpan Untuk Menambahkan -></label>
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