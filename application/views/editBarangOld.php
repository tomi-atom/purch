<?php

$barangId = '';
$tanggal = '';
$id_mesin = '';
$id_aktual_pakai = '';
$detail = '';
$no_npb = '';
$nama_barang = '';
$jumlah_pesan = '';
$no_po = '';
$id_suplier = '';
$tanggal_masuk = '';
$jumlah_masuk = '';
$keterangan = '';
$harga = '';
$jumlah_harga = '';



if(!empty($barangInfo))
{
    foreach ($barangInfo as $uf)
    {
        $barangId = $uf->barangId;
        $tanggal = $uf->tanggal;
        $id_mesin = $uf->id_mesin;
        $id_aktual_pakai = $uf->id_aktual_pakai;
        $detail = $uf->detail;
        $no_npb = $uf->no_npb;
        $nama_barang = $uf->nama_barang;
        $jumlah_pesan = $uf->jumlah_pesan;
        $no_po = $uf->no_po;
        $id_suplier = $uf->id_suplier;
        $tanggal_masuk = $uf->tanggal_masuk;
        $jumlah_masuk = $uf->jumlah_masuk;
        $keterangan = $uf->keterangan;
        $harga = $uf->harga;
        $jumlah_harga = $uf->jumlah_harga;
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Management
        <small>Add / Edit User</small>
      </h1>
    </section>

    <section class="content">

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->



                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter User Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->

                    <form role="form" action="<?php echo base_url() ?>editBarang" method="post" id="editBarang" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <input type="text" class="form-control" id="tanggal" placeholder="Tanggal" name="tanggal" value="<?php echo $tanggal; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $barangId; ?>" name="barangId" id="barangId" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_mesin">Mesin</label>
                                        <input type="text" class="form-control" id="id_mesin" placeholder="Enter Mesin" name="id_mesin" value="<?php echo $id_mesin; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_aktual_pakai">Aktual Pakai</label>
                                        <input type="text" class="form-control" id="id_aktual_pakai" placeholder="Enter Aktual Pakai" name="id_aktual_pakai" value="<?php echo $id_aktual_pakai; ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="detail">Detail</label>
                                        <input type="text" class="form-control" id="detail" placeholder="Enter Detail" name="detail" value="<?php echo $tdetail; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_npb">NO NPB</label>
                                        <input type="text" class="form-control" id="no_npb" placeholder="Enter NO NPB" name="no_npb" value="<?php echo $no_npb; ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" class="form-control" id="nama_barang" placeholder="Enter Nama Barang" name="nama_barang" value="<?php echo $nama_barang; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah_pesan">Jumlah Pesan</label>
                                        <input type="text" class="form-control" id="jumlah_pesan" placeholder="Enter Jumlah Pesan" name="jumlah_pesan" value="<?php echo $jumlah_pesan; ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_po">NO PO</label>
                                        <input type="text" class="form-control" id="no_po" placeholder="Enter NO PO" name="no_po" value="<?php echo $no_po; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="id_suplier">Suplier</label>
                                        <input type="text" class="form-control" id="id_suplier" placeholder="Enter Suplier" name="id_suplier" value="<?php echo $id_suplier; ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_masuk">Tanggal Masuk</label>
                                        <input type="text" class="form-control" id="tanggal_masuk" placeholder="Enter Tanggal Masuk" name="text" value="<?php echo $tanggal_masuk; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah_masuk">Jumlah Masuk</label>
                                        <input type="text" class="form-control" id="jumlah_masuk" placeholder="Enter Jumlah Masuk" name="jumlah_masuk" value="<?php echo $jumlah_masuk; ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" placeholder="Enter Keterangan" name="keterangan" value="<?php echo $keterangan; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" class="form-control" id="harga" placeholder="Enter Harga" name="harga" value="<?php echo $harga; ?>" maxlength="128">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jumlah_harga">Jumlah Harga</label>
                                        <input type="text" class="form-control" id="jumlah_harga" placeholder="Enter Jumlah Harga" name="jumlah_harga" value="<?php echo $jumlah_harga; ?>" maxlength="128">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php } ?>
                <?php
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
