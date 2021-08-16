<div class="right_col  bg-white" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?= base_url('pengguna/tambah') ?>" role="button">Tambah pengguna</a>
            </div>
            <div class="col-md-8">
                <h3>Data pengguna</h3>
            </div>
            <div class="col-md-12 col-sm-12" border="1">
                <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th>NO</th>
                            <th>Nama pengguna</th>
                            <th>Username</th>
                            <th>Bagian</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pengguna as $ak) : ?>
                            <tr role="row" class="odd">
                                <td class="table-plus sorting_1" tabindex="0"><?= $no++ ?></td>
                                <td><?= $ak->nama ?></td>
                                <td><?= $ak->username ?></td>
                                <td>
                                <?php
if($ak->hakakses == 1){
echo 'Pemilik';
}elseif($ak->hakakses == 2){
echo 'Bendahara';
}elseif($ak->hakakses == 3){
echo 'Kasir';
}

?>
                                
                                </td>
                                <td><?= $ak->status ?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('pengguna/lihat/') . $ak->id_pengguna ?>"><i class="fa fa-eye"></i> Lihat</a>
                                            <a class="dropdown-item" href="<?= base_url('pengguna/edit/') . $ak->id_pengguna ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('pengguna/hapus/') . $ak->id_pengguna ?>"><i class="fa fa-trash"></i> Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>