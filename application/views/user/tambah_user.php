<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>


        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Input Data User</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form class="bg-white pd-20" action="<?= base_url('pemilik/user/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama_lengkap" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Bagian</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="bagian">
                                        <option value="karyawan">karyawan</option>
                                        <option value="pemilik">Pemilik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Status Login</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="status">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non-Aktif">Non-Aktif</option>
                                    </select>
                                </div>
                            </div>

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