function validateGrade(gradeField){
    var reg = /[0-9]{1}.[0-9]{2}/;

    if (reg.test(gradeField.value) == false) 
    {
        document.getElementById('messageGrade').style.color = 'red';
        document.getElementById('messageGrade').innerHTML = 'O βαθμός πρέπει να είναι της μορφής "0.35".';
        return false;
    }
    if (reg.test(gradeField.value) == true) 
    {
        document.getElementById('messageGrade').style.color = 'green';
        document.getElementById('messageGrade').innerHTML = 'Ο βαθμός έχει σωστή μορφή.';
        return false;
    }
}