
var loginButton = document.getElementById("submit-login");
const loginParams = new URLSearchParams(window.location.search);
if(loginParams.has('userName')){
    const logInInfoName = loginParams.get('logInInfoName');
    const logInInfoPass = loginParams.get('logInInfoPass');
    const logInInfoError = loginParams.get('logInInfoError');
    const userName = loginParams.get('userName');
    nameError.innerHTML = logInInfoName;
    passwordError.innerHTML = logInInfoPass;
    loginError.innerHTML = logInInfoError;
    document.getElementById("logInNamn").value = userName;
}

loginButton.addEventListener("click", function() {
    var form = document.getElementById("userLogin");
    // This function will be executed when the button is clicked
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
            if (logInNamn == "") {                        // med oliga regler och ger feedback om behövs
                nameError.innerHTML = "Namnet saknas.";
                document.getElementById("logInNamn").value = logInNamn;
                isValid = false;
            } else {
                nameError.innerHTML = "";
                document.getElementById("logInNamn").value = logInNamn;
            }
            if (logInPassword.length < 6) {
                passwordError.innerHTML = "Minst 6 tecken!";
                isValid = false;
            } else {
                passwordError.innerHTML = "";
                document.getElementById("logInPassword").value = logInPassword;
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

//


var saveNewUser = document.getElementById("save-new-user");

saveNewUser.addEventListener("click", function() {
    console.log("new user");
});


    // form.addEventListener("submit", function(event) { //lyssnar på submit
    //     console.log('test: ', event.target.elements )
    //     event.preventDefault(); // förhindrar inbygda html submit för att javascript ska validera koden innan

    //     // const login = this.elements.login;
    //     // console.log('test: ', login);
    //     // const saveNewUser = this.elements.saveNewUser;
    //     // login.addEventListener("click",test());
    //     // saveNewUser.addEventListener("click",test2());
    //     // function test() {
    //     //     console.log('login: ', login);
    //     // };
    //     // function test2() {
    //     //     console.log('saveNewUser: ', saveNewUser);
    //     // };
    //     // if (event.target.login.name  === "login") {
    //     //     // Hämtar de värdena från forumäret och sätter till variabler
    //     //     const logInNamn = this.elements.logInNamn.value;
    //     //     const logInPassword = this.elements.logInPassword.value;
    //     //     isValid = true;
        
    //     //     validateRegisterForm(logInNamn, logInPassword); // skickar med all formulär-data
    //     //                                                     // till funktionen validateRegisterForm()
    //     //     function validateRegisterForm(logInNamn, logInPassword){  // Validerar alla formulär inputs för sig
    //     //         if (logInNamn == "") {                                // med oliga regler och ger feedback om behövs
    //     //             nameError.innerHTML = "Namnet saknas.";
    //     //             document.getElementById("logInNamn").value = logInNamn;
    //     //             isValid = false;
    //     //         } else {
    //     //             nameError.innerHTML = "";
    //     //             document.getElementById("logInNamn").value = logInNamn;
    //     //         }
    //     //         if (logInPassword.length < 6) {
    //     //             passwordError.innerHTML = "Minst 6 tecken!";
    //     //             isValid = false;
    //     //         } else {
    //     //             passwordError.innerHTML = "";
    //     //             document.getElementById("logInPassword").value = logInPassword;
    //     //         }
    //     // }; 

        
        
    //     // } else if (event.target.saveNewUser.name=== "saveNewUserNamn") {
    //     //     // Submit Button 2 was clicked
    //     //     console.log("Submit Button 2 clicked");
    //     // }

    //     // console.log('isValid: ', isValid);
    //     // if (isValid == true) { // om formuläret fyller alla kriterier så submittas det
    //     //     //event.target.submit();
    //     // }
    // });
  //else if (newUserCase) {

//     form.addEventListener("submit", function(event) { //lyssnar på submit

//         event.preventDefault(); // förhindrar inbygda html submit för att javascript ska validera koden innan
    
//         // Hämtar de värdena från forumäret och sätter till variabler
//         const logInNamn = this.elements.logInNamn.value;
//         const logInPassword = this.elements.logInPassword.value;
//         const verifyPassword = this.elements.verifyPassword.value;
//         const termsOfUse = this.elements.termsOfUse.checked;
//         isValid = true;
    
//         validateRegisterForm(logInNamn, logInPassword, verifyPassword, termsOfUse); // skickar med all formulär-data
//                                                                                      // till funktionen validateRegisterForm()
//         function validateRegisterForm(userName, email, password, verifyPassword, termsOfUse ){  // Validerar alla formulär inputs för sig

    
    
    
    
//             if (logInPassword !== verifyPassword) {
//                 verifyPasswordError.innerHTML = "Lösenordet matchar inte!";
//                 isValid = false;
//             } else {
//                 verifyPasswordError.innerHTML = "";
//                 document.getElementById("password").value = verifyPassword;
//             }
//             if (password !== verifyPassword) {
//                 verifyPasswordError.innerHTML = "Lösenordet matchar inte!";
//                 isValid = false;
//             } else {
//                 verifyPasswordError.innerHTML = "";
//                 document.getElementById("password").value = verifyPassword;
//             }
//             if (termsOfUse == false) {
//                 termsOfUseError.innerHTML = "Checka i boxen!";
//                 isValid = false;
//             } else {
//                 termsOfUseError.innerHTML = "";
//             }
//         }; 
    
//         if (isValid == true) { // om formuläret fyller alla kriterier så submittas det
//             event.target.submit();
//         }
//     });
// }