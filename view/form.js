
let ongletInscription = document.getElementById("btn-inscription");
let containerInscription = document.querySelectorAll(".first-view");
let formInscription = document.getElementById("formInscription");
let password = document.getElementById("password");
let passwordVerify = document.getElementById("passwordVerify");
let email = document.getElementById("mail");
let msgErrorEmail = document.getElementById("msgErrorEmail");
let msgErrorPassword = document.getElementById("msgErrorPassword");
let msgErrorNom = document.getElementById("msgErrorNom");
let msgErrorPrenom = document.getElementById("msgErrorPrenom");
let msgErrorPasswordVerify = document.getElementById("msgErrorPasswordVerify");
let radioBlogueur = document.getElementById("blogueurRadio");
let radioLecteur = document.getElementById("lecteurRadio");
let displayBlogueurUser = document.querySelector(".BlogueurUser");
let nomBlogueur = document.getElementById("nomBlogueur");
let prenomBlogueur = document.getElementById("prenomBlogueur");
let sinscrire = document.getElementById("validationInscription");
let errorDiv = document.getElementById("errorMessage");


/*-------------------display connexion---------------------- */
let formConnexion = document.getElementById("formConnexion");
let containerConnexion = document.querySelector(".containerConnexion");
let ongletConnexion = document.getElementById("btn-connexion");
let emailConnexion =  document.getElementById("mailConnexion");
let passwordConnexion =  document.getElementById("passwordConnexion");
let connexion =  document.getElementById("connexion");
let msgErrorPasswordConnexion = document.getElementById("msgErrorPasswordConnexion");
let msgErrorEmailConnexion = document.getElementById("msgErrorEmailConnexion");






/*------------------------------------------------------------*/

const reEmail = /^[\w.-]+@[\w.-]+\.\w{2,}$/;
const reMdp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
const successColor = "rgb(62, 176, 5)";
const errorColor = "rgb(244, 110, 110)";






ongletInscription.style.borderBottom="1px solid white";


/*---------------------------------------FONCTIONS----------------------------------*/



function afficherConnexion() { 

    containerInscription.forEach(divs => {
        divs.classList.add("hidden");
    });

   containerConnexion.classList.remove("hidden")

    ongletConnexion.style.borderBottom="1px solid white";
    ongletInscription.style.borderBottom="none";
  
   
}

function afficherInscription() {

    containerConnexion.classList.add("hidden")
    
    containerInscription.forEach(divs => {
        divs.classList.remove("hidden");
    });
    ongletConnexion.style.borderBottom="none";
    ongletInscription.style.borderBottom="1px solid white";
}


function checkEmail() {
    if (email.value.trim() === "") {
        errorInput(email,msgErrorEmail,"Veuillez remplir les champs vides");
       return false;
    } else if (email.value.match(reEmail)) {
        clearInput(email,msgErrorEmail);
        successInput(email,msgErrorEmail);
        return true;
    } else if (!email.value.match(reEmail)){
       errorInput(email,msgErrorEmail,"Veuillez entrer une adresse email valide (ex : exemple@mail.com)");
       return false;
       
    } 
}

function checkEmailConnexion() {
    if (emailConnexion.value.trim() === "") {
        errorInput(emailConnexion,msgErrorEmailConnexion,"Veuillez remplir les champs vides");
       return false;
    } else if (emailConnexion.value.match(reEmail)) {
        successInput(emailConnexion,msgErrorEmailConnexion,"")
        return true;
    } else {
       errorInput(emailConnexion,msgErrorEmailConnexion,"Veuillez entrer une adresse email valide (ex : exemple@mail.com)");
       return false;
       
    }
}

function checkPassword() {
    if(password.value.trim() === "") {
        errorInput(password,msgErrorPassword,"Veuillez remplir les champs vides");
        return false;
        
       
    } else if(password.value.match(reMdp)) {
        clearInput(password,msgErrorPassword);
        successInput(password,msgErrorPassword,"");
        return true;
       
    } else {
        errorInput(password,msgErrorPassword,"Votre mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.");
        return false;
       

    }
}

function checkPasswordConnexion() {
    if(passwordConnexion.value.trim() === "") {
        
        errorInput(passwordConnexion,msgErrorPasswordConnexion,"Veuillez remplir les champs vides");
        return false;
        
       
    } else if(passwordConnexion.value.match(reMdp)) {
        clearInput(passwordConnexion,msgErrorPasswordConnexion);
        successInput(passwordConnexion,msgErrorPasswordConnexion,"");
        return true;
       
    } else {
        errorInput(passwordConnexion,msgErrorPasswordConnexion,"Votre mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.");
        return false;
       

    }
}

function checkPasswordVerify() {
      if(passwordVerify.value.trim() === "") {
       errorInput(passwordVerify,msgErrorPasswordVerify,"Veuillez remplir les champs vides");
       return false;
      

    } else if (passwordVerify.value === password.value){
       successInput(passwordVerify,msgErrorPasswordVerify,"");
       return true;
      
    } else {
        errorInput(passwordVerify,msgErrorPasswordVerify,"Mot de passe non identique");
        return false;
        
        
    }
}

