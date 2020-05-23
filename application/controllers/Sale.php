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

        var_dump($databaru);

        // if (!$this->session->has_userdata('id_konfirmasi')) {
        //     $databaru = array(
        //         'kodeUnik' => $this->input->post('kodeUnik', true),
        //         'namaCustomer' => $this->input->post('namaCustomer', true),
        //         'pilihanPaket' => $this->input->post('pilihanPaket', true),
        //         'nomorCustomer' => $this->input->post('nomorCustomer', true),
        //         'pilihanTempat' => $this->input->post('pilihanTempat', true),
        //         'tanggalCukur' => $this->input->post('tanggalCukur', true),
        //         'jamCukur' => $this->input->post('jamCukur', true),
        //         'konfirmasi' => TRUE,
        //         'sessionUser' => TRUE,
        //     );
        //     $this->session->set_userdata($databaru);
        //     $paket = $databaru['pilihanPaket'];
        //     $kec =  $databaru['pilihanTempat'];
        //     $paket = $this->Data_model->s_getPaket($paket);
        //     $kecamatan = $this->Data_model->s_getKec($kec);
        //     foreach ($paket as $row) {
        //         $idPaket[] = $row['id_paket'];
        //         $harga[] =  $row['harga_paket'];
        //     };
        //     $harga[] = $kecamatan['harga_kec'];
        //     $harga[] = $databaru['kodeUnik'];
        //     // var_dump($idPaket);
        //     $totalHarga = array_sum($harga);
        //     $s_pilihanPaket = implode(",", $idPaket);
        //     // echo $s_pilihanPaket;
        //     $t_tanggal = $databaru['tanggalCukur'];
        //     $s_tanggal = date("Y-m-d", strtotime("$t_tanggal"));
        //     $order = [
        //         'kode_order' => $databaru['kodeUnik'],
        //         'nama_order' => $databaru['namaCustomer'],
        //         'paket_order' => $s_pilihanPaket,
        //         'ponsel_order' => $databaru['nomorCustomer'],
        //         'tempat_order' => $databaru['pilihanTempat'],
        //         'tanggal_order' => $s_tanggal,
        //         'jam_order' => $databaru['jamCukur'],
        //         'total_order' => $totalHarga,
        //     ];
        //     $data = $this->Data_model->orderCustomer($order);
        //     $id_order = $data['insert_id'];
        //     $this->session->set_userdata('id_konfirmasi', $id_order);
        //     // echo '<pre>', var_dump($order), '</pre>';
        // }


        // $kode = null;
        // $cekSession = $this->session->userdata();
        // if (isset($cekSession['id_konfirmasi'])) {
        //     $databaru = $this->session->userdata();
        //     $id_order = $databaru['id_konfirmasi'];
        //     $kecamatan = $this->Data_model->s_getKec($databaru['pilihanTempat']);
        //     $paket = $this->Data_model->s_getPaket($databaru['pilihanPaket']);
        //     $jam = $this->Data_model->s_getWaktu($databaru['jamCukur']);
        //     $data['jam'] = $jam;
        //     $data['kecamatan'] = $kecamatan;
        //     $data['paket'] = $paket;
        //     $data['order'] = $this->Data_model->orderCustomerId($id_order);
        //     $this->load->view('template/header_another', $data);
        //     $this->load->view('sale/konfirmasi', $data);
        //     $this->load->view('template/footer', $data);
        // } elseif (isset($databaru['kode_order'])) {
        //     $this->session->set_userdata($databaru);
        //     $jam = $this->Data_model->s_getWaktu($databaru['jamCukur']);
        //     $id_order = $databaru['id_konfirmasi'];
        //     $databaru = $this->session->userdata();
        //     $data['kecamatan'] = $kecamatan;
        //     $data['paket'] = $paket;
        //     $data['order'] = $this->Data_model->orderCustomerId($id_order);
        //     $this->load->view('template/header_another', $data);
        //     $this->load->view('sale/konfirmasi', $data);
        //     $this->load->view('template/footer', $data);
        // } elseif (!isset($cekSession['kode_order'])) {
        //     $this->load->view('template/header_another');
        //     $this->load->view('sale/konfirmasiGagal');
        //     $this->load->view('template/footer');
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
        $id_data = $this->session->userdata('id_konfirmasi');
        // $order = [
        //     'kode_order' => $this->input->post('kodeUnik', true),
        //     'nama_order' => $this->input->post('namaCustomer', true),
        //     'paket_order' => $this->input->post('pilihanPaket', true),
        //     'ponsel_order' => $this->input->post('nomorCustomer', true),
        //     'tempat_order' => $this->input->post('pilihanTempat', true),
        //     'tanggal_order' => $this->input->post('tanggalCukur', true),
        //     'jam_order' => $this->input->post('jamCukur', true),
        //     'total_order' => $this->input->post('grandTotal', true),
        // ];
        // $update = array('id_order' => $id_data, 'konfirmasi_order' => 1);
        $data = $this->Data_model->updateCustomerId($id_data);
        $sessionId = array('id_custom' => $id_data);
        $this->session->set_userdata($sessionId);
        $joinKec = $this->Data_model->orderCostumerJoin($id_data);
        $tanggal = date("d-m-Y", strtotime($data['tanggal_order']));
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
        $mail->Subject = 'ID ' . $id_data . ' ' . $data['nama_order'];

        // Set email format to HTML
        $mail->isHTML(true);

        // Email body content
        $mailContent = "<h1>Rp." . $data['total_order'] . " ,-</h1>
            <p>Hai! kami dari m-barber.com ingin mengonfirmasi pesanan
            <li>Nama : " . $data['nama_order'] . "</li><li>Paket : " . $data['paket_order'] . "</li><li>Ponsel : " . $data['ponsel_order'] . "</li><li>Kec : " . $joinKec['nama_kec'] . "</li><li>Tanggal : " . $tanggal . "</li><li>Jam : " . $data['jam_order'] . "</li><li>Total : Rp. " . number_format($data['total_order']) . ",-</li>Telah berhasil terdaftar, kapster kami akan menghubungi anda paling lambat 1 jam sebelum waktu yang di tentukan. Terima kasih<br></p><a href='https://api.whatsapp.com/send?phone=" . $data['ponsel_order'] . "&text=Hai!%20terimakasih%20anda%20telah%20mendaftar%20cukur%20rambut%20pada%20m-barber.com%20'>Klik untuk chat WA " . $data['ponsel_order'] . "</a>";
        $mail->Body = $mailContent;

        // Send email
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
            $this->load->view('template/header_another');
            $this->load->view('sale/konfirmasiGagal');
            $this->load->view('template/footer');
        } else {
            redirect('sale/validasi/' . $id_data);
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
        $hapusSession = array('kodeUnik', 'konfirmasi', 'validasi', 'pilihanPaket', 'pilihanTempat', 'tanggalCukur', 'id_custom', 'id_konfirmasi');
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
        echo '<pre>', var_dump($databaru), '<pre>';

        // echo $databaru['kodeUnik'];
    }
}
