// Fonction d'animation de l'effet gyroscopique sur l'image de fond
function animateBackground() {
    const body = document.body;
    body.style.animation = "gyroscopic-effect 2s linear"; // Animation d'effet gyroscopique pour l'image de fond
    setTimeout(() => {
        body.style.animation = "none"; // Réinitialise l'animation après 2 secondes (ajuste cette valeur selon ton préférence)
    }, 2000);
}

// Ajout d'un gestionnaire d'événement au clic pour chaque élément de la navbar
const parallaxElements = document.querySelectorAll(".parallax");
parallaxElements.forEach((element) => {
    element.addEventListener("click", function () {
        this.classList.add("clicked"); // Ajoute la classe "clicked" au clic sur un élément de la navbar
        animateBackground(); // Déclenche l'effet gyroscopique au clic sur un élément de la navbar
        setTimeout(() => {
            this.classList.remove("clicked"); // Retire la classe "clicked" après l'animation
        }, 2000);
    });
});














