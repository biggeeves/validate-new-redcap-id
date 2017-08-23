<script>
    // check user input field, validate text id
    // Display Valid or Invalid
    // If Invalid ID display simple Dialog with error to stop REDCap from continuing

    validation_rule = /^F\d{5}$/;

    function is_valid_id() {
        if ($('#inputString').val().match(validation_rule)) {
            // Valid ID ok to continue
            $('.validation_feedback').html('Valid');
            $('#inputString').css('background-color', '#ADFF2F');
            return true;
        } else {
            // Invalid ID. NOT OK to continue
            $('.validation_feedback').html('Invalid');
            $('#inputString').css('background-color', '#FFF');
            return false;
        }
    }

    $(document).ready(function () {
        validation_display = '<div class="id_validation" ' + 
                'style="float: right;">' + 
                '<p class="validation_feedback" ' + 
                'style="margin: 0px 30px 0px 0px;">' + 
                '</p>' + '</div>';
        $(validation_display).insertAfter('#inputString');

        $('#inputString').on('input', is_valid_id);
        $("#inputString").blur(function () {
            if (!is_valid_id()) {
                // By displaying the simple Dialog 
                // REDCap will not continue to next page
                simpleDialog(' Invalid ID. Please double check. ', null, null, null, null);
            }
        });
    });
</script>
