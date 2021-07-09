<div class="right_col" role="main" style="min-height: 4546px;">
    <div class>
        <div class="page-title">
            <div class="title_left">
                <h3>Users <small>Some examples to get you started</small></h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            
            <a href="<?= base_url('pilihan/menu/siklus_akuntansi/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Siklus Akuntansi</a>
           <a href="<?= base_url('pilihan/menu/jkm/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Jurnal pemasukan kas</a>
           <a href="<?= base_url('pilihan/menu/jkk/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Jurnal pengeluaran kas</a>
           <a href="<?= base_url('pilihan/menu/jb/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Jurnal</a>
           <a href="<?= base_url('pilihan/menu/jj/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Jurnal</a>
           <a href="<?= base_url('pilihan/menu/ju/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Jurnal</a>
           <a href="<?= base_url('pilihan/menu/jps/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Jurnal</a>
           <a href="<?= base_url('pilihan/menu/jurnal/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Jurnal</a>           
           <a href="<?= base_url('pilihan/menu/buku_besar/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Buku Besar</a>
           <a href="<?= base_url('pilihan/menu/kertas_kerja/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Kertas kerja</a>
           <a href="<?= base_url('pilihan/menu/laporan/'.$bulan_pilih.'/' . $tahun_pilih) ?>" class="btn btn-secondary btn-lg">Laporan</a>
            


            <!-- isi -->

            <!-- <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Design <small>different form elements</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="dropdown-item" href="#">Settings 1</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>
                        <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">First Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" required="required" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Last Name <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="last-name" name="last-name" required="required" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Select</label>
                                <div class="col-md-9 col-sm-9 ">
                                    <select class="form-control col-md-6 col-sm-6 ">
                                        <option>Choose option</option>
                                        <option>Option one</option>
                                        <option>Option two</option>
                                        <option>Option three</option>
                                        <option>Option four</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Middle Name / Initial</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="middle-name" class="form-control" type="text" name="middle-name">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male" class="join-btn" data-parsley-multiple="gender"> &nbsp; Male &nbsp;
                                        </label>
                                        <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="female" class="join-btn" data-parsley-multiple="gender"> Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="date" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div> -->



        </div>


    </div>
</div>
