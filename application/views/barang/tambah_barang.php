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
                        <form class="bg-white pd-20" action="<?= base_url('pemilik/barang/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Kode Barang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="kode_barang" placeholder="kode barang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama_barang" placeholder="Nama Panjang barang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama Singkat barang</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama_singkat" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Jumlah Stok Baru</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" name="jumlah_stok" type="number" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">untuk</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="untuk">
                                        <option value="Lainnya">Lainnya</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                        <option value="Anak">Anak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Jenis Barang</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="jenis_barang">
                                        <?php foreach ($kategori as $kat) : ?>
                                            <option value="<?= $kat ?>"><?= $kat ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Status Jual</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="custom-select col-12" name="status_barang">
                                        <option value="ditempat">ditempat</option>
                                        <option value="online">Online</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Gambar</label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="file" name="gambar" class="form-control-file form-control height-auto">
                                </div>
                            </div>
                            <div class="form-group row d-none">
                                <label class="col-sm-12 col-md-2 col-form-label">Id User</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="id_user" value="<?= $this->session->userdata('id_user') ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Waktu Modifikasi</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="date" name="waktu_modifikasi" value="<?= date('Y-m-d') ?>" required>
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