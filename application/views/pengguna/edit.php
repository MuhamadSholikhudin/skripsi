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
                        <h2>Form Edit Data pengguna</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form class="bg-white pd-20" action="<?= base_url('pengguna/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                            <!-- <div class="form-group d-none row">
                                <label class="col-sm-12 col-md-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="id_pengguna" value="<?= $pengguna->id_pengguna ?>" placeholder="kode barang" required>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">No pengguna</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="id_pengguna" value="<?= $pengguna->id_pengguna ?>" placeholder="Nama Panjang barang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama pengguna</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama" value="<?= $pengguna->nama ?>" placeholder="Nama Panjang barang" required>
                                </div>
                            </div>




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