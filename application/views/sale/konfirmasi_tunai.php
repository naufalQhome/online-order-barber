<?php
$tanggal = date("d-m-Y", strtotime($array_row['tanggal_order']));
?>
<div class="container mt-5">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Berhasil!</h4>
        <p>
            <?= $array_row['nama_order'] ?>, <?= $array_row['ponsel_order'] ?>, di kecamatan <?= $array_row['nama_kec'] ?>, cukur pada <?= $tanggal ?> jam <?= $array_row['nama_waktu'] ?>.
            <table class="table table-borderless table-sm table-responsive">
                <tbody>
                    <?php $total = array();
                    foreach ($array_result as $row) : ?>
                        <tr>
                            <?php if ($row['jumlah_paket'] >= 1) : ?>
                                <td>
                                    <?= $row['nama_paket'] ?> (<?= $row['jumlah_paket'] ?> Orang)
                                </td>
                                <td class="text-right">
                                    Rp<?php $total[] = $row['jumlah_paket'] * $row['harga_paket'];
                                        echo number_format(10000, 0, ".", ".") ?>,-
                                </td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <td>
                            <?= $array_row['nama_kec'] ?>
                        </td>
                        <td class="text-right">
                            Rp<?= number_format($array_row['harga_kec'], 0, ".", ".") ?>,-
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Kode Bayar
                        </td>
                        <td class="text-right">
                            <?= $array_row['kode_order'] ?>
                        </td>
                    </tr>
                </tbody>
            </table>


            <br>
            <ul>Total <b> Rp<?php echo var_dump(array_values($total));
                            $grandTotal = count(array_values($total)) + $array_row['harga_kec'] + $array_row['kode_order'];
                            number_format($grandTotal, 0, ".", ".") ?>,-</b></ul>
            Pendaftaran anda berhasil, pastikan anda dalam keadaan tidak demam, batuk, pilek atau nyeri telan. Pembayaran Anda akan diterima ketika Capster kami telah telah datang ke tempat Anda dengan total biaya<b> Rp<?= number_format($grandTotal, 0, ".", ".") ?>,-</b>, lalu konfirmasi pembayaran di bawah ini.
        </p>
        <hr>

        <form action="<?= base_url('sale/toValid') ?>" method="post">
            <input name="kodeUnik" type="hidden" value="<?= $array_row['kode_order'] ?>">

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                <label class="custom-control-label" for="customCheck1">Saya dalam keadaan tidak demam, batuk, pilek atau nyeri telan</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck2" required>
                <label class="custom-control-label" for="customCheck2">Lokasi Cukur <?= $array_row['nama_kec'] ?></label>
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