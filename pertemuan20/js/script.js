$(document).ready(function() {
    // hilangkan tombol cari
    $('#tombol-cari').hide();
    // event ketika keyword di ketik
    $('#keyword').on('keyup', function() {
        // menampilkan loader
        $('.loader').show();

        // ajax menggunkan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // ajax menggunakan get
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            $('.loader').hide();
        });

    });
});