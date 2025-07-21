document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contact-form");
  const confirmation = document.getElementById("confirmation");

  form.addEventListener("submit", function (e) {
    e.preventDefault(); // Empêche l’envoi réel

    // Optionnel : tu peux ici envoyer les données vers un serveur avec fetch()

    // Afficher confirmation
    confirmation.classList.remove("hidden");

    // Réinitialiser le formulaire
    form.reset();
  });
});
