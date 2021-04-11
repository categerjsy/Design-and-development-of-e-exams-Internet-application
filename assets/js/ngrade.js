function validateNGrade(NgradeField){
    var reg = /[0-9]{1}.[0-9]{2}/;

    if (reg.test(NgradeField.value) == false) 
    {
        document.getElementById('messageNGrade').style.color = 'red';
        document.getElementById('messageNGrade').innerHTML = 'O βαθμός πρέπει να είναι της μορφής "0.35".';
        return false;
    }
    if (reg.test(NgradeField.value) == true) 
    {
        document.getElementById('messageNGrade').style.color = 'green';
        document.getElementById('messageNGrade').innerHTML = 'Ο βαθμός έχει σωστή μορφή.';
        return false;
    }
}