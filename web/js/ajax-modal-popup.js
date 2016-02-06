$(function () {
    $(document).on('click', '.showModalButton', function () {
        var modal = $('#modal');
        if (modal.data('bs.modal').isShown) {
            modal.find('#modalContent').load($(this).attr('value'));
            document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        } else {
            if ($(this)[0].href.indexOf('/img/') != - 1) {
                modal.modal('show').find('#modalContent').html('<img src="' + $(this)[0].href + '"/>');
            } else {
                modal.modal('show').find('#modalContent').load($(this).attr('href'));
                document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
            }
        }
        return false;
    });
});
