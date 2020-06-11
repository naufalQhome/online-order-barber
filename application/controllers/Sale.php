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
        if ($this->session->has_userdata('konfirmasi')) {
            redirect('sale/konfirmasi');
        };
        if ($this->session->has_userdata('validasi')) {
            redirect('sale/validasi');
        };
        if ($this->session->has_userdata('sessionUser')) {
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
        $cekSession = $this->session->userdata();
        if ($this->session->has_userdata('validasi')) {
            redirect('sale/validasi');
        };
        if ($this->input->post('pembayaran', true) >= '1' or $this->session->has_userdata('id_konfirmasi')) {
            $pakets = $this->Data_model->getPaket();
            $databaru = array(
                'kodeUnik' => rand(10, 900),
                'namaCustomer' => $this->input->post('namaCustomer', true),
                'pilihanPaket' => array(),
                'nomorCustomer' => $this->input->post('nomorCustomer', true),
                'pilihanTempat' => $this->input->post('pilihanTempat', true),
                'tanggalCukur' => $this->input->post('tanggalCukur', true),
                'jamCukur' => $this->input->post('jamCukur', true),
                'pembayaran' => $this->input->post('pembayaran', true),
                'konfirmasi' => true,
                'sessionUser' => true,
            );


            if (!$this->session->has_userdata('id_konfirmasi')) {
                $this->session->set_userdata($databaru);
                $this->to_input_post($pakets, $databaru);

                // echo '<pre>', var_dump($order), '</pre>';
            }


            if (isset($cekSession['id_konfirmasi'])) {
                $databaru = $this->session->userdata();
                $id_order = $databaru['id_konfirmasi'];
                $return = $this->Data_model->orderCostumerJoin($id_order);
                $dataIn['array_result'] = $return['result'];
                $dataIn['array_row'] = $return['row'];
                $this->load->view('template/header_another');
                $this->load->view('sale/konfirmasi_transfer', $dataIn);
                $this->load->view('template/footer');
            } else {
                redirect('sale/errorHtml');
            }
        } else {
            redirect('sale/errorHtml');
        }
    }

    private function to_input_post($pakets, $databaru)
    {
        foreach ($pakets as $row) {
            $databaru['pilihanPaket'][$row['id_paket']] = $this->input->post($row['id_paket'], true,);
        }


        $array_data = $databaru['pilihanPaket'];
        $t_tanggal = $databaru['tanggalCukur'];
        $s_tanggal = date("Y-m-d", strtotime("$t_tanggal"));
        $order = [
            'kode_order' => $databaru['kodeUnik'],
            'nama_order' => $databaru['namaCustomer'],
            'ponsel_order' => $databaru['nomorCustomer'],
            'tempat_order' => $databaru['pilihanTempat'],
            'tanggal_order' => $s_tanggal,
            'jam_order' => $databaru['jamCukur'],
            'pembayaran_order' => $databaru['pembayaran'],
        ];

        if (!count(array_filter(array_values($array_data))) >= 1) {
            redirect('sale/errorHtml');
        };

        // echo count(array_filter(array_values($array_data)));
        $data = $this->Data_model->orderCustomer($order);
        $id_order = $data['insert_id'];

        foreach ($array_data as $key => $value) {
            $real_data[] = [
                'id_customer' => $id_order,
                'id_paket' => $key,
                'jumlah_paket' => $value,
            ];
        };
        $data1 = $this->Data_model->insert_customer_paket($real_data);
        $return = $this->Data_model->orderCostumerJoin($id_order);
        $dataIn['array_result'] = $return['result'];
        $dataIn['array_row'] = $return['row'];
        $this->session->set_userdata('id_konfirmasi', $id_order);

        if ($this->input->post('pembayaran', true) == 1) {
            $this->konfirmasi_transfer($dataIn);
        } else {
            $this->konfirmasi_tunai($dataIn);
        }
    }


    public function errorHtml()
    {
        $this->load->view('template/header_another');
        $this->load->view('sale/konfirmasiGagal');
        $this->load->view('template/footer');
    }

    private function konfirmasi_tunai($data)
    {
        $this->load->view('template/header_another');
        $this->load->view('sale/konfirmasi_tunai', $data);
        $this->load->view('template/footer');
    }

    private function konfirmasi_transfer($data)
    {
        $this->load->view('template/header_another');
        $this->load->view('sale/konfirmasi_transfer', $data);
        $this->load->view('template/footer');
    }

    public function toValid()
    {
        $sessionBaru = array('validasi' => true);
        $hapusSession = array('konfirmasi', 'pilihanPaket', 'pilihanTempat', 'tanggalCukur');
        $this->session->set_userdata($sessionBaru);
        $this->session->unset_userdata($hapusSession);
        $this->load->model('Data_model');
        $id_data = $this->session->userdata('id_konfirmasi');

        $data = $this->Data_model->updateCustomerId($id_data);
        $sessionId = array('id_custom' => $id_data);
        $this->session->set_userdata($sessionId);
        $joinKec = $this->Data_model->orderCostumerJoin($id_data);
        $id_waktu = $joinKec['jam_order'];
        $tanggal = date("d-m-Y", strtotime($data['tanggal_order']));
        $jam = $this->Data_model->s_getWaktu($id_waktu);
        $jam = $jam['nama_waktu'];
        // $data['jam'] = $jam;
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
            <li>Nama : " . $data['nama_order'] . "</li><li>Paket : " . $data['paket_order'] . "</li><li>Ponsel : " . $data['ponsel_order'] . "</li><li>Kec : " . $joinKec['nama_kec'] . "</li><li>Tanggal : " . $tanggal . "</li><li>Jam : " . $jam . "</li><li>Total : Rp. " . number_format($data['total_order']) . ",-</li>Telah berhasil terdaftar, kapster kami akan menghubungi anda paling lambat 1 jam sebelum waktu yang di tentukan. Terima kasih<br></p><a href='https://api.whatsapp.com/send?phone=" . $data['ponsel_order'] . "&text=Hai!%20terimakasih%20anda%20telah%20mendaftar%20cukur%20rambut%20pada%20m-barber.com%20'>Klik untuk chat WA " . $data['ponsel_order'] . "</a>";
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
    private function validasi()
    {
        if ($this->session->has_userdata('validasi')) {
            $id_order =  $this->session->userdata('id_custom');
            $this->load->model('Data_model');
            $return = $this->Data_model->orderCostumerJoin($id_order);
            $dataIn['array_result'] = $return['result'];
            $dataIn['array_row'] = $return['row'];
            $this->load->view('template/header_another');
            $this->load->view('sale/validasi', $dataIn);
            $this->load->view('template/footer');
        } else {
            $this->errorHtml('Validasi');
        };
    }

    public function pesanLagi()
    {
        // $this->session->sess_destroy();
        $hapusSession = array('kodeUnik', 'konfirmasi', 'validasi', 'pilihanPaket', 'pilihanTempat', 'tanggalCukur', 'id_custom', 'id_konfirmasi', 'pembayaran');
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
