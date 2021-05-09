function time() {
    var hour = document.forms["RegForm"]["hours"];
    var minutes = document.forms["RegForm"]["minutes"];
    var seconds = document.forms["RegForm"]["seconds"];
    var reg1 =/\b(2[0-3]|[0-1]?[0-9])\b/;
    var reg2 = /[0-5][0-9]/;
    if ((reg1.test(hour.value) == false)||(reg2.test(minutes.value) == false)||(reg2.test(seconds.value) == false)) {
        location.replace("http://localhost/Ptuxiaki/create_exam.php?msg=done")
           return false;
    }


    return true;
}