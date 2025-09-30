let f_name = document.getElementById("f_name");
let l_name = document.getElementById("l_name");
let email = document.getElementById("email");
let password = document.getElementById("password");
let conf_pass = document.getElementById("conf_pass");
let phone = document.getElementById("phone");
let myform = document.getElementById("form");
let error_form = document.getElementById("error-messages");

myform.addEventListener('submit', (event) => {
  event.preventDefault(); 
  error_form.innerHTML = ""; 
  let flag = true;

  const fVal = f_name.value.trim();
  if (fVal.length < 3 || fVal.length > 10 || !/^[A-Za-z]+$/.test(fVal)) {
    let li = document.createElement("li");
    li.textContent = "First name must be 3-10 letters and contain only alphabets.";
    error_form.appendChild(li);
    flag = false;
  }

  const lVal = l_name.value.trim();
  if (lVal.length < 3 || lVal.length > 10 || !/^[A-Za-z]+$/.test(lVal)) {
    let li = document.createElement("li");
    li.textContent = "Last name must be 3-10 letters and contain only alphabets.";
    error_form.appendChild(li);
    flag = false;
  }

  const eVal = email.value.trim();
  if (eVal === "" || !/^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/.test(eVal)) {
    let li = document.createElement("li");
    li.textContent = "Please enter a valid email address.";
    error_form.appendChild(li);
    flag = false;
  }

  const pVal = password.value.trim();
  const passwordRegex = /^(?=.*\d)(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])[A-Za-z\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]{8,20}$/;
  if (!passwordRegex.test(pVal)) {
    let li = document.createElement("li");
    li.textContent = "Password must be 8-20 characters long, include at least one digit, one uppercase letter, and one special character.";
    error_form.appendChild(li);
    flag = false;
  }

  const cVal = conf_pass.value.trim();
  if (cVal === "" || cVal !== pVal) {
    let li = document.createElement("li");
    li.textContent = "Confirm password must match the password.";
    error_form.appendChild(li);
    flag = false;
  }
  const phoneVal = phone.value.trim();
  if (!/^03\d{9}$/.test(phoneVal)) {
    let li = document.createElement("li");
    li.textContent = "Phone number must be 11 digits and start with 03 (e.g., 03XXXXXXXXX).";
    error_form.appendChild(li);
    flag = false;
  }

  if (flag) {
    alert("Form submitted successfully!");
    myform.submit();
  }
});
