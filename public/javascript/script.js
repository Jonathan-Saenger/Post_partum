document.addEventListener('DOMContentLoaded', () => { 
    // Je configure toutes les variables sur lesquelles je vais intéragir
    const selectCategorie = document.getElementById('categorie-select');
    const btnSubmit = document.getElementById('btnSubmit');
    const articles = document.querySelectorAll('.article_post');

    btnSubmit.addEventListener('click', () => {
        const selectedCategorie = selectCategorie.value; // je réassigne ma variable pour récupérer la catégorie précise 
        articles.forEach(article => { //La méthode forEach() permet d'exécuter une fonction sur chaque article
            const articleCategorie = article.querySelector('#categorie').innerText.trim(); //je récupère la catégorie de mes posts
            if (selectedCategorie === '' || articleCategorie === selectedCategorie) { //création d'un booléen : soit il affiche tous les articles, soit uniquement la catégorie sélectionnée
                article.style.display = 'block'; // affichage des articles si c'est vrai
            } else {
                article.style.display = 'none'; // on cache les articles si c'est faux
            }
        });
    });
});

/*L'évènement DOMContentLoaded est déclenché quand le document HTML initial est complètement 
chargé et analysé, sans attendre la fin du chargement des feuilles de styles, images et 
sous-document.*/