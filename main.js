window.addEventListener('load', function() {
  // Sélectionne tous les éléments avec la classe 'item'
  const items = document.querySelectorAll('.item');
  console.log(items)
  // Sélectionne tous les éléments avec la classe 'text'
  const links = document.querySelectorAll('.text');
  console.log(links)

  // Définit la fonction expand pour agrandir et réduire les éléments
  const expand = (item, i) => {
    // Pour chaque élément, vérifie s'il est celui qui a été cliqué
    items.forEach((it, ind) => {
      if (i == ind) {
        // Si oui, je modifie la valeur de la propriété clicked à false
        return it.clicked = false;
      }
    });
    // Utilisation de GSAP pour animer la largeur de tous les éléments
    gsap.to(items, {
      width: item.clicked ? '15vw' : '8vw',
      duration: 1,
      ease: 'power1.out'
    });
    
    // Je Modifie la valeur de la propriété clicked de l'élément cliqué
    item.clicked = !item.clicked;
    gsap.to(item, {
      width: item.clicked ? '42vw' : '15vw',
      duration: 1,
      ease: 'power1.out'
    });

    // Pour chaque élément .text, vérifie s'il correspond à l'élément .item cliqué
    links.forEach((link, ind) => {
      // Si oui, j'ajoute la classe 'active'
      if (i == ind) {
        link.classList.add('active');
      // Si non, j'enlève la classe 'active'
      } else {
        link.classList.remove('active');
      }
      console.log(links)
    });
  }

  items.forEach((item, i) => {
    item.clicked = false;
    item.addEventListener('mouseover', () => expand(item, i));
  });
});
