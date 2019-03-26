<html>
<head>
    <title>Cetak PDF</title>
    <style>
        table {
            border-collapse:collapse;
            table-layout:fixed;width: 350px;
        }
        table td {
            word-wrap:break-word;
            width: 20%;
        }
    </style>
</head>
<body>
<b>Laporan Permintaan Barang</b><br /><br />
<div class="box-body table-responsive no-border">
    <table class="table table-responsive table-hover" border="1" >
        <tr bgcolor="#7fffd4">
            <td>Tanggal  </td>
            <td>Mesin</td>
            <td>Aktual Pakai</td>
            <td>Detail</td>
            <td>NO NPB</td>
            <td>Nama Barang</td>
            <td>Jumlah Pesan</td>
            <td>NO PO</td>
            <td>Suplier</td>
            <td>Tanggal Masuk</td>
            <td>Jumlah Masuk</td>
            <td>Keterangan</td>
            <td>Harga</td>
            <td>Jumlah Harga</td>

        </tr>
        <?php
        if(!empty($barangs))
        {
            foreach($barangs as $record)
            {
                ?>
                <?php $tanggal = date('d-m-Y', strtotime($record->tanggal)); ?>
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


                </tr>
                <?php
            }
        }
        ?>
    </table>


</div><!-- /.box-body -->
</body>
</html>