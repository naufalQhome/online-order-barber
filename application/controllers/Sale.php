<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->library('phpmailer_lib');
        $this->load->model('Data_model');
    }



    public function index()
    {
        if ($this->session->has_userdata('konfirmasi') == 'TRUE') {
            redirect('sale/konfirmasi');
        };
        if ($this->session->has_userdata('validasi') == 'TRUE') {
            redirect('sale/validasi');
        };
        if ($this->session->has_userdata('sessionUser') == 'TRUE') {
            // echo 'iniheee';
            $data['sessionData'] = $this->session->userdata();
            $this->load->model('Data_model');
            $data['paket1'] = $this->Data_model->getPaket();
            $data['kecamatan'] = $this->Data_model->getKec();
            $data['waktu'] = $this->Data_model->getWaktu();
            $this->load->view('template/header_index', $data);
            $this->load->view('sale/indexUser', $data);
            $this->load->view('template/footer_index', $data);
        } else {
            // $data['sessionData'] = $this->session->userdata();
            $this->load->model('Data_model');
            $data['paket1'] = $this->Data_model->getPaket();
            $data['kecamatan'] = $this->Data_model->getKec();
            $data['waktu'] = $this->Data_model->getWaktu();
            $this->load->view('template/header_index', $data);
            $this->load->view('sale/index', $data);
            $this->load->view('template/footer_index', $data);
        };
    }

    public function konfirmasi()
    {
        if ($this->session->has_userdata('validasi') == 'TRUE') {
            redirect('sale/validasi');
        };


        $databaru = array(
            'kodeUnik' => $this->input->post('kodeUnik', true),
            'namaCustomer' => $this->input->post('namaCustomer', true),
            'pilihanPaket' => $this->input->post('pilihanPaket', true),
            'nomorCustomer' => $this->input->post('nomorCustomer', true),
            'pilihanTempat' => $this->input->post('pilihanTempat', true),
            'tanggalCukur' => $this->input->post('tanggalCukur', true),
            'jamCukur' => $this->input->post('jamCukur', true),
            'konfirmasi' => TRUE,
            'sessionUser' => TRUE,
        );
        $paket = $databaru['pilihanPaket'];
        $kec =  $databaru['pilihanTempat'];
        $paket = $this->Data_model->s_getPaket($paket);
        $kecamatan = $this->Data_model->s_getKec($kec);
        foreach ($paket as $row) {
            $idPaket[] = $row['id_paket'];
            $harga[] =  $row['harga_paket'];
        };
        $harga[] = $kecamatan['harga_kec'];
        $harga[] = $databaru['kodeUnik'];
        // var_dump($idPaket);
        $totalHarga = array_sum($harga);
        $s_pilihanPaket = implode(",", $idPaket);
        // echo $s_pilihanPaket;
        $t_tanggal = $databaru['tanggalCukur'];
        $s_tanggal = date("Y-m-d", strtotime("$t_tanggal"));
        $order = [
            'kode_order' => $databaru['kodeUnik'],
            'nama_order' => $databaru['namaCustomer'],
            'paket_order' => $s_pilihanPaket,
            'ponsel_order' => $databaru['nomorCustomer'],
            'tempat_order' => $databaru['pilihanTempat'],
            'tanggal_order' => $s_tanggal,
            'jam_order' => $databaru['jamCukur'],
            'total_order' => $totalHarga,
        ];
        $data = $this->Data_model->orderCustomer($order);
        echo '<pre>', var_dump($order), '</pre>';


        // $kode = null;
        // $cekSession = $this->session->userdata();
        // if (isset($cekSession['kodeUnik'])) {
        //     $databaru = $this->session->userdata();

        //     $this->load->model('Data_model');
        //     $paket =  $databaru['pilihanPaket'];
        //     $kec =  $databaru['pilihanTempat'];
        //     $data['data'] = $databaru;
        //     $data['paket'] = $this->Data_model->s_getPaket($paket);
        //     $data['kecamatan'] = $this->Data_model->s_getKec($kec);
        //     $this->load->view('template/header_another', $data);
        //     $this->load->view('sale/konfirmasi', $data);
        //     $this->load->view('template/footer', $data);
        // } elseif (isset($databaru['kodeUnik'])) {
        //     $this->session->set_userdata($databaru);
        //     $databaru = $this->session->userdata();

        //     $this->load->model('Data_model');
        //     $paket =  $databaru['pilihanPaket'];
        //     $kec =  $databaru['pilihanTempat'];
        //     $data['data'] = $databaru;
        //     $data['paket'] = $this->Data_model->s_getPaket($paket);
        //     $data['kecamatan'] = $this->Data_model->s_getKec($kec);
        //     $this->load->view('template/header_another', $data);
        //     $this->load->view('sale/konfirmasi', $data);
        //     $this->load->view('template/footer', $data);
        // } elseif (!isset($cekSession['kodeUnik'])) {
        //     $this->load->view('template/header_another', $data);
        //     $this->load->view('sale/konfirmasiGagal');
        //     $this->load->view('template/footer', $data);
        // } else {
        //     echo "tetooot";
        // };
    }

    public function toValid()
    {
        $sessionBaru = array('validasi' => TRUE);
        $hapusSession = array('konfirmasi', 'pilihanPaket', 'pilihanTempat', 'tanggalCukur');
        $this->session->set_userdata($sessionBaru);
        $this->session->unset_userdata($hapusSession);
        $this->load->model('Data_model');
        $order = [
            'kode_order' => $this->input->post('kodeUnik', true),
            'nama_order' => $this->input->post('namaCustomer', true),
            'paket_order' => $this->input->post('pilihanPaket', true),
            'ponsel_order' => $this->input->post('nomorCustomer', true),
            'tempat_order' => $this->input->post('pilihanTempat', true),
            'tanggal_order' => $this->input->post('tanggalCukur', true),
            'jam_order' => $this->input->post('jamCukur', true),
            'total_order' => $this->input->post('grandTotal', true),
        ];
        $data = $this->Data_model->orderCustomer($order);
        $id = $data['insert_id'];
        $sessionId = array('id_custom' => $id);
        $this->session->set_userdata($sessionId);
        $joinKec = $this->Data_model->orderCostumerJoin($id);

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();

        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'mail.m-barber.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'layanan@m-barber.com';
        $mail->Password = 'ljt=uaA{Od8u';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;

        $mail->setFrom('layanan@m-barber.com', 'm-Barber');
        $mail->addReplyTo('layanan@m-barber.com', 'm-Barber');

        // Add a recipient
        $mail->addAddress('barbermobile1@gmail.com');

        // // Add cc or bcc 
        // $mail->addCC('arfinhenditya2@gmail.com');
        $mail->addBCC('n20041996@gmail.com');

        // Email subject
        $mail->Subject = 'ID ' . $id . ' ' . $order['nama_order'];

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h1>Rp." . $order['total_order'] . " ,-</h1>
            <p>
            <li>Nama : " . $order['nama_order'] . "</li><br><li>Paket : " . $order['paket_order'] . "</li><br><li>Ponsel : " . $order['ponsel_order'] . "</li><br><li>Kec : " . $joinKec['nama_kec'] . "</li><br><li>Tanggal : " . $order['tanggal_order'] . "</li><br><li>Jam : " . $order['jam_order'] . "</li><br><li>Total : Rp. " . number_format($order['total_order']) . ",-</li><br></p><a href='https://api.whatsapp.com/send?phone=" . $order['ponsel_order'] . "&text=Hai!%20terimakasih%20anda%20telah%20mendaftar%20cukur%20rambut%20pada%20m-barber.com%20'>Klik untuk chat WA" . $order['ponsel_order'] . "</a>";
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
            $this->load->view('template/header_another');
            $this->load->view('sale/konfirmasiGagal');
            $this->load->view('template/footer');
        } else {
            redirect('sale/validasi/' . $id);
        }
    }
    public function validasi()
    {
        $id =  $this->session->userdata('id_custom');
        $this->load->model('Data_model');
        $dataid = $this->Data_model->orderCostumerJoin($id);
        $data['order'] = $dataid;
        $this->load->view('template/header_another', $data);
        $this->load->view('sale/validasi', $data);
        $this->load->view('template/footer', $data);
    }

    public function pesanLagi()
    {
        // $this->session->sess_destroy();
        $hapusSession = array('kodeUnik', 'konfirmasi', 'validasi', 'pilihanPaket', 'pilihanTempat', 'tanggalCukur', 'id_custom');
        $this->session->unset_userdata($hapusSession);

        redirect('sale');
    }

    public function drop()
    {
        $this->session->sess_destroy();
        // $hapusSession = array('konfirmasi', 'validasi', 'pilihanPaket', 'pilihanTempat', 'tanggalCukur', 'id_custom');
        // $this->session->unset_userdata($hapusSession);

        redirect('sale/session');
    }

    public function session()
    {
        $databaru = $this->session->userdata();
        var_dump($databaru);

        // echo $databaru['kodeUnik'];
    }
}
