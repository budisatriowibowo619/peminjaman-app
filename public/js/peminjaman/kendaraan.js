$(document).ready(function () {
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#inputTanggal').datepicker({
        format : 'yyyy-mm-dd',
        startDate: new Date()
    });
});

$('#inputKendaraan').select2({
    placeholder: '- Pilih Kendaraan -',
    // allowClear: true,
    ajax: {
        type: 'GET',
        url: '/selectKendaraan',
        data: function(params) {
            let query = {
                search: params.term,
                page: params.page || 1,
                jenis_kendaraan: $("input[name='jenis_kendaraan']:checked").val(),
                tanggal: $("#inputTanggal").val()
            }

            return query;
        },
        delay: 500
    }
});

$("#formKendaraan").submit(function(event) {
    event.preventDefault();
    dataFormKendaraan = new FormData($(this)[0]);
    $.ajax({
        type: "POST",
        url: "/processPinjamKendaraan",
        data: dataFormKendaraan,
        dataType: "JSON",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            Swal.showLoading();
        },
        complete: function() {
            Swal.hideLoading();
        },
        success: function (response) {
            Swal.fire({
                title : response.message,
                icon: 'success',
                timer: 3000,
                showConfirmButton: false,
                onAfterClose: () => location.reload()
            });
        },
        error: function (error) {
            Swal.fire({
                title: 'Terjadi kesalahan saat menyimpan data!',
                text: error.responseText, 
                icon: 'error',
                showConfirmButton: false
            });
        }
    });
});