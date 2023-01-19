    <!-- Script JS -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/ff4c215153.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        $(".theSelect").select2();
    </script>

    <script>
        $('.bagian_a').hide();
        $('.bagian_b').hide();

        <?php if ($this->uri->segment(1) === "konfirmasi") : ?>

            cekBagian();
            cekGerbong();

        <?php endif; ?>
        var gambar = $('.img_gerbong');
        var gerbong = $('.select_gerbong').val();

        function cekGerbong() {

            if (gerbong === "1") {
                gambar.attr('src', '<?= base_url('assets/gerbong/gerbong1.jpg') ?>');
            } else if (gerbong === "2") {
                gambar.attr('src', '<?= base_url('assets/gerbong/gerbong2.jpg') ?>');
            } else if (gerbong === "3") {
                gambar.attr('src', '<?= base_url('assets/gerbong/gerbong3.jpg') ?>');
            }

            // Cek validasi
            var bagian = $('.bagian').val();
            var button = $('#btn_konfirmasi');
            var pesan = $('.pesan');

            if (gerbong === "0" || bagian === "0") {
                button.attr("disabled", true);
                pesan.removeClass('d-none');
                pesan.text("Pastikan anda telah memilih Gerbong  & Bagian !!");
                pesan.addClass('text-danger');
            } else {
                button.attr("disabled", false);
                pesan.addClass('d-none');
                pesan.removeClass('text-danger');
            }
        }

        function cekBagian() {
            var bagian = $('.bagian');
            var bagian_a = $('.bagian_a');
            var bagian_b = $('.bagian_b');

            if (bagian.val() === "a") {
                bagian_a.show();
                bagian_b.hide();
            } else if (bagian.val() === "b") {
                bagian_a.hide();
                bagian_b.show();
            }

            // Cek validasi
            var bagian = $('.bagian').val();
            var button = $('#btn_konfirmasi');
            var pesan = $('.pesan');

            if (gerbong === "0" || bagian === "0") {
                button.attr("disabled", true);
                pesan.removeClass('d-none');
                pesan.text("Pastikan anda telah memilih Gerbong, Bagian, & No Kursi  !!");
                pesan.addClass('text-danger');
            } else {
                button.attr("disabled", false);
                pesan.addClass('d-none');
                pesan.removeClass('text-danger');
            }
        }
        $('.foto').change(function() {
            var gerbong = $('.select_gerbong').val();
            var bagian = $('.bagian').val();
            var button = $('#btn_konfirmasi');
            var pesan = $('.pesan');

            if (gerbong === "0" || bagian === "0") {
                button.attr("disabled", true);
                pesan.removeClass('d-none');
                pesan.text("Pastikan anda telah memilih Gerbong  & Bagian !!");
                pesan.addClass('text-danger');
            } else {
                button.attr("disabled", false);
                pesan.addClass('d-none');
                pesan.removeClass('text-danger');
            }
        });
    </script>
    </body>

    </html>