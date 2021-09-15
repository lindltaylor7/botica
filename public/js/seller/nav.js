const d = document;
const $nav = d.getElementById("nav")
const $body = d.body;

d.addEventListener("DOMContentLoaded", e => {
  if (localStorage.getItem("nav")) {
    $nav.classList.add("nav-active")
  }
})

d.addEventListener("click", e => {
  if (e.target.matches("#btnNav, #btnNav *")) {
    let storage;
    localStorage.getItem("nav") ? localStorage.removeItem("nav") : storage = localStorage.setItem("nav","active")
    $nav.style.setProperty("transition", "margin-left .5s ease")
    $nav.classList.toggle("nav-active")
  } else {

  }



})
