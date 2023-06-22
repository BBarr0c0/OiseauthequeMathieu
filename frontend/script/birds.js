// Charger le fichier JSON
fetch('./frontend/data/birds.json')
  .then(response => response.json())
  .then(data => {
    // Récupérer l'élément contenant le slider
    const slide = document.querySelector('.slide');

    // Parcourir les oiseaux dans le fichier JSON
    data.birds.forEach(bird => {
      // Créer les éléments HTML correspondants à chaque oiseau
      const itemSlide = document.createElement('div');
      itemSlide.classList.add('itemSlide');

      const link = document.createElement('a');
      link.href = "./l'oiseauthèque.php";

      const image = document.createElement('img');
      image.src = bird.image;
      image.alt = bird.alt;
      image.title = bird.title;

      const miniDescription = document.createElement('div');
      miniDescription.classList.add('miniDescription');

      const birdName = document.createElement('h3');
      birdName.textContent = bird.name;

      const birdFamily = document.createElement('p');
      birdFamily.innerHTML = `Famille: <span>${bird.family}</span>`;

      const birdDiet = document.createElement('p');
      birdDiet.innerHTML = `Alimentation: <span>${bird.diet}</span>`;

      const birdWingspan = document.createElement('p');
      birdWingspan.innerHTML = `Envergure: <span>${bird.wingspan}</span>`;

      // Ajouter les éléments au DOM
      miniDescription.appendChild(birdName);
      miniDescription.appendChild(birdFamily);
      miniDescription.appendChild(birdDiet);
      miniDescription.appendChild(birdWingspan);

      link.appendChild(image);
      link.appendChild(miniDescription);

      itemSlide.appendChild(link);
      slide.appendChild(itemSlide);
    });
  })
  .catch(error => {
    console.error("Une erreur s'est produite lors du chargement du fichier JSON :", error);
  });


  