<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?= base_url('piutang_dagang/tambah') ?>" role="button">Tambah piutang_dagang</a>
            </div>
            <div class="col-md-8">
                <h3>Data piutang_dagang</h3>
            </div>
            <div class="col-md-12 col-sm-12" border="1">
                <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th>Kode piutang_dagang</th>
                            <th>No piutang_dagang</th>
                            <th>Nama piutang_dagang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($piutang_dagang as $ak) : ?>
                            <tr role="row" class="odd">
                                <td class="table-plus sorting_1" tabindex="0"><?= $ak->id_piutang_dagang ?></td>
                                <td><?= $ak->no_piutang_dagang ?></td>
                                <td><?= $ak->nama_piutang_dagang ?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('piutang_dagang/lihat/') . $ak->id_piutang_dagang ?>"><i class="fa fa-eye"></i> Lihat</a>
                                            <a class="dropdown-item" href="<?= base_url('piutang_dagang/edit/') . $ak->id_piutang_dagang ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('piutang_dagang/hapus/') . $ak->id_piutang_dagang ?>"><i class="fa fa-trash"></i> Hapus</a>
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