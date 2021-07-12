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
                            <form class="bg-white pd-20" action="<?= base_url('pilihan/jj/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form class="bg-white pd-20" action="<?= base_url('jurnal/jj/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                                <?php } ?>

                                <!-- penjualan -->
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>" required>
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
                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">No Faktur</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="number" id="jj_no_faktur" name="no_faktur" placeholder="Tulis No Faktur" required>
                                    </div>
                                </div>
                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">Penjualan (K)</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="number" id="jj_jual" name="kredit" placeholder="Jumlah penjualan" required>
                                    </div>
                                </div>

                                <div class='form-group row'>
                                    <label class='col-sm-12 col-md-2 col-form-label'>Akun Piutang Dagang</label>
                                    <div class='col-sm-12 col-md-10'>
                                        <select class='custom-select col-12' name='id_akun_piutang_dagang' id='id_piutang'>
                                            <?php foreach ($piutang_dagang as $piutang) : ?>
                                                <option value='<?= $piutang->id_piutang_dagang ?>'> <?= $piutang->nama_piutang_dagang ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">Piutang Dagang (D)</label>
                                    <div class="col-sm-12 col-md-10">

                                        <input class="form-control" type="number" id="jj_piutang" name="debet" placeholder="Jumlah" required>
                                    </div>
                                </div>

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