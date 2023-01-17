<div class="text alert-success mt-3" id="success-alert">
    <button type="button" class="close" data-dismiss="alert"></button>
    <strong>Selamat!</strong>
    Anda berhasil melakukan pemesanan
</div>

<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <p class="text-danger text-center text-sm font-weight-bold" style="font-size: 11pt;">Warning! Jangan Lakukan Refresh Agar Tidak Terjadi Kesalahan Sistem</p>
                    <h5 class="text-info text-center">Silakan Lakukan Pembayaran Sesuai Detail Berikut!</h5>
                    <hr>
                    <h3 class="text-center">3850681669</h3>
                    <p class="text-center font-weight-bold mb-0">a/n PT XKereta Indonesia</p>
                    <p class="text-center">BCA | Kode Bank : 014</p>

                    <hr>
                    <h5 class="text-center">Total Yang Harus Dibayar</h5>
                    <h4 class="text-center"><?php $i = $this->session->flashdata('total');
                                            echo 'Rp. ' . number_format($i, 0, ',', '.') ?></h4>
                    <br>
                    <h5 class="text-center">Kode Pembayaran</h5>
                    <h4 class="text-center"><?= $this->session->flashdata('nomor') ?></h4>
                    <br><br><br>
                    <a href=" <?= base_url('konfirmasi') ?>" class="btn btn-outline-success float-right btn-sm">Konfirmasi Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
</div>