<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>


        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Edit User</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <!-- ISI HALAMAN -->
                        <form class="bg-white pd-20" action="<?= base_url('pemilik/user/aksi_edit') ?>" method="POST" enctype="multipart/form-data">
                            <?php foreach ($user as $usr) : ?>
                                <div class="form-group row d-none">
                                    <label class="col-sm-12 col-md-2 col-form-label">id_user</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" name="id_user" value="<?= $usr->id_user ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Username</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" name="username" value="<?= $usr->username ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Password</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" name="password" value="<?= $usr->password ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" name="nama_lengkap" value="<?= $usr->nama_lengkap ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Bagian</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="custom-select col-12" name="bagian">
                                            <?php foreach ($bagian as $bag) : ?>
                                                <?php if ($bag == $usr->bagian) : ?>
                                                    <option value="<?= $bag ?>" selected><?= $bag ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $bag ?>"><?= $bag ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Status Login</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="custom-select col-12" name="status">
                                            <?php foreach ($status as $sta) : ?>
                                                <?php if ($sta == $usr->status) : ?>
                                                    <option value="<?= $sta ?>" selected><?= $sta ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $sta ?>"><?= $sta ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Tekan Simpan Untuk Mengubah -></label>
                                    <div class="col-sm-12 col-md-8">
                                        <button type="submit" class="btn btn-primary" role="button">Simpan</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </form>
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>