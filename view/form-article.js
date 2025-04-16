/*let buttonSubmit = document.querySelector('button[type="submit"]');*/ 

let titreArticle = document.getElementById('titre-article');
let contenuArticle = document.getElementById('body-article')
let form = document.querySelector('form');
let categorie = document.querySelectorAll('input[name="categorie-article"]');






form.addEventListener("submit", (e) => {
    e.preventDefault();

    let categorieCochee = [];
    categorie.forEach(checkbox => {
        if (checkbox.checked) {
            categorieCochee.push(checkbox.value);
        }
    });

    formResult.innerHTML = `
        <h3>Titre Article : ${titreArticle.value}</h3>
        <p>Contenu de l'article : ${contenuArticle.value}</p>
        <p>Catégorie sélectionnée : ${categorieCochee}</p>
    `;
});








