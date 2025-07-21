document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("login-form");
  const message = document.getElementById("login-message");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value;

    // Simuler une validation simple (à remplacer plus tard avec une vraie base)
    if (email === "test@ecoride.fr" && password === "1234") {
      message.textContent = "✅ Connexion réussie !";
      message.classList.remove("hidden");
      form.reset();
    } else {
      message.textContent = "❌ Identifiants incorrects.";
      message.style.color = "red";
      message.classList.remove("hidden");
    }
  });
});
