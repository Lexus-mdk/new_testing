$(document).ready(function () {
    $('#cancel').on('click', function () {
        $('#add').toggleClass('none');
        $('#update-form').toggleClass('none');
    });

    $('.update').on('click', function () {
        $('#add').addClass('none');
        $('#update-form').removeClass('none');
        $('#id').val($(this).attr('data-id'));
        $('#name').val($(this).attr('data-name'));
        $('#age').val($(this).attr('data-age'));
    });
})