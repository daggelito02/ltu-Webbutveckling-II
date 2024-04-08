var form = document.getElementById("register");

form.addEventListener("submit", function(event) { //lyssnar på submit

    event.preventDefault(); // förhindrar inbygda html submit för att javascript ska validera koden innan

    // Hämtar de värdena från forumäret och sätter till variabler
    const userName = this.elements.userName.value;
    const email = this.elements.email.value;
    const password = this.elements.password.value;
    const verifyPassword = this.elements.verifyPassword.value;
    const termsOfUse = this.elements.termsOfUse.checked;
    isValid = true;

    validateRegisterForm(userName, email, password, verifyPassword, termsOfUse); // skickar med all formulär-data
                                                                                 // till funktionen validateRegisterForm()
    function validateRegisterForm(userName, email, password, verifyPassword, termsOfUse ){  // Validerar alla formulär inputs för sig
        if (userName == "") {                                                               // med oliga regler och ger feedback om behövs
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

    function validateEmail(email) { // funktion för att validera emailaddress
        var regularExpression = /\S+@\S+\.\S+/; // kollar om det finns minst ett snabel a tecken med,
        return regularExpression.test(email);   // en punkt mellan tecken och tecken som inte är blanksteg.
    }                                           // Exempel: s@s.se
    if (isValid == true) { // om formuläret fyller alla kriterier så submittas det
        event.target.submit();
    }
});