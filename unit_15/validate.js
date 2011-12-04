function validate(form) {
  var msg = "";
  if (form.username.value == "" || form.username.value == undefined) {
    msg += "Username is invalid. ";
  }
  if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(form.username.value)) {
    msg += "Your username must also be a valid email address. ";
  }
  if ((form.password.value == "" || form.password.value == undefined) || (form.password.value != form.password_confirm.value)) {
    msg += "Password and password confirmation do not match. ";
  }
  if (form.full_name.value == "" || form.full_name.value == undefined) {
    msg += "Name must added. ";
  }
  if (msg != "") {
    alert(msg);
    return false;
  } else {
    return true;
  }
}