// Récupérer l'élément contenant le slider
const slider = document.querySelector('#birdSlider');
const slide = slider.querySelector('.slide');
const itemSliders = slide.querySelectorAll('.itemSlide');

// Variables pour le déplacement du slider
let isDown = false;
let startX;
let scrollLeft;
let startTime;
let linkClicked = false;
let originalHref;
let isAutoScrolling = true;
let autoScrollDirection = 1;

// Événement de clic de la souris pour commencer le déplacement
slide.addEventListener('mousedown', (e) => {
  // Exclure les clics sur les éléments .itemSlide et ses enfants
  if (e.target.closest('.itemSlide')) {
    const clickedItem = e.target.closest('.itemSlide');
    const clickedItemIndex = Array.from(itemSliders).indexOf(clickedItem);
    const currentIndex = Array.from(itemSliders).indexOf(slide.querySelector('.active'));
    const diff = clickedItemIndex - currentIndex;

    if (diff !== 0) {
      e.preventDefault(); // Annuler l'événement pour empêcher l'ouverture de la balise <a>
      slide.scrollLeft += diff * itemSliders[0].offsetWidth;
      return; // Arrêter l'exécution de la fonction
    }
  }

  isDown = true;
  startX = e.pageX - slide.offsetLeft;
  scrollLeft = slide.scrollLeft;
  startTime = Date.now(); // Enregistrer le temps au début du clic
  linkClicked = false; // Réinitialiser le statut du lien cliqué

  // Si un lien est cliqué, enregistrer son attribut href original
  if (e.target.closest('.itemSlide a')) {
    originalHref = e.target.closest('.itemSlide a').getAttribute('href');
  }
});

// Événement de relâchement du clic de la souris pour arrêter le déplacement
slide.addEventListener('mouseup', (e) => {
  isDown = false;
  const endTime = Date.now();
  const clickDuration = endTime - startTime;

  if (clickDuration > 100 && e.target.closest('.itemSlide a')) {
    e.preventDefault(); // Annuler l'événement pour empêcher l'ouverture du lien si le clic est long
    linkClicked = true; // Marquer le lien comme cliqué lors d'un clic long

    // Supprimer l'attribut href pour désactiver temporairement le lien
    e.target.closest('.itemSlide a').removeAttribute('href');
  }

  // Rétablir le lien si le clic était court et le lien n'a pas été marqué comme cliqué
  if (!linkClicked && e.target.closest('.itemSlide a')) {
    setTimeout(() => {
      e.target.closest('.itemSlide a').setAttribute('href', originalHref);
    }, 0);
  }
});

// Événement de sortie du slider avec la souris pour arrêter le déplacement
slide.addEventListener('mouseleave', () => {
  isDown = false;
});

// Événement de déplacement de la souris pour faire défiler le slider
slide.addEventListener('mousemove', (e) => {
  if (!isDown) return; // Arrêter la fonction si le clic de la souris n'est pas enfoncé

  e.preventDefault();

  const x = e.pageX - slide.offsetLeft;
  const walk = (x - startX) * 1; // Vitesse de défilement du slider
  slide.scrollLeft = scrollLeft - walk;
});

// Fonction pour faire défiler le slider automatiquement
function autoScroll() {
  if (isAutoScrolling && window.innerWidth > 500) {
    slide.scrollLeft += autoScrollDirection;

    // Vérifier si le slider est arrivé à la fin dans la direction actuelle et ajuster le défilement
    if (autoScrollDirection === 1 && slide.scrollLeft >= slide.scrollWidth - slide.offsetWidth) {
      // Changer la direction de l'autoscroll vers la gauche
      autoScrollDirection = -1;
    } else if (autoScrollDirection === -1 && slide.scrollLeft <= 0) {
      // Changer la direction de l'autoscroll vers la droite
      autoScrollDirection = 1;
    }

    // Appeler la fonction à nouveau après un délai
    requestAnimationFrame(autoScroll);
  }
}

// Démarrer le défilement automatique
autoScroll();



// Arrêter l'autoscroll lorsque vous survolez le conteneur du slider
slider.addEventListener('mouseenter', () => {
  isAutoScrolling = false;
});

// Reprendre l'autoscroll lorsque vous quittez le conteneur du slider
slider.addEventListener('mouseleave', () => {
  isAutoScrolling = true;
  autoScroll();
});
