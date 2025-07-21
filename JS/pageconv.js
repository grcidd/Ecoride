// Attendre que tout soit chargé
document.addEventListener("DOMContentLoaded", function () {
  // Sélectionner tous les boutons "Réserver"
  const boutonsReserver = document.querySelectorAll(".btn-success");

  boutonsReserver.forEach(function (bouton) {
    bouton.addEventListener("click", function (e) {
      e.preventDefault(); // Empêche de suivre le lien #

      // Afficher une confirmation
      const nomConducteur =
        this.closest(".card-body").querySelector(".card-title").textContent;
      const confirmation = confirm(
        `Confirmer la réservation avec ${nomConducteur} ?`
      );

      if (confirmation) {
        alert("Réservation confirmée ✅");
      }
    });
  });
});
