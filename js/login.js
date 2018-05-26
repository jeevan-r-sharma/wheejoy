$(document).ready(function() {
$("#userForm").submit(function(e) {
        $("#msgbox").removeClass().addClass('messagebox').text('Validating..').fadeIn(1000);
        $.post("<?php echo base_url(); ?>signIn/checkInputs", {
            username: $('#userName').val(),
            password: $('#userPassword').val()
        }, function(data) {
           
            if (data == 1) {
                $("#msgbox").fadeTo(200, 0.1, function() {
                    $(this).html('Authenticating User..').addClass('messageboxok').fadeTo(900, 1, function() {
                        document.location = '<?php echo base_url(); ?>dashboard';
                    });
                });
            }
            
        else {
                $("#msgbox").fadeTo(200, 0.1, function() {
                    $(this).html('Incorrect Username and Password ').addClass('messageboxerror').fadeTo(900, 1, function() {
                        document.location = '<?php echo base_url(); ?>signIn';
                    });
                });
            }

        });
        return false;
});
});