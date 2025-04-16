
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
let msgErrorInscription = document.querySelector(".msgErrorInscription");
let msgErrorPasswordVerify = document.querySelector(".msgErrorPasswordVerify");
let radioBlogueur = document.getElementById("blogueurRadio");
let radioLecteur = document.getElementById("lecteurRadio");

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
    if (email.value === "") {
       clearInput(email,msgErrorEmail);
    } else if (email.value.match(reEmail)) {
        successInput(email,msgErrorEmail,"")
    } else {
       errorInput(email,msgErrorEmail,"Veuillez entrer une adresse email valide (ex : exemple@mail.com)");
    }
}

function checkPassword() {
    if(password.value === "") {
        clearInput(password,msgErrorPassword,);
       
    } else if(password.value.match(reMdp)) {
        successInput(password,msgErrorPassword,"");
    } else {
        errorInput(password,msgErrorPassword,"Votre mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial.");

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

/* --------------------------------after click s'inscrire----------------*/

validationInscription.addEventListener("submit",() => {

    if (password.value === "" || email.value === "" || passwordVerify.value ==="") {
        msgErrorInscription.style.display = "block";
        msgErrorInscription.textContent = "Veuillez remplir les champs vides";
        /*validationInscription.setAttribute("disabled",true);*/
    } else { 
        msgErrorInscription.textContent = "";
        msgErrorInscription.style.display = "none";
        /*validationInscription.removeAttribute("disabled");*/
       
    }
})



/*--------------------STYLE---------------------*/



/*----------------------------------------------------------------------------*/  