
let formConnexion = document.getElementById("formConnexion");
let containerConnexion = document.querySelector(".containerConnexion");

let emailConnexion =  document.getElementById("mailConnexion");
let passwordConnexion =  document.getElementById("passwordConnexion");
let connexion =  document.getElementById("connexion");
let msgErrorPasswordConnexion = document.getElementById("msgErrorPasswordConnexion");
let msgErrorEmailConnexion = document.getElementById("msgErrorEmailConnexion");
let errorDiv = document.getElementById("errorMessage");

/*------------------------------------------------------------*/

const reEmail = /^[\w.-]+@[\w.-]+\.\w{2,}$/;
const reMdp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
const successColor = "rgb(62, 176, 5)";
const errorColor = "rgb(244, 110, 110)";






function checkEmailConnexion() {
    if (emailConnexion.value.trim() === "") {
        errorInput(emailConnexion,msgErrorEmailConnexion,"Veuillez remplir les champs vides");
       return false;
    } else if (emailConnexion.value.match(reEmail)) {
        successInput(emailConnexion,msgErrorEmailConnexion,"")
        return true;
    } else if (!emailConnexion.value.match(reEmail)){
        errorInput(emailConnexion,msgErrorEmailConnexion,"Veuillez entrer une adresse email valide (ex : exemple@mail.com)");
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


function successInput(inputStyle,sujet) {
    inputStyle.style.borderColor = successColor;
    sujet.style.visibility ="hidden";
   
    

}
 
function errorInput(inputStyle,sujet,message) {
    inputStyle.style.borderColor = errorColor;
    sujet.style.visibility ="visible";
    sujet.textContent = message;
   
    

}

function clearInput(inputStyle,sujet) {
    inputStyle.style.borderColor = "";
    sujet.style.visibility="hidden";
    sujet.textContent = "";
   
    
}


/* --------------------------------Email valide connexion-------------------------------*/

    emailConnexion.addEventListener("input", checkEmailConnexion);

/*----------------------------------------------------------------------------*/ 
 
/* --------------------------------Password valide connexion----------------------------*/

    passwordConnexion.addEventListener("input",checkPasswordConnexion);

/*----------------------------------------------------------------------------*/   


/* --------------------------------after click connexion----------------*/


formConnexion.addEventListener("submit", (event) => {
    event.preventDefault();
    
    const emailConnexionValid = checkEmailConnexion();
    const passwordConnexionValid = checkPasswordConnexion();

    if (emailConnexionValid && passwordConnexionValid) {
        formConnexion.submit();
    } 

 
});

/*----------------------------------------------------------------------------*/  