<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Data Pengguna</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form class="bg-white pd-20" action="<?= base_url('pengguna/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="nama" value="" placeholder="Nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="username" value="" placeholder="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control" type="text" name="password" value="" placeholder="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label" for="last-name">Hak Akses</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="form-control col-md-6 col-sm-6 " name="hakakses">
                                        <?php foreach ($hakakses as $aka) : ?>
                                            
                                                <option value='<?= $aka ?>'>
                                                    <?php
                                                    if ($aka == 1) {
                                                        echo 'Pemilik';
                                                    } elseif ($aka == 2) {
                                                        echo 'Bendahara';
                                                    } elseif ($aka == 3) {
                                                        echo 'Kasir';
                                                    }
                                                    ?>
                                                </option>
                                            
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label" for="last-name">Status</label>
                                <div class="col-sm-12 col-md-10">
                                    <select class="form-control col-md-6 col-sm-6 " name="status">
                                        <?php foreach ($status as $aka) : ?>
                                            
                                                <option value='<?= $aka ?>'>
                                                    <?= $aka
                                                    ?>
                                                </option>
                                            
                                        <?php endforeach; ?>

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