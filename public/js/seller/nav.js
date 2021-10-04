const d = document;
const $nav = d.getElementById("nav");
const $header = d.getElementById("header");
const $navMenu = d.querySelectorAll(".nav__span");
const $link = d.querySelectorAll(".nav__link");
const $logo = d.querySelector(".span-logo");
// col-2 col-sm-2 col-md-1 col-lg-3 h-100 justify-content-center p-0 overflow-auto
d.addEventListener("DOMContentLoaded", e => {
  // $nav.classList.add("col-2", "col-sm-2", "col-md-1", "col-lg-3", "h-100", "justify-content-center", "p-0", "overflow-auto");

  if (localStorage.getItem("nav")) {
    $nav.classList.replace("col-lg-3", "col-lg-1");
    d.querySelector(".panel-btn").classList.add("is-active"); 
    $header.classList.replace("col-lg-9", "col-lg-11");
    $logo.classList.replace("d-lg-block", "d-lg-none");
    $link.forEach(el => el.classList.replace("justify-content-lg-start", "justify-content-lg-center"))
    $navMenu.forEach(el => {
      el.classList.replace("d-lg-block", "d-lg-none")
      el.closest("li").title = el.textContent
    })
  }
})

d.addEventListener("click", e => {
  if (e.target.matches(".panel-btn") || e.target.matches(".panel-btn *")) {
    d.querySelector(".panel-btn").classList.toggle("is-active"); 
    localStorage.getItem("nav") ? localStorage.removeItem("nav") : storage = localStorage.setItem("nav","active")
    if (d.querySelector(".panel-btn").matches(".is-active")) {
      $nav.classList.replace("col-lg-3", "col-lg-1");
      $header.classList.replace("col-lg-9", "col-lg-11");
      $logo.classList.replace("d-lg-block", "d-lg-none");
      $link.forEach(el => el.classList.replace("justify-content-lg-start", "justify-content-lg-center"))
      $navMenu.forEach(el => {
        el.classList.replace("d-lg-block", "d-lg-none")
        el.closest("li").title = el.textContent
      })
    } else {
      $nav.classList.replace("col-lg-1", "col-lg-3");
      $header.classList.replace("col-lg-11", "col-lg-9");
      $logo.classList.replace("d-lg-none", "d-lg-block")
      $link.forEach(el => el.classList.replace("justify-content-lg-center", "justify-content-lg-start"))
      $navMenu.forEach(el => {
        el.classList.replace("d-lg-none", "d-lg-block")
        el.closest("li").removeAttribute("title")
      })
    }
  }
})
