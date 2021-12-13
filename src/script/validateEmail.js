function ValidateEmail(email) {
  var mailformatType = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (email.value.match(mailformatType)) {
    return true;
  } else {
    alert("Enter Correct Email");
    return false;
  }
}
