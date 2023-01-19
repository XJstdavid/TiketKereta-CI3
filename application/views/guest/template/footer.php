    <!-- Script JS -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/ff4c215153.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        $(".theSelect").select2();
    </script>

    <script>
        $('#bagian_a').hide();
        $('#bagian_b').hide();

        function cekGerbong() {
            var gambar = $('#img_gerbong');
            var gerbong = $('#select_gerbong');

            if (gerbong.val() === "1") {
                gambar.attr('src', '<?= base_url('assets/gerbong/gerbong1.jpg') ?>');
            } else if (gerbong.val() === "2") {
                gambar.attr('src', '<?= base_url('assets/gerbong/gerbong2.jpg') ?>');
            } else if (gerbong.val() === "3") {
                gambar.attr('src', '<?= base_url('assets/gerbong/gerbong3.jpg') ?>');
            }
        }

        function cekBagian() {
            var bagian = $('#bagian');
            var bagian_a = $('#bagian_a');
            var bagian_b = $('#bagian_b');

            if (bagian.val() === "a") {
                bagian_a.show();
                bagian_b.hide();
            } else if (bagian.val() === "b") {
                bagian_a.hide();
                bagian_b.show();
            }
        }
    </script>
    </body>

    </html>