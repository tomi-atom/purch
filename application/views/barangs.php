<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-book"></i> Data Barang
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <?php

        if($role == ROLE_ADMIN)
        {
            ?>
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="form-group">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>addBarang"><i class="fa fa-plus"></i> Add New</a>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>

        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <hr>
                    
    <link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" /> <!-- Load file css jquery-ui -->
    <script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
                    <form method="get" action="">
                        <div class="row">
                            <div class="col-xs-2">
                                <div id="form-select">
                                    <label>Filter Berdasarkan</label><br>
                                    <select name="filter" id="filter">
                                        <option value="">Pilih</option>
                                        <option value="1">Per Tanggal</option>
                                        <option value="2">Per Bulan</option>
                                        <option value="3">Per Tahun</option>
                                    </select>
                                    <br /><br />
                                </div>

                            </div>
                            <div class="col-xs-3 text-left">
                                <div id="form-tanggal">
                                    <label>Tanggal</label><br>
                                    <input  type="text" name="tanggal" class="input-tanggal" />
                                    <br />
                                </div>

                            </div>
                            <div class="col-xs-2">
                                <div id="form-bulan">
                                    <label>Bulan</label><br>
                                    <select name="bulan">
                                        <option value="">Pilih</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div id="form-tahun">
                                    <label>Tahun</label><br>
                                    <select name="tahun">
                                        <option value="">Pilih</option>
                                        <?php
                                        foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                                            echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <br /><br />
                                </div>
                            </div>
                            <div class="box-tools">
                                <form action="<?php echo base_url() ?>barangListing" method="POST" id="searchList">
                                    <div class="input-group">
                                        <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-1 text-right">
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-info">Tampilkan</button>
                                </div>
                            </div>
                            <div class="col-xs-1 text-left">
                                <div class="form-group">
                                    <a class="btn btn-default" href="<?php echo base_url(); ?>barangListing">Reset Filter</a>
                                </div>
                            </div>
                            <div class="col-xs-2 text-right">
                                <div class="form-group">
                                    <a class="btn btn-warning" href="<?php echo base_url(); ?>addBarang"><i class="fa fa-print"></i> Cetak</a>
                                </div>
                            </div>
                        </div>

                    </form>
                    <hr />


                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-border">
                  <table class="table table-hover">
                    <tr>
                        <th>Tanggal</th>
                      <th>Mesin</th>
                      <th>Aktual Pakai</th>
                      <th>Detail</th>
                      <th>NO NPB</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Pesan</th>
                        <th>NO PO</th>
                        <th>Suplier</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah Masuk</th>
                        <th>Keterangan</th>
                        <th>Harga</th>
                        <th>Jumlah Harga</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($barangRecords))
                    {
                        foreach($barangRecords as $record)
                        {
                    ?>
                            <?php $record->barangId ?>
                    <tr>
                        <td><?php echo $record->tanggal ?></td>
                      <td><?php echo $record->id_mesin ?></td>
                      <td><?php echo $record->id_aktual_pakai ?></td>
                        <td><?php echo $record->detail ?></td>
                        <td><?php echo $record->no_npb ?></td>
                        <td><?php echo $record->nama_barang ?></td>
                        <td><?php echo $record->jumlah_pesan ?></td>
                        <td><?php echo $record->no_po?></td>
                        <td><?php echo $record->id_suplier?></td>
                        <td><?php echo $record->tanggal_masuk ?></td>
                        <td><?php echo $record->jumlah_masuk?></td>
                        <td><?php echo $record->keterangan?></td>
                        <td><?php echo $record->harga ?></td>
                        <td><?php echo $record->jumlah_harga ?></td>


                        <td class="text-center">

                            <?php

                            if($role == ROLE_ADMIN)
                            {
                                ?>
                                <a class="btn btn-sm btn-info" href="<?php echo base_url().'editBarangOld/'.$record->barangId; ?>"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-sm btn-danger deleteBarang" href="#" data-barangid="<?php echo $record->barangId; ?>"><i class="fa fa-trash"></i></a>


                                <?php
                            }
                            ?>

                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>


                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common2.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "barangListing/" + value);
            jQuery("#searchList").submit();
        });
    });
   
</script>
   <script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
    <script>
        $(document).ready(function(){ // Ketika halaman selesai di load
            $('.input-tanggal').datepicker({
                dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
            });
            $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
            $('#filter').change(function(){ // Ketika user memilih filter
                if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                    $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                    $('#form-tanggal').show(); // Tampilkan form tanggal
                }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                    $('#form-tanggal').hide(); // Sembunyikan form tanggal
                    $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
                }else{ // Jika filternya 3 (per tahun)
                    $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                    $('#form-tahun').show(); // Tampilkan form tahun
                }
                $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
            })
        })
    </script>

