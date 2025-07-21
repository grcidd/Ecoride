// Attendre que la page soit complètement chargée
document.addEventListener("DOMContentLoaded", function () {
  // Sélectionner tous les boutons "Annuler"
  const cancelButtons = document.querySelectorAll(
    "button.btn-outline-secondary"
  );

  // Boucle sur chaque bouton
  cancelButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      // Confirmation de l'utilisateur
      const confirmCancel = confirm("Es-tu sûr de vouloir annuler ce trajet ?");
      if (confirmCancel) {
        // Supprime le parent du bouton (le bloc du trajet)
        const trajet = this.closest("div.border-bottom, div:not(.card-body)");
        if (trajet) {
          trajet.remove(); // Supprime le trajet de l'affichage
          alert("Trajet annulé !");
        }
      }
    });
  });
});
