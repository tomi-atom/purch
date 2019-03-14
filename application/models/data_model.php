<?php defined('BASEPATH') OR exit('No direct script access allowed');

class data_model extends CI_Model
{
    private $_table = "tbl_barangs";

    public $barangId;
    public $tanggal;
    public $id_mesin;
    public $id_aktual_pakai;
    public $detail;
    public $no_npb;
    public $nama_barang;
    public $jumlah_pesan;
    public $no_po;
    public $id_suplier;
    public $tanggal_masuk;
    public $jumlah_masuk;
    public $keterangan;
    public $harga;
    public $jumlah_harga;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'],

            ["field" => 'id_mesin',
                'label' => 'Mesin',
                'rules' => 'required'],

            ['field' => 'id_aktual_pakai',
                'label' => 'Aktual Pakai',
                'rules' => 'required'],

            ["field" => 'detail',
                'label' => 'Detail',
                'rules' => 'required'],

            ["field" => 'no_npb',
                'label' => 'NO NPB',
                'rules' => 'required'],

            ["field" => 'nama_barang',
                'label' => 'Nama Barang',
                'rules' => 'required'],

            ["field" => 'jumlah_pesan',
                'label' => 'Jumlah Pesan',
                'rules' => 'required'],

            ["field" => 'no_po',
                'label' => 'NO PO',
                'rules' => 'required'],

            ["field" => 'id_suplier',
                'label' => 'Suplier',
                'rules' => 'required'],

            ["field" => 'tanggal_masuk',
                'label' => 'Tanggal Masuk',
                'rules' => 'required'],

            ["field" => 'jumlah_masuk',
                'label' => 'Jumlah Masuk',
                'rules' => 'required'],

            ["field" => 'keterangan',
                'label' => 'Keterangan',
                'rules' => 'required'],

            ["field" => 'harga',
                'label' => 'Harga',
                'rules' => 'required'],

            ["field" => 'jumlah_harga',
                'label' => 'Jumlah Harga',
                'rules' => 'required']

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["barangId" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->barangId = uniqid();
        $this->tanggal = $post["tanggal"];
        $this->id_mesin = $post["id_mesin"];
        $this->id_aktual_pakai = $post["id_aktual_pakai"];
        $this->detail = $post["detail"];
        $this->no_npb = $post["no_npb"];
        $this->nama_barang = $post["nama_barang"];
        $this->jumlah_pesan = $post["jumlah_pesan"];
        $this->no_po = $post["no_po"];
        $this->id_suplier = $post["id_suplier"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->jumlah_masuk = $post["jumlah_masuk"];
        $this->keterangan = $post["keterangan"];
        $this->harga = $post["harga"];
        $this->jumlah_harga = $post["jumlah_harga"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {$post = $this->input->post();
        $this->barangId = $post["id"];
        $this->tanggal = $post["tanggal"];
        $this->id_mesin = $post["id_mesin"];
        $this->id_aktual_pakai = $post["id_aktual_pakai"];
        $this->detail = $post["detail"];
        $this->no_npb = $post["no_npb"];
        $this->nama_barang = $post["nama_barang"];
        $this->jumlah_pesan = $post["jumlah_pesan"];
        $this->no_po = $post["no_po"];
        $this->id_suplier = $post["id_suplier"];
        $this->tanggal_masuk = $post["tanggal_masuk"];
        $this->jumlah_masuk = $post["jumlah_masuk"];
        $this->keterangan = $post["keterangan"];
        $this->harga = $post["harga"];
        $this->jumlah_harga = $post["jumlah_harga"];
        $this->db->update($this->_table, $this, array('barangId' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("barangId" => $id));
    }
}
