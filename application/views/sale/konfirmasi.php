<?php
$tanggal = date("d-m-Y", strtotime($order['tanggal_order']));
?>
<div class="container mt-5">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Berhasil!</h4>
        <p>
            <?= $order['nama_order'] ?>, <?= $order['ponsel_order'] ?>, di kecamatan <?= $kecamatan['nama_kec'] ?>, cukur pada <?= $tanggal ?>, jam <?= $jam['nama_waktu'] ?>.

            <form class="col">
                <div class="form-group form-inline row">
                    <label for="inputPassword" class="col-form-label mr-sm-2">Total <b> Rp. <?= number_format($order['total_order']) ?>,- </b></label>
                    <div class="">
                        <input type="text" class="form-control form-control-sm" id="kodePromo" placeholder="tambakahkan promo">
                    </div>
                </div>
            </form>
            <?php foreach ($paket as $row) : ?>
                <li><?= $row['nama_paket'] ?> | Rp. <?= number_format($row['harga_paket']) ?>,-</li>
            <?php endforeach ?>
            <li><?= $kecamatan['nama_kec'] ?> | Rp. <?= number_format($kecamatan['harga_kec']) ?>,-</li>
            <li>Kode Pembayaran | <?= $order['kode_order'] ?></li><br>
            <ul>Total <b> Rp. <?= number_format($order['total_order']) ?>,-</b></ul>
            Pendaftaran anda berhasil, pastikan anda dalam keadaan tidak demam, batuk,pilek atau nyeri telan, silakan melakukan pembayaran via transfer bank ke rekening <b>BCA</b> atas nama RA. Nurul Malita <b>0374211117</b> dengan total biaya<b> Rp. <?= number_format($order['total_order']) ?>,-</b>, lalu konfirmasi pembayaran di bawah ini.
        </p>
        <hr>

        <form action="<?= base_url('sale/toValid') ?>" method="post">
            <input name="kodeUnik" type="hidden" value="<?= $order['kode_order'] ?>">

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                <label class="custom-control-label" for="customCheck1">Saya dalam keadaan tidak demam, batuk, pilek atau nyeri telan</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck2" required>
                <label class="custom-control-label" for="customCheck2">Lokasi Cukur <?= $kecamatan['nama_kec'] ?></label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck3" required>
                <label class="custom-control-label" for="customCheck3">Saya telah melakukan pembayaran</label>
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">Konfirmasi</button>
                <a href="<?= base_url('sale/pesanLagi') ?>" class="btn btn-deafult btn-block" type="button">Batalkan</a>
            </div>
        </form>
        <p class="mb-0"><small><i>*jika anda membutuhkan bantuan, silakan hubungi <a href="#help">help support</a> kami</i></small></p>
    </div>
</div>
<a href="https://wa.me/0816947361?text=Hai!%20terimakasih%20anda%20telah%20mendaftar%20cukur%20rambut%20pada%20http%3A%2F%2Fm-barber.com%20"></a>