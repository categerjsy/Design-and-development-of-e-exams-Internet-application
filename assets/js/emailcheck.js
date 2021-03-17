function validateEmail(emailField){
        var reg = /^[\w-\.]+@(uop.gr|go.uop.gr)/;

        if (reg.test(emailField.value) == false) 
        {
           document.getElementById('messageEmail').style.color = 'red';
   	   document.getElementById('messageEmail').innerHTML = 'E-mail must be me@uop.gr or me@go.uop.gr.';
            return false;
        }
    if (reg.test(emailField.value) == true) 
        {
           document.getElementById('messageEmail').style.color = 'green';
   	   document.getElementById('messageEmail').innerHTML = 'Valid e-mail.';
            return false;
        }
}