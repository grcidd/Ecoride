document.addEventListener("DOMContentLoaded", function () {
  const btn = document.getElementById("accept-cookies");

  btn.addEventListener("click", function () {
    alert("Merci d'avoir accepté les cookies 🍪 !");
    btn.disabled = true;
    btn.innerText = "Cookies acceptés";
  });
});
