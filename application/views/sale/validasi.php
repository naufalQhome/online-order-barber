<div class="container mt-5">
    <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading">Mohon Tunggu!</h4>
        <p>
            Mohon untuk menunggu, kami akan validasi pembayaran dan menghubungi anda via SMS dan Whatsapp dalam waktu kurang dari 3 jam pada jam kerja, yaitu pukul 09.00-19-00 WIB. Jika anda memesan di luar jam kerja maka akan dibalas di jam kerja selanjutnya<br>Pastikan Whatsapp anda aktif<br><br>

            Simpan nomor pembayaran anda <b><?= $order['id_order'] ?></b><br>
            Nomor Anda <b><?= $order['ponsel_order'] ?></b><br>
            Tempat Cukur Anda <b><?= $order['nama_kec'] ?></b><br><br>
            <a href="<?= base_url('sale/pesanLagi') ?>">Klik di sini jika ingin mendaftar lagi :)</a>
          
        </p>
        <hr>


        <p class="mb-0"><small><i>*jika anda membutuhkan bantuan, silakan hubungi <a href="#help">help support</a> kami</i></small></p>
    </div>
</div>