// // ajax
// var keyword = document.getElementById('keyword');
// var tombolCari = document.getElementById('tombol-cari');
// var container = document.getElementById('container');

// // tambahkan event ketika keyword ditulis
// keyword.addEventListener('keyup', function(){
    
//     // buat objek ajax
//     var xhr = new XMLHttpRequest();

//     // cek kesiapan ajax nya
//     xhr.onreadystatechange = function() {
//         if( xhr.readyState == 4 && xhr.status == 200) {
//             container.innerHTML = xhr.responseText
//         }
//     }

//     // eksekusi ajax
//     xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
//     xhr.send();
    
    
// });




// jquery
$(document).ready(function() {

    // hilangkan tombol cari
    $('#tombol-cari').hide();

    // event ketika keyword ditulis
    $('#keyword').on('keyup', function() {
        // munculkan icon loading
        $('.loader').show();

        // ajax menggunakan load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){

            $('#container').html(data);
            $('.loader').hide();

        });
    });
});
