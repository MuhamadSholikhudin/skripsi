<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>

        <!-- <div class="page-title">
            <div class="title_center">

            </div>

        </div> -->

        <div class="clearfix"></div>
        
        
        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Lihat data Barang</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php foreach ($barang as $brg) : ?>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" value="<?= $brg->kode_barang ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" value="<?= $brg->nama_barang ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama Singkat barang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" value="<?= $brg->nama_singkat ?>" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">jpsmlah Stok Baru</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" value="<?= $brg->jpsmlah_stok ?>" type="number" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Status jpsal</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" value="<?= $brg->id_user ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Id User</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="id_user" value="<?= $brg->id_user ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Waktu Modifikasi</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="date" name="waktu_modifikasi" value="<?= $brg->waktu_modifikasi ?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>

                                <div class="col-sm-12 col-md-10">
                                    <img src="<?= base_url('uploads/barang/') . $brg->gambar ?>" alt="" srcset="">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-sm-12 col-md-4 col-form-label">Tekan Kembali -></label>
                                <div class="col-sm-12 col-md-8">
                                    <a href="<?= base_url('pemilik/barang/') ?>" class="btn btn-primary" role="button">Kembali</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>