
$('#pic').on('change', function () {
    alert("ad");
    var val1 = $(this).value();

    switch (val1.substring(val1.lastIndexOf('.') + 1).toLowerCase()) {
        case 'jpg':
        case 'png':

            break;
        default:
            $(this).value('');
            // error message here
            $("#output").html('not an image');
            $("#pic").value(null);
            break;
    }

    const size = (this.files[1].size / 1024 / 1024).toFixed(2);

    if (size > 1) {
        $("#output").html('file size is larger than 1 mb');
        $("#pic").value(null);
    } else {
        $("#output").html('<b style="color:green">' +
            'This file size is: ' + size + " MB" + '</b>');
    }
});

function license() {

    $('#license').on('change', function () {

        var val2 = $(this).value();

        switch (val2.substring(val2.lastIndexOf('.') + 1).toLowerCase()) {
            case 'pdf':
                break;
            default:
                $(this).value('');
                // error message here
                $("#fileoutput").html('not a pdf');
                $("#license").value(null);
                break;
        }

        const size =
            (this.files[0].size / 1024 / 1024).toFixed(2);

        if (size2 > 1) {
            $("#fileoutput").html('file size is larger than 1 mb');
            $("#license").value(null);
        } else {
            $("#fileoutput").html('<b style="color:green">' +
                'This file size is: ' + size + " MB" + '</b>');
        }
    });

}