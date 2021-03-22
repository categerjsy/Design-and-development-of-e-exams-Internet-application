
  function checkPasswordStrength() {
            var number = /([0-9])/;
            var alphabets = /([a-zA-Z])/;
            var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
            if ($('#password').val().length < 7) {
                $('#password-strength-status').removeClass();
                $('#password-strength-status').addClass('weak-password');
                $('#password-strength-status').html("Αδύναμος κωδικός (πρέπει να έχουμε τουλάχιστον 5 λατινικούς χαρακτήρες, 1 αριθμό και 1 χαρακτήρα πληκτρολογίου).");
            } else {
                if ($('#password').val().match(number) && $('#password').val().match(alphabets) &&$('#password').val().match(special_characters)) {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('strong-password');
                    $('#password-strength-status').html("Ισχυρός κωδικός.");
                } else {
                    $('#password-strength-status').removeClass();
                    $('#password-strength-status').addClass('medium-password');
                    $('#password-strength-status').html("Μέτρια ισχύ κωδικού (προσθέστε λατινικούς χαρακτήρες, αριθμούς και χαρακτήρες πληκτρολογίου.)");
                }
            }
        }