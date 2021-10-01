function validateTime(timeField){
    var reg = /[0]{2}:[0-6]{1}[0-9]{1}:[0-5]{1}[0-9]{1}$/;
    if (reg.test(timeField.value) == false) 
    {
        document.getElementById('messageTime').style.color = 'red';
        document.getElementById('messageTime').innerHTML = 'O χρόνος πρέπει να είναι της μορφής "00:01:00".';
        return false;
    }
    if (reg.test(timeField.value) == true) 
    {
        document.getElementById('messageTime').style.color = 'green';
        document.getElementById('messageTime').innerHTML = 'Ο χρόνος έχει σωστή μορφή.';
        return false;
    }
}