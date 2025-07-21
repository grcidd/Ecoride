document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const departRecherche = urlParams.get("depart")?.toLowerCase().trim();
  const arriveeRecherche = urlParams.get("arrivee")?.toLowerCase().trim();

  document.getElementById(
    "intro"
  ).textContent = `Résultats pour : ${departRecherche} → ${arriveeRecherche}`;

  const conducteurs = document.querySelectorAll(".conducteur");
  let trouve = false;

  conducteurs.forEach(function (c) {
    const depart = c.dataset.depart.toLowerCase();
    const arrivee = c.dataset.arrivee.toLowerCase();

    const match =
      depart.includes(departRecherche) && arrivee.includes(arriveeRecherche);

    c.style.display = match ? "block" : "none";
    if (match) trouve = true;
  });

  if (!trouve) {
    const section = document.getElementById("resultats");
    section.innerHTML = "<p>❌ Aucun trajet trouvé pour ces villes.</p>";
  }
});
