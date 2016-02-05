$(function () {
    $(document).on('click', '.showModalButton', function () {
        if ($('#modal').data('bs.modal').isShown) {
            $('#modal').find('#modalContent')
                .load($(this).attr('value'));
            //dynamiclly set the header for the modal
            document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
        } else {

            if ($(this)[0].href.indexOf('.jpg') != - 1) {
                $('#modal').modal('show')
                    .find('#modalContent')
                    .html('<img src="/img/1.jpg" style="max-width: 100%"/>');
            } else {
                $('#modal').modal('show')
                    .find('#modalContent')
                    .load($(this).attr('href'));
                document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
            }
        }
        return false;
    });
});
