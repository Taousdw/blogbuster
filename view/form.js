
let ongletInscription = document.getElementById("btn-inscription");
let ongletConnexion = document.getElementById("btn-connexion");
let containerConnexion = document.querySelector(".containerConnexion");
let containerInscription = document.querySelectorAll(".first-view");
let validationInscription = document.getElementById("validationInscription");
let password = document.getElementById("password");
let passwordVerify = document.getElementById("passwordVerify");
let email = document.getElementById("mail");
let msgErrorEmail = document.querySelector(".msgErrorEmail");
let msgErrorPassword = document.querySelector(".msgErrorPassword");
let msgErrorPasswordVerify = document.querySelector(".msgErrorPasswordVerify");


const reEmail = /^[\w.-]+@[\w.-]+\.\w{2,}$/;
const reMdp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
const successColor = "rgb(62, 176, 5)";
const errorColor = "rgb(244, 110, 110)";


/*---------------------------------------FONCTIONS----------------------------------*/

function afficherConnexion() { 

    containerInscription.forEach(divs => {
        divs.classList.add("hidden");
    });

   containerConnexion.classList.remove("hidden")
  
   
}

function afficherInscription() {

    containerConnexion.classList.add("hidden")
    
    containerInscription.forEach(divs => {
        divs.classList.remove("hidden");
    });
}


function checkEmail() {
    if (email.value === "") {
       clearInput(email,msgErrorEmail);
    } else if (email.value.match(reEmail)) {
        successInput(email,msgErrorEmail,"")
    } else {
       errorInput(email,msgErrorEmail,"Email invalide");
    }
}

function checkPassword() {
    if(password.value === "") {
        clearInput(password,msgErrorPassword,);
       
    } else if(password.value.match(reMdp)) {
        successInput(password,msgErrorPassword,"");
    } else {
        errorInput(password,msgErrorPassword,"Mot de passe invalide");

    }
}

function checkPasswordVerify() {
      if(passwordVerify.value === "") {
       clearInput(passwordVerify,msgErrorPasswordVerify);

    } else if (passwordVerify.value === password.value){
       successInput(passwordVerify,msgErrorPasswordVerify,"");
    } else {
        errorInput(passwordVerify,msgErrorPasswordVerify,"Mot de passe non identique");
    }
}

function successInput(inputStyle,sujet,message) {
    inputStyle.style.borderColor = successColor;
    sujet.style.display = "none";
    

}

function errorInput(inputStyle,sujet,message) {
    inputStyle.style.borderColor = errorColor;
    sujet.style.display = "block";
    sujet.textContent = message;
    

}

function clearInput(inputStyle,sujet) {
    inputStyle.style.borderColor = "";
    sujet.style.display = "none";
    sujet.textContent = "";
    
}

/*---------Apparition du container connexion en cliquant dessus --------------*/
    ongletConnexion.addEventListener("click", afficherConnexion);
/*----------------------------------------------------------------------------*/

/* ------------Apparition du container inscription en cliquant dessus --------*/
    ongletInscription.addEventListener("click", afficherInscription);
/*----------------------------------------------------------------------------*/
 
/* --------------------------------Email valide-------------------------------*/
    email.addEventListener("input", checkEmail);
/*----------------------------------------------------------------------------*/   
 
/* --------------------------------Password valide----------------------------*/
    password.addEventListener("input",checkPassword);
/*----------------------------------------------------------------------------*/   

/* --------------------------------Password confimation valide----------------*/
    passwordVerify.addEventListener("input",checkPasswordVerify);
/*----------------------------------------------------------------------------*/  