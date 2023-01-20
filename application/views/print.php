<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-white bg-primary text-center">Print Invoice</div>
                <div class="card-body">
                    <h1 class="text-center">XKereta</h1>
                    <hr style="border: 1px solid blue;"">
                    <div class=" row">
                    <div class="col-md-12">
                        <p class="text-center">Nama Pemesan : <strong><?= $detail->nama_pemesan ?></strong></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <p>Jumlah Penumpang : <strong><?= $jml_penumpang ?></strong></p>
                        <p>Harga Per-Tiket : <strong><?= 'Rp. ' . number_format($detail->harga, 0, ',', '.') ?></strong></p>
                        <p>Harga Total : <strong><?= 'Rp. ' . number_format($detail->harga * $jml_penumpang, 0, ',', '.') ?></strong></p>
                        <p>Status : <i class="fa fa-check text-success"></i> Lunas</p>
                    </div>
                    <div class="col-md-7">
                        <p class="text-right">Nama Kereta : <strong><?= $detail->nama_kereta ?></strong></p>
                        <p class="text-right">Berangkat : <strong><?= format_indo(date(($detail->tgl_berangkat))); ?></strong></p>
                        <p class="text-right">Sampai : <strong><?= format_indo(date(($detail->tgl_sampai))); ?></strong></p>
                        <p class="text-right">Kelas : <strong><?= $detail->kelas ?></strong></p>
                    </div>
                </div>
                <hr style="border: 1px solid blue;">
                <p class=" text-center">Rute : <strong><?= $detail->ASAL ?> - <strong><?= $detail->TUJUAN ?></strong></p>
                <h4 class=" text-center mt-5 text-success mb-3"><b>Arigatou Gozaimasu🙏</b></h4>
                <button onclick="window.print()" class="btn btn-outline-success float-right"><i class="fa fa-print"> Print</i></button>

            </div>
        </div>
    </div>