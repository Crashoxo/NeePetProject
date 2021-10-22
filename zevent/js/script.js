let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function () {
  sidebar.classList.toggle("active");
  if (sidebar.classList.contains("active")) {
    sidebarBtn.classList.replace("fa-align-justify", "fa-align-left");
  } else
    sidebarBtn.classList.replace("fa-align-left", "fa-align-justify");
}


$(document).ready(function () {
  $(".data-table").each(function (_, table) {
    $(table).DataTable();
  });
});
