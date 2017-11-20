function deleteResource(title, message, id) {
    alertify.confirm(title, message,
            function () {
                $('#' + id).submit();
            },
            function () {
                toastr['error']('Stergere anulata');
            });
}