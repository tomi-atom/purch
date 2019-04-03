/**
 * File : addUser.js
 *
 * This file contain the validation of add user form
 *
 * Using validation plugin : jquery.validate.js
 *
 * @author Kishor Mali
 */

$(document).ready(function(){

    var addBarangForm = $("#addBarang");

    var validator = addBarangForm.validate({

        rules:{
            tanggal :{ required : true },
            id_mesin :{ required : true },
            id_aktual_pakai :{ required : true },
            detail :{ required : true },
            no_npb :{ required : true },
            nama_barang :{ required : true },
            jumlah_pesan :{ required : true },
            no_po :{ required : true },
            id_suplier :{ required : true },
            tanggal_masuk :{ required : true },
            nama_faktur :{ required : true },
            jumlah_masuk :{ required : true },
            keterangan :{ required : true },
            harga :{ required : true },
            jumlah_harga :{ required : true },


        },
        messages:{
            tanggal :{ required : "Data harus di isi" },
            id_mesin :{ required : "Data harus di isi" },
            id_aktual_pakai :{ required : "Data harus di isi" },
            detail :{ required : "Data harus di isi" },
            no_npb :{ required : "Data harus di isi" },
            nama_barang :{ required : "Data harus di isi" },
            jumlah_pesan :{ required : "Data harus di isi" },
            no_po :{ required : "Data harus di isi" },
            id_suplier :{ required : "Data harus di isi" },
            tanggal_masuk :{ required : "Data harus di isi" },
            nama_faktur :{ required : "Data harus di isi" },
            jumlah_masuk :{ required : "Data harus di isi" },
            keterangan :{ required : "Data harus di isi" },
            harga :{ required : "Data harus di isi" },
            jumlah_harga :{ required : "Data harus di isi" },
        }
    });
});
