const loginParams = new URLSearchParams(window.location.search);
if(loginParams.has('userName')){
    const logInInfoName = loginParams.get('logInInfoName');
    const newUserNamnExists = loginParams.get('newUserNamnExists');
    const newUserNamn = loginParams.get('newUserNamn');
    const logInInfoPass = loginParams.get('logInInfoPass');
    const logInInfoMessage = loginParams.get('logInInfoMessage');
    const userName = loginParams.get('userName');
    nameError.innerHTML = logInInfoName;
    passwordError.innerHTML = logInInfoPass;
    loginMessage.innerHTML = logInInfoMessage;

    newUserNamnError.innerHTML = newUserNamnExists;
    document.getElementById("logInNamn").value = userName;
    document.getElementById("saveNewUserNamn").value = newUserNamn;
}

//Inloggad användare
var loginButton = document.getElementById("submit-login");
loginButton.addEventListener("click", function() {
    var form = document.getElementById("userLogin");
    form.addEventListener("submit", function(event) { //lyssnar på submit
        //console.log('test: ', event.target.elements )
        event.preventDefault(); // förhindrar inbygda html submit för att javascript ska validera koden innan

        
        // Hämtar de värdena från forumäret och sätter till variabler
        const logInNamn = this.elements.logInNamn.value;
        const logInPassword = this.elements.logInPassword.value;
        isValid = true;
    
        validateRegisterForm(logInNamn, logInPassword); // skickar med all formulär-data
                                                        // till funktionen validateRegisterForm()
        function validateRegisterForm(logInNamn, logInPassword){  // Validerar alla formulär inputs för sig
            if (logInNamn == "") {                        // med olika regler och ger feedback om behövs
                nameError.innerHTML = "Namnet saknas.";
                document.getElementById("logInNamn").value = logInNamn;
                isValid = false;
                newUserNamnError.innerHTML = "";
            } else {
                nameError.innerHTML = "";
                document.getElementById("logInNamn").value = logInNamn;
                newUserNamnError.innerHTML = "";
            }
            if (logInPassword.length < 6) {
                passwordError.innerHTML = "Minst 6 tecken!";
                isValid = false;
                newUserPasswordError.innerHTML = "";
            } else {
                passwordError.innerHTML = "";
                document.getElementById("logInPassword").value = logInPassword;
                newUserPasswordError.innerHTML = "";
            }
        }
        //console.log('isValid: ', isValid);
        if (isValid == true) { // om formuläret fyller alla kriterier så submittas det
            passwordError.innerHTML = "<input type='hidden' name='login'>";
            event.target.submit();
            //console.log(event.target);
        
            // console.log(document.getElementById("userLogin"));
            // console.log("test");
        }
    });
});


// Ny användare
var saveNewUser = document.getElementById("save-new-user");
saveNewUser.addEventListener("click", function() {
    var form = document.getElementById("userLogin");
    form.addEventListener("submit", function(event) { //lyssnar på submit
        event.preventDefault(); // förhindrar inbygda html submit för att javascript ska validera koden innan

        //console.log("new user i form");
        
        // Hämtar de värdena från forumäret och sätter till variabler
        const saveNewUserNamn = this.elements.saveNewUserNamn.value;
        const saveNewUserPassword = this.elements.saveNewUserPassword.value;
        isValid = true;
    
        validateRegisterForm(saveNewUserNamn, saveNewUserPassword); // skickar med all formulär-data
                                                        // till funktionen validateRegisterForm()
        function validateRegisterForm(saveNewUserNamn, saveNewUserPassword){  // Validerar alla formulär inputs för sig
            if (saveNewUserNamn == "") {                        // med olika regler och ger feedback om behövs
                newUserNamnError.innerHTML = "Namnet saknas.";
                document.getElementById("saveNewUserNamn").value = saveNewUserNamn;
                isValid = false;
                nameError.innerHTML = "";
            } else {
                newUserNamnError.innerHTML = "";
                document.getElementById("saveNewUserNamn").value = saveNewUserNamn;
                nameError.innerHTML = "";
            }
            if (saveNewUserPassword.length < 6) {
                newUserPasswordError.innerHTML = "Minst 6 tecken!";
                isValid = false;
                passwordError.innerHTML = "";
            } else {
                newUserPasswordError.innerHTML = "";
                document.getElementById("saveNewUserPassword").value = saveNewUserPassword;
                passwordError.innerHTML = "";
            }
        }
        //console.log('isValid: ', isValid);
        if (isValid == true) { // om formuläret fyller alla kriterier så submittas det
            passwordError.innerHTML = "<input type='hidden' name='saveNewUser'>";
            event.target.submit();
            //console.log(event.target);
        
            // console.log(document.getElementById("userLogin"));
            // console.log("test");
        }
    });
});


    