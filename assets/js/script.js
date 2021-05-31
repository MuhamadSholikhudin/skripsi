$(document).ready(function () {
    $('#DataTables_Table_0').DataTable();




    //JURNAL KAS MASUK = JKM
            $("#kategori_jkm").change(function () {
                var kategori_jkm = $(this).val();

                if (kategori_jkm == 'penjualan') {
                    alert(kategori_jkm);
                    var txt1 = "<div id='jkmapp1'><div class='form-group row penj1'><label class='col-sm-12 col-md-2 col-form-label'>Penjualan</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='1' required><input class='form-control' type='hidden' name='id_akun_penjualan' value='12' required><input class='form-control' id='jkm_jual' type='number' name='kredit1' placeholder='Jumlah penjualan' required></div></div><div class='form-group row penj_kas'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas' value='1' required><input class='form-control' id='jkm_kas' type='text' name='debet1' placeholder='Jumlah Kas Masuk' required></div></div></div>";               // Create element with HTML 
                    
                    $("#jkmapp2").remove();
                    $("#jkmapp3").remove();
                    $(".jkm").remove();
                    $(".penj").remove();
                    $("#piljkm").append(txt1);

                    $("#jkm_jual").keydown(function () {
                        var jumlah = $(this).val();
                        $("#jkm_kas").val(jumlah);
                    });
                    $("#jkm_jual").keyup(function () {
                        var jumlah = $(this).val();
                        $("#jkm_kas").val(jumlah);
                    });
                } else if (kategori_jkm == 'piutang_dagang') {
                    alert(kategori_jkm);
                    var txt = "<div id='jkmapp2'><div class='form-group row'> <label class='col-sm-12 col-md-2 col-form-label'>Piutang Dagang</label> <div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required><input class='form-control' type='hidden' name='id_akun_piutang_dagang' value='3' required><input class='form-control' type='number' id='jkm_piutang' name='kredit2' placeholder='Jumlah piutang dagang' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun Piutang Dagang</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun_piutang_dagang' id='id_piutang'><?php foreach($piutang_dagang as $piutang): ?> <option value='<?= $piutang->id_piutang_dagang ?>' > <?= $piutang->nama_piutang_dagang ?></option> <?php endforeach; ?></select></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>syarat</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='syarat2' id='jkm_syarat'><option value='1'>Tidak ada</option><option value='2'>2/10, n/30</option><option value='3'>3/10, n/30</option></select></div></div><div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>Potongan penjualan</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_potongan_penjualan2' required><input class='form-control' type='number' id='jkm_potpenj' name='debet2potpenj' placeholder='Potongan penjualan'  required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas2' required><input class='form-control' id='jkm_kas' type='number' name='debet2' placeholder='Jumlah Kas Masuk' required></div></div></div>";
                    $("#jkmapp3").remove();
                    $("#jkmapp1").remove();
                    $("#piljkm").append(txt);
                    $(".jkm").remove();
                    $(".penj").remove();

                    $("#jkm_piutang").keydown(function () {
                        var jumlah = $(this).val();
                        $("#jkm_kas").val(jumlah);
                    });
                    $("#jkm_piutang").keyup(function () {
                        var jumlah = $(this).val();
                        $("#jkm_kas").val(jumlah);
                    });

                    $("#jkm_syarat").change(function () {
                        var n_syarat = $(this).val();
                        var jkm_piutang = $("#jkm_piutang").val();
                        if (n_syarat == 1){
                            $("#jkm_potpenj").val(0);
                            $("#jkm_kas").val(jkm_piutang);
                        } else if (n_syarat == 2){
                            var pot = jkm_piutang * 0.02;
                            var kaspot = jkm_piutang - pot;
                            $("#jkm_potpenj").val(pot);
                            $("#jkm_kas").val(kaspot);
                        } else if(n_syarat == 3) {
                            var pot1 = jkm_piutang * 0.03;
                            var kaspot1 = jkm_piutang - pot1;
                            $("#jkm_potpenj").val(pot1);
                            $("#jkm_kas").val(kaspot1);
                        }
                    });
                } else if (kategori_jkm == 'akun') {

                    alert(kategori_jkm);
                    var txt = "<div id='jkmapp3'><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Pilih Akun Serba Serbi</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun' id='syarat'><option value='1'>Modal</option><option value='2'>Utang Bank</option><option value='3'>Hadiah</option></select></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_pil3' required><input class='form-control' id='akun_serba' type='text' name='kredit3' placeholder='Jumlah Kas Masuk' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas3' required><input class='form-control' id='jkm_kas' type='text' name='debet3' placeholder='Jumlah Kas Masuk' required></div></div></div>";
                    $("#jkmapp1").remove();
                    $("#jkmapp2").remove();
                    $("#piljkm").append(txt);
                    $(".jkm").remove();
                    $(".penj").remove();

                    $("#akun_serba").keydown(function () {
                        var jumlah = $(this).val();
                        $("#jkm_kas").val(jumlah);
                    });
                    $("#akun_serba").keyup(function () {
                        var jumlah = $(this).val();
                        $("#jkm_kas").val(jumlah);
                    });
                }
            });

            $("#jkm_jual").keydown(function () {
                var jumlah = $(this).val();
                $("#jkm_kas").val(jumlah);
            });
            $("#jkm_jual").keyup(function () {
                var jumlah = $(this).val();
                $("#jkm_kas").val(jumlah);
            });

            $("#kategori_jkk").change(function () {
                var kategori_jkk = $(this).val();

                if (kategori_jkk == 'utang_dagang') {
                    alert(kategori_jkk);
                    var txt1 = "<div id='jkkapp1'><div class='form-group row penj1'><label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='1' required><input class='form-control' type='hidden' name='id_akun_utang_dagang' value='1' required><input class='form-control' id='jkk_utang' type='number' name='debet1' placeholder='Jumlah utang dagang' required></div></div><div class='form-group row penj_kas'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas' value='1' required><input class='form-control' id='jkk_kas' type='text' name='kredit1' placeholder='Jumlah Kas Keluar' required></div></div></div>";               // Create element with HTML 

                    $("#jkkapp2").remove();
                    $("#jkkapp3").remove();
                    $(".jkk").remove();
                    $(".pemb").remove();
                    $("#piljkk").append(txt1);

                    $("#jkk_beli").keydown(function () {
                        var jumlah = $(this).val();
                        $("#jkk_kas").val(jumlah);
                    });
                    $("#jkk_beli").keyup(function () {
                        var jumlah = $(this).val();
                        $("#jkk_kas").val(jumlah);
                    });

                } else if (kategori_jkk == 'pembelian') {
                    alert(kategori_jkk);
                    var txt = "<div id='jkkapp2'><div class='form-group row'> <label class='col-sm-12 col-md-2 col-form-label'>Pembelian</label> <div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='2' required><input class='form-control' type='hidden' name='id_akun_pembelian' required><input class='form-control' type='number' id='jkk_beli' name='debet2' placeholder='Jumlah Pembelian' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>syarat</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='syarat2' id='jkk_syarat'><option value='1'>Tidak ada</option><option value='2'>2/10, n/30</option><option value='3'>3/10, n/30</option></select></div></div><div class='form-group row '><label class='col-sm-12 col-md-2 col-form-label'>Potongan pembelian</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_potongan_pembelian2' required><input class='form-control' type='number' id='jkk_potpemb' name='kredit2' placeholder='Jumlah Kas Masuk' value='0' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas2' required><input class='form-control' id='jkk_kas' type='number' name='kredit2' placeholder='Jumlah Kas keluar' required></div></div></div>";
                    $("#jkkapp3").remove();
                    $("#jkkapp1").remove();
                    $("#piljkk").append(txt);
                    $(".jkk").remove();
                    $(".pemb").remove();

                    $("#jkk_utang").keydown(function () {
                        var jumlah = $(this).val();
                        $("#jkk_kas").val(jumlah);
                    });
                    $("#jkk_utang").keyup(function () {
                        var jumlah = $(this).val();
                        $("#jkk_kas").val(jumlah);
                    });

                    $("#jkk_syarat").change(function () {
                        var n_syarat = $(this).val();
                        var jkk_utang = $("#jkk_utang").val();
                        if (n_syarat == 1) {
                            $("#jkk_potpemb").val(0);
                            $("#jkk_kas").val(jkk_utang);
                        } else if (n_syarat == 2) {
                            var pot = jkk_utang * 0.02;
                            var kaspot = jkk_utang - pot;
                            $("#jkk_potpemb").val(pot);
                            $("#jkk_kas").val(kaspot);
                        } else if (n_syarat == 3) {
                            var pot1 = jkk_utang * 0.03;
                            var kaspot1 = jkk_utang - pot1;
                            $("#jkk_potpemb").val(pot1);
                            $("#jkk_kas").val(kaspot1);
                        }
                    });

                } else if (kategori_jkk == 'akun') {

                    alert(kategori_jkk);
                    var txt = "<div id='jkkapp3'><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Pilih Akun Serba Serbi</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun' id='id_akun'><option value='1'>Beban Gaji</option><option value='2'>Beban Sewa</option><option value='3'>Beban Macam - Macam</option></select></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_pil3' required><input class='form-control' id='akun_serba' type='text' name='kredit3' placeholder='Jumlah Kas Masuk' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>KAS</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_kas3' required><input class='form-control' id='jkm_kas' type='text' name='debet3' placeholder='Jumlah Kas Masuk' required></div></div></div>";
                    $("#jkkapp1").remove();
                    $("#jkkapp2").remove();
                    $("#piljkk").append(txt);
                    $(".jkk").remove();
                    $(".penj").remove();

                    $("#akun_serba").keydown(function () {
                        var jumlah = $(this).val();
                        $("#jkk_kas").val(jumlah);
                    });
                    $("#akun_serba").keyup(function () {
                        var jumlah = $(this).val();
                        $("#jkk_kas").val(jumlah);
                    });
                }
            });

            $("#jkk_beli").keydown(function () {
                var jumlah = $(this).val();
                $("#jkk_kas").val(jumlah);
            });
            $("#jkk_beli").keyup(function () {
                var jumlah = $(this).val();
                $("#jkk_kas").val(jumlah);
            });

            $("#kategori_jb").change(function () {
                var kategori_jb = $(this).val();

                if (kategori_jb == 'pembelian') {
                    alert(kategori_jb);
                    var txt1 = "<div id='jbapp1'><div class='form-group row penj1'><label class='col-sm-12 col-md-2 col-form-label'>Pembelian</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='pil' value='1' required><input class='form-control' type='hidden' name='id_akun_pembelian' value='1' required><input class='form-control' id='jb_beli' type='number' name='debet1' placeholder='Jumlah Pembelian' required></div></div><div class='form-group row penj_kas'><label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_utang' value='1' required><input class='form-control' id='jb_utang' type='number' name='kredit1' placeholder='Jumlah Utang Dagang' required></div></div></div>";               // Create element with HTML 

                    $("#jbapp2").remove();
                    $(".jb").remove();
                    $(".pemb").remove();
                    $("#piljb").append(txt1);

                    $("#jb_beli").keydown(function () {
                        var jumlah = $(this).val();
                        $("#jb_utang").val(jumlah);
                    });
                    $("#jb_beli").keyup(function () {
                        var jumlah = $(this).val();
                        $("#jb_utang").val(jumlah);
                    });

                } else if (kategori_jb == 'akun') {

                    alert(kategori_jb);
                    var txt = "<div id='jbapp2'><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Pilih Akun Serba Serbi</label><div class='col-sm-12 col-md-10'><select class='custom-select col-12' name='id_akun' id='id_akun'><option value='1'>Peralatan</option><option value='2'>Perlengkapan</option></select></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Akun</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_pil2' required><input class='form-control' id='akun_serba' type='text' name='debet2' placeholder='Jumlah' required></div></div><div class='form-group row'><label class='col-sm-12 col-md-2 col-form-label'>Utang Dagang</label><div class='col-sm-12 col-md-10'><input class='form-control' type='hidden' name='id_akun_utang_dagang2' required><input class='form-control' id='jb_utang' type='text' name='kredit2' placeholder='Jumlah Kas Masuk' required></div></div></div>";
                    $("#jbapp1").remove();
                    $("#piljb").append(txt);
                    $(".jb").remove();
                    $(".pemb").remove();


                    $("#akun_serba").keydown(function () {
                        var jumlah = $(this).val();
                        $("#jb_utang").val(jumlah);
                    });
                    $("#akun_serba").keyup(function () {
                        var jumlah = $(this).val();
                        $("#jb_utang").val(jumlah);
                    });
                }
            });

            $("#jb_beli").keydown(function () {
                var jumlah = $(this).val();
                $("#jb_kas").val(jumlah);
            });
            $("#jb_beli").keyup(function () {
                var jumlah = $(this).val();
                $("#jb_kas").val(jumlah);
            });

            // jurnal penjualan
            $("#jj_jual").keydown(function () {
                var jumlah = $(this).val();
                $("#jj_piutang").val(jumlah);
            });
            $("#jj_jual").keyup(function () {
                var jumlah = $(this).val();
                $("#jj_piutang").val(jumlah);
            });
        
            $("#bayar").keydown(function () {
                $("#kembali").css("background-color", "yellow");
                $("#bayar").css("background-color", "yellow");
                var bayar = $(this).val();
                var total = $("#total").val();
                var kembali = bayar - total;
                $("#kembali").val(kembali);
            });

            $("#bayar").keyup(function () {
                $("#kembali").css("background-color", "white");
                $("#bayar").css("background-color", "white");
                var bayar = $(this).val();
                var total = $("#total").val();
                var kembali = bayar - total;
                $("#kembali").val(kembali);
            });

//EDIT JKM
    $("#jkm_jual").keydown(function () {
        var jumlah = $(this).val();
        $("#jkm_kas").val(jumlah);
    });
    $("#jkm_jual").keyup(function () {
        var jumlah = $(this).val();
        $("#jkm_kas").val(jumlah);
    });

});







//Saldo awal
var rupiah = document.getElementById('saldomasuk1');
rupiah.addEventListener('keyup', function (e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    // document.getElementById("saldomasuk1").value = rupiah.value;


    rupiah.value = formatRupiah(this.value);
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
}


//Transaksi
var rupiahtr = document.getElementById('jumlah1');
rupiahtr.addEventListener('keyup', function (e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    // document.getElementById("saldomasuk1").value = rupiah.value;


    rupiahtr.value = formatRupiah(this.value);
});

/* Fungsi formatRupiah */
function formatRupiah1(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiahtr = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiahtr += separator + ribuan.join('.');
    }

    rupiahtr = split[1] != undefined ? rupiahtr + ',' + split[1] : rupiahtr;
    return prefix == undefined ? rupiahtr : (rupiahtr ? rupiahtr : '');
}