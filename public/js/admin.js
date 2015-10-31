var datePickerOtions = {
    changeMonth: true,
    changeYear: true
};
$(document).ready(function() {
    $("#menu").metisMenu();

    if($('.table').length > 0)
    {
        $('.table').dataTable();
    }

    $('.btn-danger').click(function()
    {
        if(!confirm('Are you sure you want to delete this record?')) return false;
    });

});

function datepickerLocale(dpId, options) {
    var opt = $.extend(datePickerOtions, options);
    return $(dpId).datepicker(opt);
}