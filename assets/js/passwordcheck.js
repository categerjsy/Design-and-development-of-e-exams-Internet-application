

var checkP = function() {
  if (document.getElementById('password').value ==document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Οι κωδικοί είναι ίδιοι.';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Οι κωδικοί δεν είναι ίδιοι.';
  }
}

