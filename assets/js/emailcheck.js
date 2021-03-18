function validateEmail(emailField){
        var reg = /^[\w-\.]+@(uop.gr|go.uop.gr)/;

        if (reg.test(emailField.value) == false) 
        {
           document.getElementById('messageEmail').style.color = 'red';
   	   document.getElementById('messageEmail').innerHTML = 'Το e-mail πρέπει να είναι της μορφής me@uop.gr ή me@go.uop.gr.';
            return false;
        }
    if (reg.test(emailField.value) == true) 
        {
           document.getElementById('messageEmail').style.color = 'green';
   	   document.getElementById('messageEmail').innerHTML = 'Το e-mail είναι έγκυρο.';
            return false;
        }
}