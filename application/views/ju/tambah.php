<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Data Jurnal Umum</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php
                        if ($pilihan[0] == 'menu') { ?>
                            <form class="bg-white pd-20" action="<?= base_url('pilihan/ju/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form class="bg-white pd-20" action="<?= base_url('jurnal/ju/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                                <?php } ?>

                                <!-- penjualan -->
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">pilih</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="custom-select col-12" id="kategori_ju">
                                            <?php if ($this->session->userdata('hakakses') == 3) { ?>

                                                <option value="retur_penjualan">Retur Penjualan</option>
                                            <?php } else { ?>

                                                <option value="retur_penjualan">Retur Penjualan</option>
                                                <option value="utang_dagang">Utang Dagang</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">

                                        <input class="form-control" type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>" required>
                                        <?php
                                        if ($pilihan[0] == 'menu') { ?>
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

                                    </div>
                                </div>

                                <div id="juapp">

                                </div>


                                <div class="utg">
                                    <div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Retur Penjualan</label>
                                        <div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required><input class='form-control' type='number' id='ju_ret_penj' name='debet2' placeholder='Jumlah' required></div>
                                    </div>
                                    <div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun Piutang Dagang</label>
                                        <div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun_piutang_dagang2' id='id_piutang'><?php foreach ($piutang_dagang as $piutang) : ?><option value='<?= $piutang->id_piutang_dagang ?>'> <?= $piutang->nama_piutang_dagang ?></option><?php endforeach; ?></select></div>
                                    </div>
                                    <div class='form-group row pemb'><label class='col-sm-12 col-md-2 col-form-label'>Piutang Dagang</label>
                                        <div class='col-sm-12 col-md-10'><input class='form-control' type='number' id='ju_piu' name='kredit2' placeholder='Jumlah' required></div>
                                    </div>
                                </div>




                                <!-- 
                                <div class='form-group row utg'>
                                    <label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label>
                                    <div class='col-sm-12 col-md-10'>
                                        <select class='custom-select col-12' name='id_akun_piutang_dagang2' id='id_utang' required>
                                            <?php foreach ($utang_dagang as $utang) : ?>
                                                <option value='<?= $utang->id_utang_dagang ?>'> <?= $utang->nama_utang_dagang ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row utg">
                                    <label class="col-sm-12 col-md-2 col-form-label">Utang Dagang</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="1" required>
                                        <input class="form-control" type="number" id="ju_utang1" name="debet1" placeholder="Jumlah penjualan" required>
                                    </div>
                                </div>
                                <div class="form-group row utg">
                                    <label class="col-sm-12 col-md-2 col-form-label">Retur Pembelian</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="number" id="ju_retur_pem" name="kredit1" placeholder="Jumlah" required>
                                    </div>
                                </div> -->


                                <script>
                                    // $("#ju_utang1").keydown(function() {
                                    //     var jumlah = $(this).val();
                                    //     $("#ju_retur_pem").val(jumlah);
                                    // });
                                    // $("#ju_utang1").keyup(function() {
                                    //     var jumlah = $(this).val();
                                    //     $("#ju_retur_pem").val(jumlah);
                                    // });

                                    $("#ju_ret_penj").keydown(function() {
                                        var jumlah = $(this).val();
                                        $("#ju_piu").val(jumlah);
                                    });
                                    $("#ju_ret_penj").keyup(function() {
                                        var jumlah = $(this).val();
                                        $("#ju_piu").val(jumlah);
                                    });
                                </script>
                                <!-- <div class="form-group row ">
                                <label class="col-sm-12 col-md-2 col-form-label">Retur Penjualan</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="hidden" name="pil" value="2" required>
                                    <input class="form-control" type="number" id="ju_retur_penjualan" name="debet2" placeholder="Jumlah" required>
                                </div>
                            </div>

                            <div class='form-group row'>
                                <label class='col-sm-12 col-md-2 col-form-label'>Akun Piutang Dagang</label>
                                <div class='col-sm-12 col-md-10'>
                                    <select class='custom-select col-12' name='no_akun_piutang_dagang' id='id_piutang'>
                                        <?php foreach ($piutang_dagang as $piutang) : ?>
                                            <option value='<?= $piutang->id_piutang_dagang ?>'> <?= $piutang->nama_piutang_dagang ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row pemb">
                                <label class="col-sm-12 col-md-2 col-form-label">Piutang Dagang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="hidden" name="no_akun_piutang_dagang" required>
                                    <input class="form-control" type="number" id="ju_piutang" name="kredit2" placeholder="Jumlah" required>
                                </div>
                            </div> -->

                                <!-- piutang dagang -->
                                <!-- <div class="form-group row penj">
                                <label class="col-sm-12 col-md-2 col-form-label">Penjualan</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="hidden" name="pil" value="2" required>
                                    <input class="form-control" type="hidden" name="no_akun_piutang_dagang" required>
                                    <input class="form-control" type="number" id="ju_piutang" name="kredit2" placeholder="Jumlah piutang dagang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">syarat</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="syarat2" id="ju_syarat">
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
                                    <input class="form-control" type="number" id="ju_potpenj" name="debet2" placeholder="Jumlah Kas Masuk" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">KAS</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="hidden" name="no_akun_kas2" required>
                                    <input class="form-control" id="ju_kas" type="number" name="debet2" placeholder="Jumlah Kas Masuk" required>
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


                                <!-- <div class="form-group row ju">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama ju</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama_ju" placeholder="Isi Nama ju" required>
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