<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function barangListingCount($searchText = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_barangs');
        if(!empty($searchText)) {
            $likeCriteria = "(id_mesin  LIKE '%".$searchText."%'
                            OR  id_aktual_pakai  LIKE '%".$searchText."%'
                            OR   id_suplier LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $query = $this->db->get();

        return count($query->result());
    }

    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function barangListing($searchText = '', $page, $segment)
    {
        $this->db->select('*');
        $this->db->from('tbl_barangs');
        if(!empty($searchText)) {
            $likeCriteria = "(id_mesin  LIKE '%".$searchText."%'
                            OR  id_aktual_pakai  LIKE '%".$searchText."%'
                            OR   id_suplier LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }


        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }

    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getBarangRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewBarang($barangInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_barangs', $barangInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getBarangInfo($barangId)
    {
        $this->db->select('barangId,tanggal,id_mesin,id_aktual_pakai,detail,no_npb,nama_barang,jumlah_pesan,no_po,id_suplier,tanggal_masuk,jumlah_masuk,keterangan,harga,jumlah_harga,');
        $this->db->from('tbl_barangs');
        //$this->db->where('isDeleted', 0);
		//$this->db->where('roleId !=', 1);
        $this->db->where('barangId', $barangId);
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editBarang($barangInfo, $barangId)
    {
        $this->db->where('barangId', $barangId);
        $this->db->update('tbl_barangs', $barangInfo);

        return TRUE;
    }



    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteBarang($barangId, $barangInfo)
    {
        $this->db->where('barangId', $barangId);
        $this->db->delete('tbl_barangs', $barangInfo);

        return $this->db->affected_rows();
    }
    function deleterecords($id)
    {
        $this->db->query("delete  from users where user_id='".$id."'");
    }

    public function view_by_date($date){
        $this->db->where('DATE(tanggal)', $date); // Tambahkan where tanggal nya

        return $this->db->get('tbl_barangs')->result();// Tampilkan data barangs sesuai tanggal yang diinput oleh user pada filter
    }

    public function view_by_month($month, $year){
        $this->db->where('MONTH(tanggal)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun

        return $this->db->get('tbl_barangs')->result(); // Tampilkan data barangs sesuai bulan dan tahun yang diinput oleh user pada filter
    }

    public function view_by_year($year){
        $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun

        return $this->db->get('tbl_barangs')->result(); // Tampilkan data barangs sesuai tahun yang diinput oleh user pada filter
    }

    public function view_all(){
        return $this->db->get('tbl_barangs')->result(); // Tampilkan semua data barangs
    }

    public function option_tahun(){
        $this->db->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tanggal
        $this->db->from('tbl_barangs'); // select ke tabel barangs
        $this->db->order_by('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal)'); // Group berdasarkan tahun pada field tanggal

        return $this->db->get()->result(); // Ambil data pada tabel barangs sesuai kondisi diatas
    }
}
