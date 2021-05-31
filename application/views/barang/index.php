<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>



        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-primary" href="<?= base_url('pemilik/barang/tambah') ?>" role="button">Tambah Barang</a>
                <a class="btn btn-danger" href="<?= base_url('pemilik/barang/backup') ?>" role="button">Backup Barang</a>
            </div>
            <div class="col-md-8">
                <h3>Data Barang</h3>
            </div>
            <div class="col-md-12 col-sm-12" border="1">
                <table class="display text-dark" style="width:100%" border="1" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                            <th>Harga barang</th>
                            <th>Tempat barang</th>
                            <th>Tanggal Modifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barang as $brg) : ?>
                            <tr role="row" class="odd">
                                <td class="table-plus sorting_1" tabindex="0"><?= $brg->kode_barang ?></td>
                                <td><?= $brg->nama_barang ?></td>
                                <td><?= $brg->jumlah_stok ?></td>
                                <td>
                                    <?php
                                    $hitung_harga = $this->db->query("SELECT id_barang FROM harga_barang WHERE id_barang = $brg->id_barang ");
                                    if ($hitung_harga->num_rows() > 0) { ?>
                                        <a class="btn btn-primary" href="<?= base_url('pemilik/harga_barang/edit/') . $brg->id_barang ?>">
                                            <i class="icon-copy dw dw-check"> </i>Terisi
                                        </a>
                                    <?php } elseif ($hitung_harga->num_rows() < 1) {
                                    ?>
                                        <a class="btn btn-danger" href="<?= base_url('pemilik/harga_barang/tambah/') . $brg->id_barang ?>">
                                            <i class="icon-copy dw dw-pencil"> </i>Isi harga
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td><i class="icon-copy dw dw-check"></i>Tempat barang <i class="icon-copy dw dw-pencil"></i></td>
                                <td><?= $brg->waktu_modifikasi ?></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            <i class="dw dw-more"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                            <a class="dropdown-item" href="<?= base_url('pemilik/barang/lihat/') . $brg->id_barang ?>"><i class="fa fa-eye"></i> Lihat</a>
                                            <a class="dropdown-item" href="<?= base_url('pemilik/barang/edit/') . $brg->id_barang ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a class="dropdown-item" href="<?= base_url('pemilik/barang/hapus/') . $brg->id_barang ?>"><i class="fa fa-trash"></i> Hapus</a>
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