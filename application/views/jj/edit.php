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
                        <h2>Form Edit Data Jurnal Penjualan</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>

                        <?php
                        if ($pilihan[0] == 'menu') { ?>
                            <form class="bg-white pd-20" action="<?= base_url('pilihan/jj/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form class="bg-white pd-20" action="<?= base_url('jurnal/jj/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                                <?php } ?>
                                <!-- penjualan -->
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $jj->tanggal ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">No Faktur</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="number" id="jj_no_faktur" name="no_faktur" value="<?= $jj->no_faktur ?>" placeholder="Tulis No Faktur" required>
                                    </div>
                                </div>
                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">Penjualan (K)</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="no_transaksi" value="<?= $jj->no_transaksi ?>" placeholder="Jumlah penjualan" required>
                                        <input class="form-control" type="hidden" id="jj_id_jj" name="jj_id_jual" value="<?= $jj->id_jj ?>" placeholder="Jumlah penjualan" required>
                                        <input class="form-control" type="number" id="jj_jual" name="kredit" value="<?= $jj->kredit ?>" placeholder="Jumlah penjualan" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">syarat</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="syarat2" id="jj_syarat">
                                        <option value="1">Tidak ada</option>
                                        <option value="2">2/10, n/30</option>
                                        <option value="3">3/10, n/30</option>
                                    </select>
                                </div>
                            </div> -->
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Akun Piutang Dagang</label>
                                    <div class="col-sm-12 col-md-10">
                                        <?php
                                        $fgh = "SELECT * FROM jurnal_penjualan WHERE no_transaksi = '$jj->no_transaksi' AND no_akun = 113";
                                        $jb_1 = $this->db->query($fgh)->row_array();
                                        ?>
                                        <select class="custom-select col-12" name="id_piu" id="id_akun" required>
                                            <?php foreach ($piutang_dagang as $piutang) : ?>
                                                <?php if ($piutang->id_piutang_dagang == $jb_1['id_piutang_dagang']) { ?>
                                                    <option value="<?= $piutang->id_piutang_dagang ?>" selected>
                                                        <?= $piutang->nama_piutang_dagang ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="<?= $piutang->id_piutang_dagang ?>">
                                                        <?= $piutang->nama_piutang_dagang ?>
                                                    </option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">Piutang Dagang (D)</label>
                                    <div class="col-sm-12 col-md-10">
                                        <!-- <input class="form-control" type="hidden" name="id_akun_piutang_dagang" required> -->
                                        <input class="form-control" type="text" name="jj_id_piutang" value="<?= $jb_1['id_jj'] ?>" placeholder="Jumlah" required>
                                        <input class="form-control" type="number" id="jj_piutang" name="debet" value="<?= $jb_1['debet'] ?>" placeholder="Jumlah" required>
                                    </div>
                                </div>

                                <script>
                                    // jurnal penjualan
                                    $("#jj_jual").keydown(function() {
                                        var jumlah = $(this).val();
                                        $("#jj_piutang").val(jumlah);
                                    });
                                    $("#jj_jual").keyup(function() {
                                        var jumlah = $(this).val();
                                        $("#jj_piutang").val(jumlah);
                                    });
                                </script>

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