document.addEventListener("DOMContentLoaded", function () {
  // Cibler le formulaire
  const form = document.querySelector("#formulaire-recherche form");

  form.addEventListener("submit", function (e) {
    e.preventDefault(); // Empêche l'envoi classique

    // Récupérer les valeurs des champs
    const depart = document.getElementById("depart").value;
    const arrivee = document.getElementById("arrivee").value;
    const date = document.getElementById("date").value;
    const passagers = document.getElementById("passagers").value;

    // Afficher les infos dans une alerte ou la console
    alert(
      `🚗 Recherche lancée :\nDépart : ${depart}\nArrivée : ${arrivee}\nDate : ${date}\nPassagers : ${passagers}`
    );

    // Tu peux ensuite ajouter du code pour filtrer les trajets ou faire une redirection
  });
});