function successInput(inputStyle,sujet) {
    inputStyle.style.borderColor = successColor;
    sujet.style.visibility = "hidden";
   
    

}
 
function errorInput(inputStyle,sujet,message) {
    inputStyle.style.borderColor = errorColor;
    sujet.style.visibility = "visible";
    sujet.textContent = message;
   
    

}

function clearInput(inputStyle,sujet) {
    inputStyle.style.borderColor = "";
    sujet.style.visibility= "hidden";
    sujet.textContent = "";
   
    
}

function errorName() {
    
    if(radioBlogueur.checked) {
      if(nomBlogueur.value.trim() ==="") {
       errorInput(nomBlogueur,msgErrorNom,"Veuillez remplir les champs vides");
        return false;
    } else if (nomBlogueur.value.trim().length < 2) {
       errorInput(nomBlogueur,msgErrorNom,"Votre nom doit comporter minimum 2 lettres");
       return false;
        
    
       

    } else {
       clearInput(nomBlogueur,msgErrorNom);
        nomBlogueur.style.borderColor = successColor;
        return true;
    }
  
    }
  
    
}

function errorSurname() {
    
    if(radioBlogueur.checked) {
       if(prenomBlogueur.value.trim() === "") {
        errorInput(prenomBlogueur,msgErrorPrenom,"Veuillez remplir les champs vides");
        return false;
       
    
    } else if (prenomBlogueur.value.trim().length < 2){
        errorInput(prenomBlogueur,msgErrorPrenom,"Votre prenom doit comporter minimum 2 lettres");
        return false;
    } else {
        msgErrorPrenom.style.visibility = "hidden";
        msgErrorPrenom.textContent = "";
        prenomBlogueur.style.borderColor = successColor;
        return true;
    } 
    }
    

}


console.log(msgErrorPasswordConnexion);



/*---------Apparition du container connexion en cliquant dessus --------------*/
    ongletConnexion.addEventListener("click", afficherConnexion);
/*----------------------------------------------------------------------------*/

/* ------------Apparition du container inscription en cliquant dessus --------*/
    ongletInscription.addEventListener("click", afficherInscription);
/*----------------------------------------------------------------------------*/

/* --------------------------------Je suis blogueur/je suis lecteur-------------------------------*/
    radioBlogueur.addEventListener("click",() => {
    if(radioBlogueur.checked) {
        displayBlogueurUser.classList.remove("hidden");
    }})


    
    radioLecteur.addEventListener("click",() => {
        if(radioLecteur.checked) {
            displayBlogueurUser.classList.add("hidden");
        }})
/*----------------------------------------------------------------------------*/
 
/* --------------------------------Nom valide inscription-------------------------------*/
        nomBlogueur.addEventListener("input", errorName);
        prenomBlogueur.addEventListener("input", errorSurname);

/*----------------------------------------------------------------------------*/  
/* --------------------------------Email valide inscription-------------------------------*/
    email.addEventListener("input", checkEmail);
/*----------------------------------------------------------------------------*/   
 
/* --------------------------------Password valide inscription----------------------------*/
   password.addEventListener("input",checkPassword);
/*----------------------------------------------------------------------------*/   

/* --------------------------------Password confimation valide inscription----------------*/
    passwordVerify.addEventListener("input",checkPasswordVerify);
/*----------------------------------------------------------------------------*/  

/* --------------------------------Email valide connexion-------------------------------*/
    emailConnexion.addEventListener("input", checkEmailConnexion);
/*----------------------------------------------------------------------------*/ 
 
/* --------------------------------Password valide connexion----------------------------*/
    passwordConnexion.addEventListener("input",checkPasswordConnexion);
/*----------------------------------------------------------------------------*/   



/* --------------------------------after click s'inscrire----------------*/



formInscription.addEventListener("submit", (event) => {
    event.preventDefault(); 

    const nameValid = errorName();
    const surnameValid = errorSurname();
    const emailValid = checkEmail();
    const passwordValid = checkPassword();
    const passwordVerifyValid = checkPasswordVerify();

    if (radioLecteur.checked) {
        if (emailValid && passwordValid && passwordVerifyValid) {
            formInscription.submit(); 
        }
    } else if (radioBlogueur.checked) {
        if (nameValid && surnameValid && emailValid && passwordValid && passwordVerifyValid) {
            formInscription.submit(); 
        }
    }
});







formConnexion.addEventListener("submit", (event) => {
    event.preventDefault();
    
    const emailConnexionValid = checkEmailConnexion();
    const passwordConnexionValid = checkPasswordConnexion();

    if (emailConnexionValid && passwordConnexionValid) {
        formConnexion.submit();
    } 

 
});


