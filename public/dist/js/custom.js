var uri = $(".tabel").attr("id");
var dataTable = $('.tabel').DataTable({
    info: false,
    ajax: {
        url: uri,
        method: "POST",
    }
});

//input form
$('#form').submit(function(e) {
    e.preventDefault();

    var formData = new FormData($("#form")[0]);

    $.ajax({
        url: $("#form").attr('action'),
        type: 'post',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(response) {
            if (response.success === true) {
                $("#form")[0].reset();
                $('#myModal').modal('hide');
                $(".text-danger").remove();

                dataTable.ajax.reload();
                if (typeof(response.redirect) !== 'undefined') {
                    document.location.href = response.redirect;
                }

            } else {
                $.each(response.messages, function(key, value) {
                    var element = $('#' + key);
                    element.removeClass('is-invalid')
                        .addClass(value.length > 0 ? 'is-invalid' : 'valid');
                    element.closest('div.form-group')
                        .find('.text-danger').remove();
                    element.after(value);
                });
            }
        }
    });
});


//delete
$(document).on("click", ".del", function(e) {

    var id = $(this).attr("id");
    var uri = $(this).attr("uri");
    e.preventDefault();
    bootbox.confirm("Are you sure delete ?", function(result) {
        if (result) {

            $.ajax({
                url: uri,
                method: "POST",
                data: {
                    Id: id
                },
                success: function(data) {
                    dataTable.ajax.reload();
                }
            });

        }
    });
});