<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Data Barang
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addBarang"><i class="fa fa-plus"></i> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Barang</h3>
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
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
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
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editBarangOld/'.$record->barangId; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteBarang" href="#" data-userid="<?php echo $record->barangId; ?>"><i class="fa fa-trash"></i></a>

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
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
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
