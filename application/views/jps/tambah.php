<div class="right_col" role="main" style="min-height: 4546px; ">
    <div class>


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah Data Jurnal Penyesuaian</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <?php
                        if ($pilihan[0] == 'menu') { ?>
                            <form class="bg-white pd-20" action="<?= base_url('pilihan/jps/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form class="bg-white pd-20" action="<?= base_url('jps/aksi_tambah') ?>" method="POST" enctype="multipart/form-data">
                                <?php } ?>

                                <!-- penjpsalan -->
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">pilih</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="custom-select col-12" id="jps_kategori">
                                            <option value="jps1">Iktisar laba Rugi</option>
                                            <option value="jps2">PDB (akhir)</option>
                                            <option value="jps3">Beban Gaji</option>
                                            <option value="jps4">Beban Perlengkapan</option>
                                            <option value="jps5">Beban Penyusutan</option>
                                            <option value="jps6">Beban Asuransi</option>
                                            <option value="jps7">Sewa di bayar di Muka</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="id_pengguna" value="<?= $this->session->userdata('id_pengguna') ?>" required>
                                        <?php
                                        if ($pilihan[0] == 'menu') { ?>
                                            <?php
                                            $date = date_create("$tahun_pilih[0]-$bulan_pilih[0]-15");
                                            $date_pilih = date_format($date, "Y-m-d");
                                            ?>
                                            <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= $date_pilih ?>" required>
                                            <input class="form-control" type="hidden" name="bulan_pilih" value="<?= $bulan_pilih[0] ?>" required>
                                            <input class="form-control" type="hidden" name="tahun_pilih" value="<?= $tahun_pilih[0] ?>" required>

                                        <?php } else { ?>
                                            <input class="form-control" type="date" id="tanggal" name="tanggal" value="<?= date('Y-m-d') ?>" required>

                                        <?php }
                                        ?> </div>
                                </div>

                                <div id="jpsapp">

                                </div>



                                <div id="jps1">
                                    <div class="form-group row utg">
                                        <label class="col-sm-12 col-md-2 col-form-label">Ikhtisar Laba Rugi</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="hidden" name="pil" value="1" required>
                                            <input class="form-control" type="number" id="jps_ikhtisar1" name="debet1" placeholder="Ikhtisar Laba Rugi" required>
                                        </div>
                                    </div>
                                    <div class="form-group row utg">
                                        <label class="col-sm-12 col-md-2 col-form-label">PDB (awal)</label>
                                        <div class="col-sm-12 col-md-10">
                                            <input class="form-control" type="number" id="jps_pdb_awal" name="kredit1" placeholder="Persediaan Barang Dagang" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- 
                            <div id="jps2">
                                <div class="form-group row ">
                                    <label class="col-sm-12 col-md-2 col-form-label">PDB (akhir)</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="2" required>
                                        <input class="form-control" type="number" id="jps_pdb_akhir" name="debet2" placeholder="Persediaan Barang Dagang akhir" required>
                                    </div>
                                </div>
                                <div class="form-group row pemb">
                                    <label class="col-sm-12 col-md-2 col-form-label">Ikhtisar Laba Rugi</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="number" id="jps_ikhtisar2" name="kredit2" placeholder="Ikhtisar Laba rugi" required>
                                    </div>
                                </div>
                            </div>

                            <div id="jps3">
                                <div class="form-group row penj">
                                    <label class="col-sm-12 col-md-2 col-form-label">Beban Gaji</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="3" required>
                                        <input class="form-control" type="number" id="jps_beban_gaji" name="debet3" placeholder="Beban Perlengkapan" required>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-12 col-md-2 col-form-label">Utang Gaji</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="number" id="jps_utang_gaji" name="kredet3" placeholder="Perlengkapan" required>
                                    </div>
                                </div>
                            </div>

                            <div id="jps3">
                                <div class="form-group row penj">
                                    <label class="col-sm-12 col-md-2 col-form-label">Beban Perlengkapan</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="3" required>
                                        <input class="form-control" type="number" id="jps_beban_perlengkapan" name="debet3" placeholder="Beban Perlengkapan" required>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-sm-12 col-md-2 col-form-label">Perlengkapan</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="number" id="jps_perlengkapan" name="kredet3" placeholder="Perlengkapan" required>
                                    </div>
                                </div>
                            </div>

                            <div id="jps4">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Beban penyusutan peralatan</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="4" required>
                                        <input class="form-control" id="jps_beban_penyusutan" type="number" name="debet4" placeholder="Beban penyusutan peralatan" required>
                                    </div>
                                </div>
                                <div class="form-group row penj">
                                    <label class="col-sm-12 col-md-2 col-form-label">Akumulasi Peralatan</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" id="jps_akumulasi_peralatan" name="kredit4" placeholder="Akumulasi Peralatan" required>
                                    </div>
                                </div>
                            </div>

                            <div id="jps5">
                                <div class="form-group row penj">
                                    <label class="col-sm-12 col-md-2 col-form-label">Beban Asuransi</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="5" required>
                                        <input class="form-control" type="text" id="jps_beban_asuransi" name="debet5" placeholder="Beban Asuransi" required>
                                    </div>
                                </div>
                                <div class="form-group row jps">
                                    <label class="col-sm-12 col-md-2 col-form-label">Asuransi Di Bayar Di muka</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" id="jps_asuransi_dimuka" name="kredit5" placeholder="Asuransi Di Bayar Di muka" required>
                                    </div>
                                </div>
                            </div>

                            <div id="jps6">
                                <div class="form-group row penj">
                                    <label class="col-sm-12 col-md-2 col-form-label">Beban penyusutan peralatan</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="6" required>
                                        <input class="form-control" type="text" id="jps_bebaN_ass" name="debet6" placeholder="Sewa di bayar di muka" required>
                                    </div>
                                </div>
                                <div class="form-group row jps">
                                    <label class="col-sm-12 col-md-2 col-form-label">Beban sewa</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" id="jps_asuransi_dimuka" name="kredit6" placeholder="Beban sewa" required>
                                    </div>
                                </div>
                            </div>

                            <div id="jps7">
                                <div class="form-group row penj">
                                    <label class="col-sm-12 col-md-2 col-form-label">Sewa di bayar di muka</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="hidden" name="pil" value="7" required>
                                        <input class="form-control" type="text" id="jps_sewa_dimuka" name="debet7" placeholder="Sewa di bayar di muka" required>
                                    </div>
                                </div>
                                <div class="form-group row jps">
                                    <label class="col-sm-12 col-md-2 col-form-label">Beban sewa</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control" type="text" id="jps_beban_sewa" name="kredit7" placeholder="Beban sewa" required>
                                    </div>
                                </div>
                            </div> -->

                                <script>
                                    $("#jps_kategori").change(function() {
                                        var jps_kategori = $(this).val();

                                        if (jps_kategori == 'jps1') {
                                            alert(jps_kategori);
                                            var txt = "<div id='jps1'><div class='form-group row utg'><label class='col-sm-12 col-md-2 col-form-label'>Ikhtisar Laba Rugi</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='1' required><input class='form-control' type='number' id='jps_ikhtisar1' name='debet1' placeholder='Ikhtisar Laba Rugi' required></div></div><div class='form-group row utg'><label class='col-sm-12 col-md-2 col-form-label'>PDB (awal)</label><div class='col-sm-12 col-md-10'><input class='form-control' type='number' id='jps_pdb_awal' name='kredit1' placeholder='Persediaan Barang Dagang' required></div> </div> </div>";

                                            // $("#jps1").remove();
                                            $("#jps2").remove();
                                            $("#jps3").remove();
                                            $("#jps4").remove();
                                            $("#jps5").remove();
                                            $("#jps6").remove();
                                            $("#jps7").remove();
                                            $("#jpsapp").append(txt);

                                            $("#jps_ikhtisar1").keydown(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_pdb_awal").val(jumlah);
                                            });
                                            $("#jps_ikhtisar1").keyup(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_pdb_awal").val(jumlah);
                                            });

                                        } else if (jps_kategori == 'jps2') {
                                            alert(jps_kategori);
                                            var txt = "<div id='jps2'><div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>PDB (akhir)</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required><input class='form-control' type='number' id='jps_pdb_akhir' name='debet2' placeholder='Persediaan Barang Dagang akhir' required></div></div><div class='form-group row pemb'><label class='col-sm-12 col-md-2 col-form-label'>Ikhtisar Laba Rugi</label><div class='col-sm-12 col-md-10'><input class='form-control' type='number' id='jps_ikhtisar2' name='kredit2' placeholder='Ikhtisar Laba rugi' required></div></div></div>";

                                            $("#jps1").remove();
                                            // $("#jps2").remove();
                                            $("#jps3").remove();
                                            $("#jps4").remove();
                                            $("#jps5").remove();
                                            $("#jps6").remove();
                                            $("#jps7").remove();
                                            $("#jpsapp").append(txt);

                                            $("#jps_pdb_akhir").keydown(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_ikhtisar2").val(jumlah);
                                            });
                                            $("#jps_pdb_akhir").keyup(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_ikhtisar2").val(jumlah);
                                            });


                                        } else if (jps_kategori == 'jps3') {
                                            alert(jps_kategori);
                                            var txt = "<div id='jps3'><div class='form-group row penj'><label class='col-sm-12 col-md-2 col-form-label'>Beban Gaji</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='3' required><input class='form-control' type='number' id='jps_bebangaji' name='debet3' placeholder='Beban Gaji' required></div></div><div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>Utang Gaji</label><div class='col-sm-12 col-md-10'><input class='form-control' type='number' id='jps_utanggaji' name='kredit3' placeholder='Utang Gaji' required></div></div></div>";

                                            $("#jps1").remove();
                                            $("#jps2").remove();
                                            // $("#jps3").remove();
                                            $("#jps4").remove();
                                            $("#jps5").remove();
                                            $("#jps6").remove();
                                            $("#jps7").remove();
                                            $("#jpsapp").append(txt);

                                            $("#jps_bebangaji").keyup(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_utanggaji").val(jumlah);
                                            });

                                            $("#jps_bebangaji").keydown(function() {
                                                var jumlah = $(this).val();

                                                $("#jps_utanggaji").val(jumlah);
                                            });

                                        } else if (jps_kategori == 'jps4') {
                                            alert(jps_kategori);
                                            var txt = "<div id='jps4'><div class='form-group row penj'><label class='col-sm-12 col-md-2 col-form-label'>Beban Perlengkapan</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='4' required><input class='form-control' type='number' id='jps_beban_perlengkapan' name='debet4' placeholder='Beban Perlengkapan' required></div></div><div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>Perlengkapan</label><div class='col-sm-12 col-md-10'><input class='form-control' type='number' id='jps_perlengkapan' name='kredit4' placeholder='Perlengkapan' required></div></div></div>";

                                            $("#jps1").remove();
                                            $("#jps2").remove();
                                            $("#jps3").remove();
                                            // $("#jps4").remove();
                                            $("#jps5").remove();
                                            $("#jps6").remove();
                                            $("#jps7").remove();
                                            $("#jpsapp").append(txt);

                                            $("#jps_beban_perlengkapan").keydown(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_perlengkapan").val(jumlah);
                                            });
                                            $("#jps_beban_perlengkapan").keyup(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_perlengkapan").val(jumlah);
                                            });

                                        } else if (jps_kategori == 'jps5') {
                                            alert(jps_kategori);
                                            var txt = "<div id='jps5'><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Beban penyusutan peralatan</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='5' required><input class='form-control' id='jps_beban_penyusutan' type='number' name='debet5' placeholder='Beban penyusutan peralatan' required></div></div><div class='form-group row penj'><label class='col-sm-12 col-md-2 col-form-label'>Akumulasi Peralatan</label><div class='col-sm-12 col-md-10'><input class='form-control' type='text' id='jps_akumulasi_peralatan' name='kredit5' placeholder='Akumulasi Peralatan' required></div></div></div>";

                                            $("#jps1").remove();
                                            $("#jps2").remove();
                                            $("#jps3").remove();
                                            $("#jps4").remove();
                                            // $("#jps5").remove();
                                            $("#jps6").remove();
                                            $("#jps7").remove();
                                            $("#jpsapp").append(txt);

                                            $("#jps_beban_penyusutan").keydown(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_akumulasi_peralatan").val(jumlah);
                                            });
                                            $("#jps_beban_penyusutan").keyup(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_akumulasi_peralatan").val(jumlah);
                                            });

                                        } else if (jps_kategori == 'jps6') {
                                            alert(jps_kategori);
                                            var txt = "<div id='jps6'><div class='form-group row penj'><label class='col-sm-12 col-md-2 col-form-label'>Beban Asuransi</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='6' required><input class='form-control' type='text' id='jps_beban_asu' name='debet6' placeholder='Sewa di bayar di muka' required></div></div><div class='form-group row jps'><label class='col-sm-12 col-md-2 col-form-label'>Beban sewa</label><div class='col-sm-12 col-md-10'><input class='form-control' type='text' id='jps_asuransi_dimuka' name='kredit6' placeholder='Beban sewa' required></div></div></div>";

                                            $("#jps1").remove();
                                            $("#jps2").remove();
                                            $("#jps3").remove();
                                            $("#jps4").remove();
                                            $("#jps5").remove();
                                            // $("#jps6").remove();
                                            $("#jps7").remove();
                                            $("#jpsapp").append(txt);

                                            $("#jps_beban_asu").keydown(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_asuransi_dimuka").val(jumlah);
                                            });
                                            $("#jps_beban_asu").keyup(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_asuransi_dimuka").val(jumlah);
                                            });

                                        } else if (jps_kategori == 'jps7') {
                                            alert(jps_kategori);
                                            var txt = "<div id='jps7'><div class='form-group row penj'><label class='col-sm-12 col-md-2 col-form-label'>Sewa di bayar di muka</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='7' required><input class='form-control' type='text' id='jps_sewa_dimuka' name='debet7' placeholder='Sewa di bayar di muka' required></div></div><div class='form-group row jps'><label class='col-sm-12 col-md-2 col-form-label'>Beban sewa</label><div class='col-sm-12 col-md-10'><input class='form-control' type='text' id='jps_beban_sewa' name='kredit7' placeholder='Beban sewa' required></div></div></div>";

                                            $("#jps1").remove();
                                            $("#jps2").remove();
                                            $("#jps3").remove();
                                            $("#jps4").remove();
                                            $("#jps5").remove();
                                            $("#jps6").remove();
                                            // $("#jps7").remove();
                                            $("#jpsapp").append(txt);

                                            $("#jps_sewa_dimuka").keydown(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_beban_sewa").val(jumlah);
                                            });
                                            $("#jps_sewa_dimuka").keyup(function() {
                                                var jumlah = $(this).val();
                                                $("#jps_beban_sewa").val(jumlah);
                                            });
                                        }
                                    });

                                    $("#jps_ikhtisar1").keydown(function() {
                                        var jumlah = $(this).val();
                                        $("#jps_pdb_awal").val(jumlah);
                                    });
                                    $("#jps_ikhtisar1").keyup(function() {
                                        var jumlah = $(this).val();
                                        $("#jps_pdb_awal").val(jumlah);
                                    });
                                </script>










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