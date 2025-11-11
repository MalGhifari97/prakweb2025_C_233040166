$(function() {
    
  
    $('.tombolTambahData').on('click', function() {
        $('#formModalLabel').html('Tambah Data User');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        
        
        $('.modal-body form').attr('action', BASEURL + '/user/tambah'); 
        
        
        $('#name').val('');
        $('#email').val('');
        $('#id').val(''); 
    });

    $('.tombolUbah').on('click', function() {
        $('#formModalLabel').html('Ubah Data User');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        
        $('.modal-body form').attr('action', BASEURL + '/user/ubah'); 

        const id = $(this).data('id');
        
        $.ajax({
            url: BASEURL + '/user/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#name').val(data.name); 
                $('#email').val(data.email);
                $('#id').val(data.id);
            }
        });
    });

});