var form = document.getElementById("register");

form.addEventListener("submit", function(event) {

    event.preventDefault();

    let validateFeedback = "passed";
    const userName = this.elements.userName.value;
    const email = this.elements.email.value;
    const password = this.elements.password.value;
    const verifyPassword = this.elements.verifyPassword.value;
    const termsOfUse = this.elements.termsOfUse.checked;
    isValid = true;

    validateRegisterForm(userName, email, password, verifyPassword, termsOfUse);

    function validateRegisterForm(userName, email, password, verifyPassword, termsOfUse ){
        if (userName == "") {
            nameError.innerHTML = "Namnet saknas.";
            document.getElementById("userName").value = userName;
            isValid = false;
        } else {
            nameError.innerHTML = "";
            document.getElementById("userName").value = userName;
        }
        if (!validateEmail(email)) {
            emailError.innerHTML = "Fyll i en korrekt epost address. Se exemple i inputfältet";
            document.getElementById("email").value = email;
            isValid = false;
        }
         else {
            emailError.innerHTML = "";
            document.getElementById("email").value = email;
        }
        if (password.length < 6) {
            passwordError.innerHTML = "Minst 6 tecken!";
            isValid = false;
        } else {
            passwordError.innerHTML = "";
            document.getElementById("password").value = password;
        }
        if (password !== verifyPassword) {
            verifyPasswordError.innerHTML = "Lösenordet matchar inte!";
            isValid = false;
        } else {
            verifyPasswordError.innerHTML = "";
            document.getElementById("password").value = verifyPassword;
        }
        if (password !== verifyPassword) {
            verifyPasswordError.innerHTML = "Lösenordet matchar inte!";
            isValid = false;
        } else {
            verifyPasswordError.innerHTML = "";
            document.getElementById("password").value = verifyPassword;
        }
        if (termsOfUse == false) {
            termsOfUseError.innerHTML = "Checka i boxen!";
            isValid = false;
        } else {
            termsOfUseError.innerHTML = "";
        }
    }; 

    function validateEmail(email) {
        var regularExpression = /\S+@\S+\.\S+/; // \S+ matchar tecken utan blanksteg 
        return regularExpression.test(email);
      }
    if (isValid == true) {
        event.target.submit();
    }
});