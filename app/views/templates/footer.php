<script src="js/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= BASEURL; ?>/js/bootstrap.js"></script>
<script>
    $(function() {

        $('.tombolTambahData').on('click', function() {
            if ('<?=BASEURL?>'=='/mahasiswa'){
                $('#formModalLabel').html('Tambah Data Mahasiswa');
                $('.modal-footer button[type=submit]').html('Tambah Data');
                $('#nama').val('');
                $('#nrp').val('');
                $('#email').val('');
                $('#jurusan').val('');
                $('#id').val('');
            } else if ('<?=BASEURL?>'=='/matkul'){
                $('#formModalLabel').html('Tambah Data Mata Kuliah');
                $('.modal-footer button[type=submit]').html('Tambah Data');
                $('#nama_matkul').val('');
                $('#id').val('');
            } else {
                $('#formModalLabel').html('Tambah Data Mata Kuliah ke Mahasiswa');
                $('.modal-footer button[type=submit]').html('Tambah Data');
                $('#id_matkul').val('');
                $('#id').val('');
            };
        });


        $('.tampilModalUbah').on('click', function() {
            
            
            if ('<?=$_SERVER['REQUEST_URI']?>'=='/php-mvc-main/public/mahasiswa'){
                $('#formModalLabel').html('Ubah Data Mahasiswa');
                $('.modal-footer button[type=submit]').html('Ubah Data');
                $('.modal-body form').attr('action', '<?=BASEURL?>/mahasiswa/ubah');

                const id = $(this).data('id');

                $.ajax({
                    url: '<?=BASEURL?>/mahasiswa/getubah',
                    data: {
                        id: id
                    },
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        $('#nama').val(data.nama);
                        $('#nrp').val(data.nrp);
                        $('#email').val(data.email);
                        $('#jurusan').val(data.jurusan);
                        $('#id').val(data.id);
                    }
                });
            } else if ('<?=$_SERVER['REQUEST_URI']?>'=='/php-mvc-main/public/matkul'){
                $('#formModalLabel').html('Ubah Data Mahasiswa');
                $('.modal-footer button[type=submit]').html('Ubah Data');
                $('.modal-body form').attr('action', '<?=BASEURL?>/matkul/ubah');

                const id = $(this).data('id');

                $.ajax({
                url: '<?=BASEURL?>/matkul/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#nama_matkul').val(data.nama_matkul);
                    $('#id').val(data.id);
                }
            });
            } else {
                $('#formModalLabel').html('Ubah Data Mahasiswa');
                $('.modal-footer button[type=submit]').html('Ubah Data');
                $('.modal-body form').attr('action', '<?=BASEURL?>/matkulmhs/ubah');

                const id = $(this).data('id');

                $.ajax({
                url: '<?=BASEURL?>/matkulmhs/getubah',
                data: {
                    id: id
                },
                method: 'post',
                dataType: 'json',
                success: function(data) {
                    $('#id_matkul').val(data.id_matkul);
                    $('#id').val(data.id);
                }
            });
            };
            

        });

    });
</script>
</body>

</html>