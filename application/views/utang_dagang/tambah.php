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
                        <form class="bg-white pd-20" action="<?= base_url('utang_dagang/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                           
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">No utang dagang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="no_utang_dagang" placeholder="Isi Nomer Utang Dagang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama Utang Dagang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama_utang_dagang" placeholder="Isi Nama Utang Dagang" required>
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