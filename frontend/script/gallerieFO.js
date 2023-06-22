$(document).ready(function() {
    // Récupérer les données depuis le serveur
    fetch('http://localhost/Oiseautheque/backend/actions/getFicheOiseau.php')
        .then((response) => {
            if (!response.ok) {
                throw new Error(`Erreur (${response.status}: ${response.statusText})`);
            }
            return response.json();
        })
        .then((data) => {
            const fiches = data;
            const ficheOiseau = $("#ficheOiseau");

            fiches.forEach((fiche_oiseau) => {
                // Créer un élément de fiche
                const fiche = $("<div>").addClass("fiche isCollapsed");
                const ficheInner = $("<div>").addClass("ficheInner jsExpander");
                const nomOiseau = $("<h1>").text(fiche_oiseau.nom_fiche_oiseau);
                const ficheExpander = $("<div>").addClass("ficheExpander");
                const imageOiseau = $("<img>").attr("src", fiche_oiseau.image_fiche_oiseau);
                const descriptionOiseau = $("<p>").text(fiche_oiseau.description_fiche_oiseau);
                const contenuOiseau = $("<p>").text(fiche_oiseau.contenu_fiche_oiseau);
                const localisationOiseau = $("<p>").text(fiche_oiseau.localisation_fiche_oiseau);

                // Ajouter les éléments à la fiche
                ficheInner.append(nomOiseau);
                fiche.append(ficheInner);
                ficheExpander.append(imageOiseau, descriptionOiseau, contenuOiseau, localisationOiseau);
                fiche.append(ficheExpander);
                ficheOiseau.append(fiche);
            });

            // Cacher tous les éléments ficheExpander par défaut
            $('.ficheExpander').hide();

            // Ouvrir ou fermer une fiche lorsqu'on clique dessus
            $('.jsExpander').click(function() {
                let $thisCell = $(this).closest('.fiche');

                if ($thisCell.hasClass('isCollapsed')) {
                    // Fermer les autres fiches ouvertes
                    $('.fiche').not($thisCell).removeClass('isExpanded').addClass('isCollapsed');
                    $('.fiche').not($thisCell).find('.ficheExpander').slideUp();

                    // Ouvrir la fiche cliquée
                    $thisCell.removeClass('isCollapsed').addClass('isExpanded');
                    $thisCell.find('.ficheExpander').slideDown(function() {
                        // Faire défiler l'écran pour centrer la fiche ouverte
                        const scrollOffset = $thisCell.offset().top - ($(window).height() / 4);
                        $('html, body').animate({
                            scrollTop: scrollOffset
                        }, 500);
                    });
                } else {
                    // Fermer la fiche cliquée si elle était déjà ouverte
                    $thisCell.removeClass('isExpanded').addClass('isCollapsed');
                    $thisCell.find('.ficheExpander').slideUp();
                }
            });
        })
        .catch((error) => {
            console.error(error);
        });
});


// Sélectionner l'élément d'entrée
const searchInput = $("#searchInput");

// Gérer l'événement d'entrée dans l'élément de saisie
searchInput.on('input', function() {
    const searchTerm = searchInput.val().trim().toLowerCase(); // Obtenir le terme de recherche entré par l'utilisateur

    // Parcourir toutes les fiches d'oiseaux
    $('.fiche').each(function() {
        const ficheNom = $(this).find('.ficheInner h1').text().toLowerCase(); // Obtenir le nom de l'oiseau dans chaque fiche

        // Vérifier si le terme de recherche est vide ou correspond au nom de l'oiseau
        if (searchTerm === '' || ficheNom.includes(searchTerm)) {
            $(this).show(); // Afficher la fiche si le terme de recherche est vide ou si le nom correspond
        } else {
            $(this).hide(); // Masquer la fiche si le terme de recherche n'est pas vide et que le nom ne correspond pas
        }
    });
});


// // Écouter l'événement "input" sur l'input de recherche
// searchInput.addEventListener('input', () => {
//     // Récupération de la recherche de l'utilisateur
//     const searchTerm = searchInput.value.toLowerCase();
  
//     // Filtrage des jeux vidéo en fonction de la recherche
//     const filteredGames = fiches.filter(nomOiseau => {
//       return nomOiseau.nom_fiche_oiseau.toLowerCase().includes(searchTerm);
//     });
  
//     // Affichage des jeux vidéo filtrés
//     renderGames(filteredGames);
//   });


