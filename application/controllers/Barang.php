<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Barang extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'PT. Dumai Jaya Adamas : Dashboard';


        $this->loadViews("dashboard", $this->global, NULL , NULL);

    }

    /**
     * This function is used to load the user list
     */
    function barangListing()
    {

            $this->load->model('barang_model');

        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tanggal = $_GET['tanggal'];

                $ket = 'Data barangs Tanggal '.date('d-m-y', strtotime($tanggal));
                $url_cetak = 'barangs/cetak?filter=1&tahun='.$tanggal;
                $barangs = $this->barang_model->view_by_date($tanggal); // Panggil fungsi view_by_date yang ada di barang_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data barangs Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'barangs/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $barangs = $this->barang_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di barang_model
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data barangs Tahun '.$tahun;
                $url_cetak = 'barangs/cetak?filter=3&tahun='.$tahun;
                $barangs = $this->barang_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di barang_model
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data barangs';
            $url_cetak = 'barangs/cetak';
            $barangs = $this->barang_model->view_all(); // Panggil fungsi view_all yang ada di barang_model
        }

            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->barang_model->barangListingCount($searchText);

			$returns = $this->paginationCompress ( "barangListing/", $count, 10 );

            $data['ket'] = $this->barang_model->barangListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'PT. Dumai Jaya Adamas : User Listing';


        $data['ket'] = $ket;
       // $data['url_cetak'] = base_url('barangListing/'.$url_cetak);
        $data['barangs'] = $barangs;
        $data['option_tahun'] = $this->barang_model->option_tahun();
        //  $this->load->view('view', $data);
            $this->loadViews("barangs", $this->global, $data, NULL);


    }

    /**
     * This function is used to load the add new form
     */
    function addBarang()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('barang_model');
            $data['roles'] = $this->barang_model->getBarangRoles();

            $this->global['pageTitle'] = 'PT. Dumai Jaya Adamas : Tambahkan Barang';

            $this->loadViews("addBarang", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }

    /**
     * This function is used to add new user to the system
     */
    function addNewBarang()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('tanggal','Tanggal','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('id_mesin','Mesin','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('id_aktual_pakai','Aktual Pakai','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('detail','Detail','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('no_npb','NO NPB','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('nama_barang','Nama Barang','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('jumlah_pesan','Jumlah Pesan','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('no_po','NO PO','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('id_suplier','Suplier','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('tanggal_masuk','Tanggal Masuk','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('keterangan','Keterangan','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('harga','Harga','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('jumlah_harga','Jumlah Harga','trim|required|max_length[128]|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->addNewBarang();
            }
            else
            {
                $tanggal = $this->input->post('tanggal');
                $id_mesin = $this->input->post('id_mesin');
                $id_aktual_pakai = $this->input->post('id_aktual_pakai');
                $detail = $this->input->post('detail');
                $no_npb = $this->input->post('no_npb');
                $nama_barang = $this->input->post('nama_barang');
                $jumlah_pesan = $this->input->post('jumlah_pesan');
                $no_po = $this->input->post('no_po');
                $id_suplier = $this->input->post('id_suplier');
                $tanggal_masuk = $this->input->post('tanggal_masuk');
                $jumlah_masuk = $this->input->post('jumlah_masuk');
                $keterangan = $this->input->post('keterangan');
                $harga = $this->input->post('harga');
                $jumlah_harga = $this->input->post('jumlah_harga');

                $barangInfo = array('tanggal'=>$tanggal,'id_mesin'=>$id_mesin,'id_aktual_pakai'=>$id_aktual_pakai,
                    'detail'=>$detail,'no_npb'=>$no_npb,'nama_barang'=>$nama_barang,'jumlah_pesan'=>$jumlah_pesan,
                    'no_po'=>$no_po,'id_suplier'=>$id_suplier,'tanggal_masuk'=>$tanggal_masuk,
                    'jumlah_masuk'=>$jumlah_masuk,'keterangan'=>$keterangan,'harga'=>$harga,'jumlah_harga'=>$jumlah_harga);

                $this->load->model('barang_model');
                $result = $this->barang_model->addNewBarang($barangInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Data Barang Berhasil Ditambahkan');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Data Barang Gagal Ditambahkan');
                }

                redirect('addBarang');
            }
        }
    }


    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editBarangOld($barangId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($barangId == null)
            {
                redirect('barangListing');
            }

            $data['roles'] = $this->barang_model->getBarangRoles();
            $data['barangInfo'] = $this->barang_model->getBarangInfo($barangId);

            $this->global['pageTitle'] = 'PT. Dumai Jaya Adamas : Edit Barang';

            $this->loadViews("editBarangOld", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to edit the user information
     */
    function editBarang()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $barangId = $this->input->post('barangId');

            $this->form_validation->set_rules('tanggal','Tanggal','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('id_mesin','Mesin','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('id_aktual_pakai','Aktual Pakai','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('detail','Detail','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('no_npb','NO NPB','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('nama_barang','Nama Barang','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('jumlah_pesan','Jumlah Pesan','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('no_po','NO PO','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('id_suplier','Suplier','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('tanggal_masuk','Tanggal Masuk','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('jumlah_masuk','Jumlah Masuk','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('keterangan','Keterangan','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('harga','Harga','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('jumlah_harga','Jumlah Harga','trim|required|max_length[128]|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->editBarangOld($barangId);
            }
            else
            {
                $tanggal = $this->input->post('tanggal');
                $id_mesin = $this->input->post('id_mesin');
                $id_aktual_pakai = $this->input->post('id_aktual_pakai');
                $detail = $this->input->post('detail');
                $no_npb = $this->input->post('no_npb');
                $nama_barang = $this->input->post('nama_barang');
                $jumlah_pesan = $this->input->post('jumlah_pesan');
                $no_po = $this->input->post('no_po');
                $id_suplier = $this->input->post('id_suplier');
                $tanggal_masuk = $this->input->post('tanggal_masuk');
                $jumlah_masuk = $this->input->post('jumlah_masuk');
                $keterangan = $this->input->post('keterangan');
                $harga = $this->input->post('harga');
                $jumlah_harga = $this->input->post('jumlah_harga');

                $barangInfo = array('tanggal'=>$tanggal,'id_mesin'=>$id_mesin,'id_aktual_pakai'=>$id_aktual_pakai,
                    'detail'=>$detail,'no_npb'=>$no_npb,'nama_barang'=>$nama_barang,'jumlah_pesan'=>$jumlah_pesan,
                    'no_po'=>$no_po,'id_suplier'=>$id_suplier,'tanggal_masuk'=>$tanggal_masuk,
                    'jumlah_masuk'=>$jumlah_masuk,'keterangan'=>$keterangan,'harga'=>$harga,'jumlah_harga'=>$jumlah_harga);


                $result = $this->barang_model->editBarang($barangInfo, $barangId);

                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Barang Berhasil Di Update');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Barang Gagal Di Update');
                }

                redirect('barangListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteBarang()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $barangId = $this->input->post('barangId');
            $barangInfo = array();

            $result = $this->barang_model->deleteBarang($barangId,$barangInfo);

            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'PT. Dumai Jaya Adamas : Change Password';

        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }


    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm new password','required|matches[newPassword]|max_length[20]');

        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));

                $result = $this->user_model->changePassword($this->vendorId, $usersData);

                if($result > 0) { $this->session->set_flashdata('success', 'Password updation successful'); }
                else { $this->session->set_flashdata('error', 'Password updation failed'); }

                redirect('loadChangePass');
            }
        }
    }

    public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tanggal = $_GET['tanggal'];

                $ket = 'Data barangs Tanggal '.date('d-m-y', strtotime($tanggal));
                $barangs = $this->barang_model->view_by_date($tanggal); // Panggil fungsi view_by_date yang ada di barang_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data barangs Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $barangs = $this->barang_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di barang_model
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data barangs Tahun '.$tahun;
                $barangs = $this->barang_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di barang_model
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data barangs';
            $barangs = $this->barang_model->view_all(); // Panggil fungsi view_all yang ada di barang_model
        }

        $data['ket'] = $ket;
        $data['barangs'] = $barangs;

        ob_start();
        $this->load->view('print', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('L','A4','en', false, 'UTF-8', array(7, 7, 10, 10));
        $pdf->WriteHTML($html);
        //$pdf->setTestTdInOnePage(true);
        $pdf->Output('Data barangs.pdf', 'D');
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = 'PT. Dumai Jaya Adamas : 404 - Page Not Found';

        $this->loadViews("404", $this->global, NULL, NULL);
    }

}

?>
