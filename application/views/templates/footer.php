        <!-- footer content -->
        <footer>
          <div class="pull-right">
            By Muhamad Sholikhudin
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        </div>
        </div>




        <!-- jQuery -->
        <script src="<?= base_url('assets/'); ?>vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?= base_url('assets/'); ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- FastClick -->
        <script src="<?= base_url('assets/'); ?>vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="<?= base_url('assets/'); ?>vendors/nprogress/nprogress.js"></script>
        <!-- iCheck -->
        <script src="<?= base_url('assets/'); ?>vendors/iCheck/icheck.min.js"></script>

        <script type="text/javascript">
          // JKK Form Tambah Akun
          // $("#kategori_jkk").change(function() {
          //   var kategori_jkk = $(this).val();

          //   if (kategori_jkk == 'utang_dagang') {
          //     alert(kategori_jkk);
          //     var txt1 = "<div id='jkkapp1'><div class='form-group row penj1'><label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='1' required><input class='form-control' type='hidden' name='id_akun_utang_dagang' value='1' required><input class='form-control' id='jkk_utang' type='number' name='debet1' placeholder='Jumlah utang dagang' required></div></div><div class='form-group row penj_kas'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas' value='1' required><input class='form-control' id='jkk_kas' type='text' name='kredit1' placeholder='Jumlah Kas Keluar' required></div></div></div>"; // Create element with HTML 

          //     $("#jkkapp2").remove();
          //     $("#jkkapp3").remove();
          //     $(".jkk").remove();
          //     $(".pemb").remove();
          //     $("#piljkk").append(txt1);

          //     $("#jkk_beli").keydown(function() {
          //       var jumlah = $(this).val();
          //       $("#jkk_kas").val(jumlah);
          //     });
          //     $("#jkk_beli").keyup(function() {
          //       var jumlah = $(this).val();
          //       $("#jkk_kas").val(jumlah);
          //     });

          //   } else if (kategori_jkk == 'pembelian') {
          //     alert(kategori_jkk);
          //     var txt = "<div id='jkkapp2'><div class='form-group row'> <label class='col-sm-12 col-md-2 col-form-label'>Pembelian</label> <div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required><input class='form-control' type='hidden' name='id_akun_pembelian' required><input class='form-control' type='number' id='jkk_beli' name='debet2' placeholder='Jumlah Pembelian' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>syarat</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='syarat2' id='jkk_syarat'><option value='1'>Tidak ada</option><option value='2'>2/10, n/30</option><option value='3'>3/10, n/30</option></select></div></div><div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>Potongan pembelian</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_potongan_pembelian2' required><input class='form-control' type='number' id='jkk_potpemb' name='kredit2' placeholder='Jumlah Kas Masuk' value='0' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas2' required><input class='form-control' id='jkk_kas' type='number' name='kredit2' placeholder='Jumlah Kas keluar' required></div></div></div>";
          //     $("#jkkapp3").remove();
          //     $("#jkkapp1").remove();
          //     $("#piljkk").append(txt);
          //     $(".jkk").remove();
          //     $(".pemb").remove();

          //     $("#jkk_utang").keydown(function() {
          //       var jumlah = $(this).val();
          //       $("#jkk_kas").val(jumlah);
          //     });
          //     $("#jkk_utang").keyup(function() {
          //       var jumlah = $(this).val();
          //       $("#jkk_kas").val(jumlah);
          //     });

          //     $("#jkk_syarat").change(function() {
          //       var n_syarat = $(this).val();
          //       var jkk_utang = $("#jkk_utang").val();
          //       if (n_syarat == 1) {
          //         $("#jkk_potpemb").val(0);
          //         $("#jkk_kas").val(jkk_utang);
          //       } else if (n_syarat == 2) {
          //         var pot = jkk_utang * 0.02;
          //         var kaspot = jkk_utang - pot;
          //         $("#jkk_potpemb").val(pot);
          //         $("#jkk_kas").val(kaspot);
          //       } else if (n_syarat == 3) {
          //         var pot1 = jkk_utang * 0.03;
          //         var kaspot1 = jkk_utang - pot1;
          //         $("#jkk_potpemb").val(pot1);
          //         $("#jkk_kas").val(kaspot1);
          //       }
          //     });

          //   } else if (kategori_jkk == 'akun') {

          //     alert(kategori_jkk);
          //     var txt = "<div id='jkkapp3'><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Pilih Akun Serba Serbi</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun' id='id_akun'><option value='1'>Beban Gaji</option><option value='2'>Beban Sewa</option><option value='3'>Beban Macam - Macam</option></select></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_pil3' required><input class='form-control' id='akun_serba' type='text' name='kredit3' placeholder='Jumlah Kas Masuk' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas3' required><input class='form-control' id='jkm_kas' type='text' name='debet3' placeholder='Jumlah Kas Masuk' required></div></div></div>";
          //     $("#jkkapp1").remove();
          //     $("#jkkapp2").remove();
          //     $("#piljkk").append(txt);
          //     $(".jkk").remove();
          //     $(".penj").remove();

          //     $("#akun_serba").keydown(function() {
          //       var jumlah = $(this).val();
          //       $("#jkk_kas").val(jumlah);
          //     });
          //     $("#akun_serba").keyup(function() {
          //       var jumlah = $(this).val();
          //       $("#jkk_kas").val(jumlah);
          //     });
          //   }
          // });

          // $("#jkk_utang").keydown(function() {
          //   var jumlah = $(this).val();
          //   $("#jkk_kas").val(jumlah);
          // });
          // $("#jkk_utang").keyup(function() {
          //   var jumlah = $(this).val();
          //   $("#jkk_kas").val(jumlah);
          // });



          //JURNAL KAS MASUK = JKM
          $("#kategori_jkm").change(function() {
            var kategori_jkm = $(this).val();

            if (kategori_jkm == 'penjualan') {
              alert(kategori_jkm);
              var txt1 = "<div id='jkmapp1'><div class='form-group row penj1'><label class='col-sm-12 col-md-2 col-form-label'>Penjualan</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='1' required><input class='form-control' type='hidden' name='id_akun_penjualan' value='12' required><input class='form-control' id='jkm_jual' type='number' name='kredit1' placeholder='Jumlah penjualan' required></div></div><div class='form-group row penj_kas'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas' value='1' required><input class='form-control' id='jkm_kas' type='text' name='debet1' placeholder='Jumlah Kas Masuk' required></div></div></div>"; // Create element with HTML 

              $("#jkmapp2").remove();
              $("#jkmapp3").remove();
              $(".jkm").remove();
              $(".penj").remove();
              $("#piljkm").append(txt1);

              $("#jkm_jual").keydown(function() {
                var jumlah = $(this).val();
                $("#jkm_kas").val(jumlah);
              });
              $("#jkm_jual").keyup(function() {
                var jumlah = $(this).val();
                $("#jkm_kas").val(jumlah);
              });
            } else if (kategori_jkm == 'piutang_dagang') {
              alert(kategori_jkm);
              var txt = "<div id='jkmapp2'><div class='form-group row'> <label class='col-sm-12 col-md-2 col-form-label'>Piutang Dagang</label> <div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required><input class='form-control' type='hidden' name='id_akun_piutang_dagang' value='3' required><input class='form-control' type='number' id='jkm_piutang' name='kredit2' placeholder='Jumlah piutang dagang' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun Piutang Dagang</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun_piutang_dagang' id='id_piutang'><?php foreach ($piutang_dagang as $piutang) : ?> <option value='<?= $piutang->id_piutang_dagang ?>' > <?= $piutang->nama_piutang_dagang ?></option> <?php endforeach; ?></select></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>syarat</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='syarat2' id='jkm_syarat'><option value='1'>Tidak ada</option><option value='2'>2/10, n/30</option><option value='3'>3/10, n/30</option></select></div></div><div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>Potongan penjualan</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_potongan_penjualan2' required><input class='form-control' type='number' id='jkm_potpenj' name='debet2potpenj' placeholder='Potongan penjualan'  required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas2' required><input class='form-control' id='jkm_kas' type='number' name='debet2' placeholder='Jumlah Kas Masuk' required></div></div></div>";
              $("#jkmapp3").remove();
              $("#jkmapp1").remove();
              $("#piljkm").append(txt);
              $(".jkm").remove();
              $(".penj").remove();

              $("#jkm_piutang").keydown(function() {
                var jumlah = $(this).val();
                $("#jkm_kas").val(jumlah);
              });
              $("#jkm_piutang").keyup(function() {
                var jumlah = $(this).val();
                $("#jkm_kas").val(jumlah);
              });

              $("#jkm_syarat").change(function() {
                var n_syarat = $(this).val();
                var jkm_piutang = $("#jkm_piutang").val();
                if (n_syarat == 1) {
                  $("#jkm_potpenj").val(0);
                  $("#jkm_kas").val(jkm_piutang);
                } else if (n_syarat == 2) {
                  var pot = jkm_piutang * 0.02;
                  var kaspot = jkm_piutang - pot;
                  $("#jkm_potpenj").val(pot);
                  $("#jkm_kas").val(kaspot);
                } else if (n_syarat == 3) {
                  var pot1 = jkm_piutang * 0.03;
                  var kaspot1 = jkm_piutang - pot1;
                  $("#jkm_potpenj").val(pot1);
                  $("#jkm_kas").val(kaspot1);
                }
              });
            } else if (kategori_jkm == 'akun') {

              alert(kategori_jkm);
              var txt = "<div id='jkmapp3'><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Pilih Akun Serba Serbi</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='akun_kredit3' id='syarat'><?php foreach ($akun as $aku) : ?><option value='<?= $aku->no_akun ?>'><?= $aku->nama_akun ?></option><?php endforeach; ?></select></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Jumlah Nominal</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='3' required><input class='form-control' id='akun_serba' type='text' name='kredit3' placeholder='Jumlah Nominal Akun' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas3'  required><input class='form-control' id='jkm_kas' type='text' name='debet3' placeholder='Jumlah Kas Masuk' required></div></div></div>";
              $("#jkmapp1").remove();
              $("#jkmapp2").remove();
              $("#piljkm").append(txt);
              $(".jkm").remove();
              $(".penj").remove();

              $("#akun_serba").keydown(function() {
                var jumlah = $(this).val();
                $("#jkm_kas").val(jumlah);
              });
              $("#akun_serba").keyup(function() {
                var jumlah = $(this).val();
                $("#jkm_kas").val(jumlah);
              });
            }
          });

          $("#jkm_jual").keydown(function() {
            var jumlah = $(this).val();
            $("#jkm_kas").val(jumlah);
          });
          $("#jkm_jual").keyup(function() {
            var jumlah = $(this).val();
            $("#jkm_kas").val(jumlah);
          });





          $("#bayar").keydown(function() {
            $("#kembali").css("background-color", "yellow");
            $("#bayar").css("background-color", "yellow");
            var bayar = $(this).val();
            var total = $("#total").val();
            var kembali = bayar - total;
            $("#kembali").val(kembali);
          });

          $("#bayar").keyup(function() {
            $("#kembali").css("background-color", "white");
            $("#bayar").css("background-color", "white");
            var bayar = $(this).val();
            var total = $("#total").val();
            var kembali = bayar - total;
            $("#kembali").val(kembali);
          });

          //EDIT JKM
          $("#jkm_jual").keydown(function() {
            var jumlah = $(this).val();
            $("#jkm_kas").val(jumlah);
          });
          $("#jkm_jual").keyup(function() {
            var jumlah = $(this).val();
            $("#jkm_kas").val(jumlah);
          });


          $("#jkm_piutang").keydown(function() {
            var jumlah = $(this).val();
            $("#jkm_potpenj").val(0);
            $("#jkm_kas").val(jumlah);
          });
          $("#jkm_piutang").keyup(function() {
            var jumlah = $(this).val();
            $("#jkm_potpenj").val(0);
            $("#jkm_kas").val(jumlah);
          });

          $("#jkm_syarat2").change(function() {
            var n_syarat = $(this).val();
            var jkm_piutang = $("#jkm_piutang").val();
            if (n_syarat == 1) {
              $("#jkm_potpenj").val(0);
              $("#jkm_kas").val(jkm_piutang);
            } else if (n_syarat == 2) {
              var pot = jkm_piutang * 0.02;
              var kaspot = jkm_piutang - pot;
              $("#jkm_potpenj").val(pot);
              $("#jkm_kas").val(kaspot);
            } else if (n_syarat == 3) {
              var pot1 = jkm_piutang * 0.03;
              var kaspot1 = jkm_piutang - pot1;
              $("#jkm_potpenj").val(pot1);
              $("#jkm_kas").val(kaspot1);
            }
          });
          $("#akun_serba").keydown(function() {
            var jumlah = $(this).val();
            $("#jkm_kas").val(jumlah);
          });
          $("#akun_serba").keyup(function() {
            var jumlah = $(this).val();
            $("#jkm_kas").val(jumlah);
          });
        </script>


        <script>
          //JURNAL UMUM = ju
          $("#kategori_ju").change(function() {
            var kategori_ju = $(this).val();

            if (kategori_ju == 'utang_dagang') {
              alert(kategori_ju);
              var txt = "<div id='pil_ju1'><div class='form-group row utg'><label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun_utang_dagang' id='id_utang' required><?php foreach ($utang_dagang as $utang) : ?><option value='<?= $utang->id_utang_dagang ?>'> <?= $utang->nama_utang_dagang ?></option><?php endforeach; ?></select></div></div><div class='form-group row utg'><label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='1' required><input class='form-control' type='number' id='ju_utang12' name='debet1' placeholder='Jumlah penjualan' required></div></div><div class='form-group row pemb'><label class='col-sm-12 col-md-2 col-form-label'>Retur Pembelian</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_piutang_dagang' required><input class='form-control' type='number' id='ju_retur_pembelian' name='kredit1' placeholder='Jumlah' required></div></div></div>";

              $(".utg").remove();
              $("#pil_ju2").remove();
              $("#juapp").append(txt);

              $("#ju_utang12").keydown(function() {
                var jumlah = $(this).val();
                $("#ju_retur_pembelian").val(jumlah);
              });
              $("#ju_utang12").keyup(function() {
                var jumlah = $(this).val();
                $("#ju_retur_pembelian").val(jumlah);
              });


            } else if (kategori_ju == 'retur_penjualan') {
              alert(kategori_ju);
              var txt = "<div id='pil_ju2'><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Retur Penjualan</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required><input class='form-control' type='number' id='ju_ret_penj' name='debet2' placeholder='Jumlah' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun Piutang Dagang</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun_piutang_dagang2' id='id_piutang'><?php foreach ($piutang_dagang as $piutang) : ?><option value='<?= $piutang->id_piutang_dagang ?>'> <?= $piutang->nama_piutang_dagang ?></option><?php endforeach; ?></select></div></div><div class='form-group row pemb'><label class='col-sm-12 col-md-2 col-form-label'>Piutang Dagang</label><div class='col-sm-12 col-md-10'><input class='form-control' type='number' id='ju_piu' name='kredit2' placeholder='Jumlah' required></div></div></div>";

              $(".utg").remove();
              $("#pil_ju1").remove();
              $("#juapp").append(txt);

              $("#ju_ret_penj").keydown(function() {
                var jumlah = $(this).val();
                $("#ju_piu").val(jumlah);
              });
              $("#ju_ret_penj").keyup(function() {
                var jumlah = $(this).val();
                $("#ju_piu").val(jumlah);
              });
            }

          });
        </script>

        <script>
          $("#kategori_jkk").change(function() {
            var kategori_jkk = $(this).val();

            if (kategori_jkk == 'utang_dagang') {
              alert(kategori_jkk);
              var txt1 = "<div id='jkkapp1'><div class='form-group row pemb'><label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun_piutang_dagang' id='id_piutang'><?php foreach ($utang_dagang as $utang) : ?><option value='<?= $utang->id_utang_dagang ?>'> <?= $utang->nama_utang_dagang ?></option><?php endforeach; ?></select></div></div><div class='form-group row penj1'><label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='1' required><input class='form-control' type='hidden' name='id_akun_utang_dagang' value='1' required><input class='form-control' id='jkk_utang' type='number' name='debet1' placeholder='Jumlah utang dagang' required></div></div><div class='form-group row penj_kas'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas' value='1' required><input class='form-control' id='jkk_kas' type='text' name='kredit1' placeholder='Jumlah Kas Keluar' required></div></div></div>"; // Create element with HTML 

              $("#jkkapp2").remove();
              $("#jkkapp3").remove();
              $(".jkk").remove();
              $(".pemb").remove();
              $("#piljkk").append(txt1);

              $("#jkk_beli").keydown(function() {
                var jumlah = $(this).val();
                $("#jkk_kas").val(jumlah);
              });
              $("#jkk_beli").keyup(function() {
                var jumlah = $(this).val();
                $("#jkk_kas").val(jumlah);
              });

            } else if (kategori_jkk == 'pembelian') {
              alert(kategori_jkk);
              var txt = "<div id='jkkapp2'><div class='form-group row'> <label class='col-sm-12 col-md-2 col-form-label'>Pembelian</label> <div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required><input class='form-control' type='hidden' name='akun_pembelian' required><input class='form-control' type='number' id='jkk_beli' name='debet2' placeholder='Jumlah Pembelian' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>syarat</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='syarat2' id='jkk_syarat'><option value='1'>Tidak ada</option><option value='2'>2/10, n/30</option><option value='3'>3/10, n/30</option></select></div></div><div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>Potongan pembelian</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='akun_potongan_pembelian' required><input class='form-control' type='number' id='jkk_potpemb' name='kredit2potpemb' placeholder='Jumlah Kas Masuk' value='0' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas2' required><input class='form-control' id='jkk_kas' type='number' name='kredit2' placeholder='Jumlah Kas keluar' required></div></div></div>";
              $("#jkkapp3").remove();
              $("#jkkapp1").remove();
              $("#piljkk").append(txt);
              $(".jkk").remove();
              $(".pemb").remove();

              $("#jkk_beli").keydown(function() {
                // var jumlah = $(this).val();
                // $("#jkk_kas").val(jumlah);
                var jkk_beli = $(this).val();
                var n_syarat = $("#jkk_syarat").val();

                if (n_syarat == 1) {
                  $("#jkk_potpemb").val(0);
                  $("#jkk_kas").val(jkk_beli);
                } else if (n_syarat == 2) {
                  var pot = jkk_beli * 0.02;
                  var kaspot = jkk_beli - pot;
                  $("#jkk_potpemb").val(pot);
                  $("#jkk_kas").val(kaspot);
                } else if (n_syarat == 3) {
                  var pot1 = jkk_beli * 0.03;
                  var kaspot1 = jkk_beli - pot1;
                  $("#jkk_potpemb").val(pot1);
                  $("#jkk_kas").val(kaspot1);
                }
              });
              $("#jkk_beli").keyup(function() {
                // var jumlah = $(this).val();
                // $("#jkk_kas").val(jumlah);

                var jkk_beli = $(this).val();
                var n_syarat = $("#jkk_syarat").val();

                // var n_syarat = $(this).val();
                // var jkk_beli = $("#jkk_beli").val();
                if (n_syarat == 1) {
                  $("#jkk_potpemb").val(0);
                  $("#jkk_kas").val(jkk_beli);
                } else if (n_syarat == 2) {
                  var pot = jkk_beli * 0.02;
                  var kaspot = jkk_beli - pot;
                  $("#jkk_potpemb").val(pot);
                  $("#jkk_kas").val(kaspot);
                } else if (n_syarat == 3) {
                  var pot1 = jkk_beli * 0.03;
                  var kaspot1 = jkk_beli - pot1;
                  $("#jkk_potpemb").val(pot1);
                  $("#jkk_kas").val(kaspot1);
                }
              });

              $("#jkk_syarat").change(function() {
                var n_syarat = $(this).val();
                var jkk_beli = $("#jkk_beli").val();
                if (n_syarat == 1) {
                  $("#jkk_potpemb").val(0);
                  $("#jkk_kas").val(jkk_beli);
                } else if (n_syarat == 2) {
                  var pot = jkk_beli * 0.02;
                  var kaspot = jkk_beli - pot;
                  $("#jkk_potpemb").val(pot);
                  $("#jkk_kas").val(kaspot);
                } else if (n_syarat == 3) {
                  var pot1 = jkk_beli * 0.03;
                  var kaspot1 = jkk_beli - pot1;
                  $("#jkk_potpemb").val(pot1);
                  $("#jkk_kas").val(kaspot1);
                }
              });

            } else if (kategori_jkk == 'akun') {

              alert(kategori_jkk);
              var txt = "<div id='jkkapp3'><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Pilih Akun Serba Serbi</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='jkk_id_akun_serba' id='id_akun'><?php foreach ($akun as $aku) : ?><option value='<?= $aku->no_akun ?>'><?= $aku->nama_akun ?></option><?php endforeach; ?></select></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='3' required><input class='form-control' id='jkk_akun_serba' type='number' name='debet3' placeholder='Jumlah Kas Masuk' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas3' required><input class='form-control' id='jkk_kas' type='number' name='kredit3' placeholder='Jumlah Kas Masuk' required></div></div></div>";

              $("#jkkapp1").remove();
              $("#jkkapp2").remove();
              $("#piljkk").append(txt);
              $(".jkk").remove();
              $(".pemb").remove();
              $(".penj").remove();

              $("#jkk_akun_serba").keydown(function() {
                var jumlah = $(this).val();
                $("#jkk_kas").val(jumlah);
              });
              $("#jkk_akun_serba").keyup(function() {
                var jumlah = $(this).val();
                $("#jkk_kas").val(jumlah);
              });
            }
          });

          $("#jkk_utang").keydown(function() {
            var jumlah = $(this).val();
            $("#jkk_kas").val(jumlah);
          });
          $("#jkk_utang").keyup(function() {
            var jumlah = $(this).val();
            $("#jkk_kas").val(jumlah);
          });

          $("#jkk_beli").keydown(function() {
            var jkk_beli = $(this).val();
            var n_syarat = $("#jkk_syarat").val();

            // var n_syarat = $(this).val();
            // var jkk_beli = $("#jkk_beli").val();
            if (n_syarat == 1) {
              $("#jkk_potpemb").val(0);
              $("#jkk_kas").val(jkk_beli);
            } else if (n_syarat == 2) {
              var pot = jkk_beli * 0.02;
              var kaspot = jkk_beli - pot;
              $("#jkk_potpemb").val(pot);
              $("#jkk_kas").val(kaspot);
            } else if (n_syarat == 3) {
              var pot1 = jkk_beli * 0.03;
              var kaspot1 = jkk_beli - pot1;
              $("#jkk_potpemb").val(pot1);
              $("#jkk_kas").val(kaspot1);
            }


            // $("#jkk_kas").val(jumlah);
          });
          $("#jkk_beli").keyup(function() {
            var jkk_beli = $(this).val();
            var n_syarat = $("#jkk_syarat").val();
            // var jkk_beli = $("#jkk_beli").val();
            if (n_syarat == 1) {
              $("#jkk_potpemb").val(0);
              $("#jkk_kas").val(jkk_beli);
            } else if (n_syarat == 2) {
              var pot = jkk_beli * 0.02;
              var kaspot = jkk_beli - pot;
              $("#jkk_potpemb").val(pot);
              $("#jkk_kas").val(kaspot);
            } else if (n_syarat == 3) {
              var pot1 = jkk_beli * 0.03;
              var kaspot1 = jkk_beli - pot1;
              $("#jkk_potpemb").val(pot1);
              $("#jkk_kas").val(kaspot1);
            }

            // var jumlah = $(this).val();
            // $("#jkk_kas").val(jumlah);
          });

          $("#jkk_syarat").change(function() {
            var n_syarat = $(this).val();
            var jkk_beli = $("#jkk_beli").val();
            if (n_syarat == 1) {
              $("#jkk_potpemb").val(0);
              $("#jkk_kas").val(jkk_beli);
            } else if (n_syarat == 2) {
              var pot = jkk_beli * 0.02;
              var kaspot = jkk_beli - pot;
              $("#jkk_potpemb").val(pot);
              $("#jkk_kas").val(kaspot);
            } else if (n_syarat == 3) {
              var pot1 = jkk_beli * 0.03;
              var kaspot1 = jkk_beli - pot1;
              $("#jkk_potpemb").val(pot1);
              $("#jkk_kas").val(kaspot1);
            }
          });

          $("#jkk_akun_serba").keydown(function() {
            var jumlah = $(this).val();
            $("#jkk_kas").val(jumlah);
          });
          $("#jkk_akun_serba").keyup(function() {
            var jumlah = $(this).val();
            $("#jkk_kas").val(jumlah);
          });
        </script>
        <script>
          //JB Form Tambah
          $("#kategori_jb").change(function() {
            var kategori_jb = $(this).val();

            if (kategori_jb == 'pembelian') {
              alert(kategori_jb);
              var txt1 = "<div id='jbapp1'><div class='form-group row pemb'><label class='col-sm-12 col-md-2 col-form-label'>No Faktur</label><div class='col-sm-12 col-md-10'><input class='form-control' type='text' id='jb_faktur' name='no_faktur' placeholder='Tulis faktur Pembelian' required></div></div><div class='form-group row penj1'><label class='col-sm-12 col-md-2 col-form-label'>Pembelian</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='1' required><input class='form-control' type='hidden' name='id_akun_pembelian' value='1' required><input class='form-control' id='jb_beli' type='number' name='debet1' placeholder='Jumlah Pembelian' required></div></div><div class='form-group row pemb'><label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun_utang_dagang' id='id_piutang'><?php foreach ($utang_dagang as $utang) : ?><option value='<?= $utang->id_utang_dagang ?>'> <?= $utang->nama_utang_dagang ?></option><?php endforeach; ?></select></div></div><div class='form-group row penj_kas'><label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_utang'  required><input class='form-control' id='jb_utang' type='number' name='kredit1' placeholder='Jumlah Utang Dagang' required></div></div></div>"; // Create element with HTML 

              $("#jbapp2").remove();
              $(".jb").remove();
              $(".pemb").remove();
              $("#piljb").append(txt1);

              $("#jb_beli").keydown(function() {
                var jumlah = $(this).val();
                $("#jb_utang").val(jumlah);
              });
              $("#jb_beli").keyup(function() {
                var jumlah = $(this).val();
                $("#jb_utang").val(jumlah);
              });

            } else if (kategori_jb == 'akun') {

              alert(kategori_jb);
              var txt = "<div id='jbapp2'><div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>No Faktur</label><div class='col-sm-12 col-md-10'><input class='form-control' type='text' id='jb_faktur' name='no_faktur' placeholder='Tulis faktur Pembelian' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Pilih Akun Serba Serbi</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='akun_serba_serbi' id='id_akun'><?php foreach ($akun as $aku) : ?><option value='<?= $aku->no_akun ?>'><?= $aku->nama_akun ?></option><?php endforeach; ?></select></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required><input class='form-control' id='akun_serba' type='text' name='debet2' placeholder='Jumlah' required></div></div><div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>Akun Utang Dagang</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun_utang_dagang' id='id_piutang'><?php foreach ($utang_dagang as $utang) : ?><option value='<?= $utang->id_utang_dagang ?>'> <?= $utang->nama_utang_dagang ?></option><?php endforeach; ?></select></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_utang_dagang2' required><input class='form-control' id='jb_utang' type='text' name='kredit2' placeholder='Jumlah Kas Masuk' required></div></div></div>";

              $("#jbapp1").remove();
              $("#piljb").append(txt);
              $(".jb").remove();
              $(".pemb").remove();


              $("#akun_serba").keydown(function() {
                var jumlah = $(this).val();
                $("#jb_utang").val(jumlah);
              });
              $("#akun_serba").keyup(function() {
                var jumlah = $(this).val();
                $("#jb_utang").val(jumlah);
              });
            }
          });

          $("#jb_beli").keydown(function() {
            var jumlah = $(this).val();
            $("#jb_utang").val(jumlah);
          });
          $("#jb_beli").keyup(function() {
            var jumlah = $(this).val();
            $("#jb_utang").val(jumlah);
          });

          $("#akun_serba").keydown(function() {
            var jumlah = $(this).val();
            $("#jb_utang").val(jumlah);
          });
          $("#akun_serba").keyup(function() {
            var jumlah = $(this).val();
            $("#jb_utang").val(jumlah);
          });
        </script>

        <!-- Datatables -->

        <script src="<?= base_url('assets/'); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/jszip/dist/jszip.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?= base_url('assets/'); ?>vendors/pdfmake/build/vfs_fonts.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?= base_url('assets/'); ?>build/js/custom.min.js"></script>

        <!-- <script>
          $().DataTable();
        </script> -->

        <script type="text/javascript">
          $(document).ready(function() {
            $('#DataTables_Table_0').DataTable();
          });
        </script>
        </body>

        </html>