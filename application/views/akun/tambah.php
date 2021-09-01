<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Data Akun</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form class="bg-white pd-20" action="<?= base_url('akun/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                           
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">No Akun</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="number" name="no_akun" placeholder="Isi Nomer Akun" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama Akun</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama_akun" placeholder="Isi Nama Akun" required>
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