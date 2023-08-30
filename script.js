// JavaScript untuk menampilkan pesan pop-up
document.getElementById("show-popup").addEventListener("click", function () {
  var popup = document.getElementById("alert-success");
  popup.style.display = "block";
  setTimeout(function () {
    popup.classList.add("alert-show");
  }, 100);
});
