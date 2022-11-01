$(document).ready(function () {
    $(document).on('click', '#print', function (e) {
        var trip_id = $(this).closest("tr").find("#idTrip").val();
    });
});
