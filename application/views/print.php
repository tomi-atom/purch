<html>
<head>
    <title>Cetak PDF</title>
    <style>

        div{

            overflow-x: auto;

            width: 50%;

            margin: auto;

        }
        table {
            border-collapse:collapse;
            word-wrap:break-word;
            width: 40px;
        }
        table td {
            table-layout: auto;
            width: 60px;
            text-align: center;
            word-wrap: initial;
            font-size: 10px;

        }

    </style>
</head>
<body>
<b>Laporan Permintaan Barang</b><br /><br />
<div class="box-body table-responsive no-border">
    <table class="table table-responsive table-hover" border="1" >
        <tr bgcolor="#7fffd4">
            <td>Tanggal</td>
            <td>Mesin</td>
            <td>Aktual Pakai</td>
            <td>Detail</td>
            <td>NO NPB</td>
            <td>Nama Barang</td>
            <td>Jumlah Pesan</td>
            <td>NO PO</td>
            <td>Suplier</td>
            <td>Tanggal Masuk</td>
            <td>Nama Faktur</td>
            <td>Jumlah Masuk</td>
            <td>Sisa</td>
            <td>Keterangan</td>
            <td>Harga (Rp)</td>
            <td>Jumlah Harga (Rp)</td>

        </tr>
        <?php
        if(!empty($barangs))
        {
            foreach($barangs as $record)
            {
                ?>
                <?php $tanggal = date('d-m-Y', strtotime($record->tanggal)); ?>
                <?php $record->barangId ?>
                <?php $jumlah_pesan = $record->jumlah_pesan ?>
                <?php $jumlah_masuk = $record->jumlah_masuk ?>
                <?php $sisa = $jumlah_pesan-$jumlah_masuk ?>
                <?php $harga = $record->harga ?>
                <?php $jumlah_harga = $jumlah_masuk*$harga ?>
                <tr>
                    <td><?php echo $record->tanggal ?></td>
                    <td><?php echo $record->id_mesin ?></td>
                    <td><?php echo $record->id_aktual_pakai ?></td>
                    <td><?php echo $record->detail ?></td>
                    <td><?php echo $record->no_npb ?></td>
                    <td><?php echo $record->nama_barang ?></td>
                    <td><?php echo $jumlah_pesan ?></td>
                    <td><?php echo $record->no_po?></td>
                    <td><?php echo $record->id_suplier?></td>
                    <td><?php echo $record->tanggal_masuk ?></td>
                    <td><?php echo $record->nama_faktur ?></td>
                    <td><?php echo $jumlah_masuk?></td>
                    <td><?php echo $sisa?></td>
                    <td><?php echo $record->keterangan?></td>
                    <td><?php echo number_format($harga,2,',','.') ?></td>
                    <td><?php echo number_format($jumlah_harga,2,',','.') ?></td>

                </tr>
                <?php
            }
        }
        ?>
        <?php
        $jumlah_harga_total = 0;

        if(!empty($barangs))
        {
            foreach($barangs as $record)
            {
                ?>
                <?php $jumlah_masuk = $record->jumlah_masuk ?>
                <?php $harga = $record->harga ?>
                <?php $jumlah_harga = $jumlah_masuk*$harga ?>
                <?php $jumlah_harga_total +=  $jumlah_harga ?>


                <?php
            }
        }
        ?>
        <tr>
            <th colspan="14">Total Jumlah Harga </th>

            <th colspan="2" ><?php echo 'Rp ',number_format( $jumlah_harga_total,2,',','.') ?></th>
        </tr>

    </table>


</div><!-- /.box-body -->
</body>
</html>