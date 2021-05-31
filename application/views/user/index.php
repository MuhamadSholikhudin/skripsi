<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>


        <div class="clearfix"></div>

        <div class="bg-white p-2">
            <a class="btn btn-primary" href="<?= base_url('pemilik/user/tambah') ?>" role="button">Tambah User</a>
            <h3 class="text-center">Data User</h3>
            <hr>

            <div class="row">
                <div class="col-md-12 col-sm-12 table-responsive" border="1">
                    <table class="display text-dark" id="DataTables_Table_0" border="1">
                        <thead>
                            <tr role="row">
                                <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1" aria-label="Name">Id User</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Username</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Nama</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Bagian</th>
                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Status</th>
                                <th class="datatable-nosort sorting_disabled" rowspan="1" colspan="1" aria-label="Action">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $usr) : ?>
                                <tr role="row" class="odd">
                                    <td class="table-plus sorting_1" tabindex="0"><?= $usr->id_user ?></td>
                                    <td><?= $usr->username ?></td>
                                    <td><?= $usr->nama_lengkap ?></td>
                                    <td><?= $usr->bagian ?></td>
                                    <td><?= $usr->status ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item" href="<?= base_url('pemilik/user/lihat/') . $usr->id_user ?>"><i class="fa fa-eye"></i> Lihat</a>
                                                <a class="dropdown-item" href="<?= base_url('pemilik/user/edit/') . $usr->id_user ?>"><i class="fa fa-edit"></i> Ubah</a>
                                                <a class="dropdown-item" href="<?= base_url('pemilik/user/hapus/') . $usr->id_user ?>"><i class="fa fa-trash"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr role="row" class="even">
                                <td class="table-plus sorting_1" tabindex="0">Gloria F. Mead</td>
                                <td>25</td>
                                <td>Sagittarius</td>
                                <td>Kode Barang</td>
                                <td>Nama Barang</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit</a>
                                            <a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>