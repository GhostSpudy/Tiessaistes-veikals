$(document).ready(function() {
    var skuCheck = /^[0-9A-Za-z]+$/;
    var nameCheck = /^[A-Za-z\s]+$/;

    //Checks if the information is correct
    $('input').on('input', function() {
        var query = $(this).attr('name');

        if (query == "name") {
            if(skuCheck.test($(this).val())) {
                $('.error').hide();
            } else {
                $('.error').show();
            }
        }
    });

    //Checks for empty fields and correctness of information when saving the item
    $('form').submit(function() {
        var error = 0, error2 = 0;
        $('form').find(':input').each(function() {
            var queryName = $(this).attr("name");

            if (queryName == "name") {
                if(!$(this).val()) {
                    error = 1;
                } else if (!skuCheck.test($(this).val())) {
                    error2 = 1;
                }
            }

            if (queryName == "price") {
                if(!$(this).val()) {
                    error = 1;
                }
            }
        });

        if (error == 1) {
            alert("Please, submit required data");
            return false;
        } else if (error2 == 1) {
            alert("Please, provide the data of indicated type");
            return false;
        }
    });
});