<?php
$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Daftar Produk');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->AddPage();
$i=0;
$html='<h3>Daftar Produk</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th width="5%" align="center">No</th>
                            <th width="35%" align="center">Nama Produk</th>
                            <th width="45%" align="center">Deskripsi</th>
                            <th width="15%" align="center">Harga</th>
                            <th width="15%" align="center">Harga</th>
                            <th width="15%" align="center">Harga</th>
                            <th width="15%" align="center">Harga</th>
                            <th width="15%" align="center">Harga</th>
                            <th width="15%" align="center">Harga</th>
                            <th width="15%" align="center">Harga</th>
                            <th width="15%" align="center">Harga</th>
                            <th width="15%" align="center">Harga</th>
                            <th width="15%" align="center">Harga</th>
                            <th width="15%" align="center">Harga</th>
                        </tr>';
foreach ($produk as $row)
{
    $i++;
    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$i.'</td>
                            <td>'.$row['tanggal'].'</td>
                            <td>'.$row['id_mesin'].'</td>
                            <td>'.$row['id_aktual_pakai'].'</td>
                            <td>'.$row['detail'].'</td>
                            <td>'.$row['no_npb'].'</td>
                            <td>'.$row['nama_barang'].'</td>
                            <td>'.$row['jumlah_pesan'].'</td>
                            <td>'.$row['no_po'].'</td>
                            <td>'.$row['id_suplier'].'</td>
                            <td>'.$row['tanggal_masuk'].'</td>
                            <td>'.$row['jumlah_masuk'].'</td>
                            <td>'.$row['keterangan'].'</td>
                            <td>'.$row['harga'].'</td>
                            <td>'.$row['jumlah_harga'].'</td>
                         </tr>';
}
$html.='</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('daftar_produk.pdf', 'I');
?>