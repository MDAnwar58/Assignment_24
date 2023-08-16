document.addEventListener("DOMContentLoaded", function () {
  const userBtn = document.querySelector(".user-btn");
  const userMenu = document.querySelector(".user-menu");

  userBtn.addEventListener("click", function () {
    userMenu.classList.toggle("show");
    // alert("manu")
  });

  window.addEventListener("click", function (event) {
    if (!userBtn.contains(event.target) && !userMenu.contains(event.target)) {
      userMenu.classList.remove("show");
    }
  });
});
