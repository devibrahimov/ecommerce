
var alist = document.querySelectorAll(".comment .ulList li a");
var containers = document.querySelectorAll(".description");
var containers2 = document.querySelectorAll(".reviews");


alist.forEach((a1) => {
   a1.addEventListener("click", () => {
      alist.forEach((a1) => {
         a1.classList.remove("activeLi")
      })
      a1.classList.add("activeLi");
      var a1value = a1.getAttribute("data-list");
      containers.forEach((item1) => {
         item1.style.display = "none";
      })
      containers2.forEach((item2) => {
         item2.style.display = "none";
      })
      if (a1value == "description") {
         containers.forEach((item1) => {
            item1.style.display = "block";
         })
      }
      else if (a1value == "reviews") {
         containers2.forEach((item2) => {
            item2.style.display = "block";
         })
      }

   })
})

///profil

var alistProfil = document.querySelectorAll(".containers-Profil .left_itm .profil-box a");
var dashboard = document.querySelectorAll(".dashboard");
var orders = document.querySelectorAll(".orders");
var password = document.querySelectorAll(".password");
var account = document.querySelectorAll(".account");

alistProfil.forEach((a1) => {
   a1.addEventListener("click", () => {
      alistProfil.forEach((a1) => {
         a1.classList.remove("activeList")
      })
      a1.classList.add("activeList");
      var a1value = a1.getAttribute("data-list");
      dashboard.forEach((item1) => {
         item1.style.display = "none";
      })
      orders.forEach((item2) => {
         item2.style.display = "none";
      })
      password.forEach((item2) => {
         item2.style.display = "none";
      })
      account.forEach((item2) => {
         item2.style.display = "none";
      })
      if (a1value == "Dashboard") {
         dashboard.forEach((item1) => {
            item1.style.display = "block";
         })
      }
      else if (a1value == "Orders") {
         orders.forEach((item2) => {
            item2.style.display = "block";
         })
      }
      else if (a1value == "sifre") {
         password.forEach((item2) => {
            item2.style.display = "block";
         })
      }
      else if (a1value == "Account") {
         account.forEach((item2) => {
            item2.style.display = "block";
         })
      }
   })
})



let pathArray = window.location.pathname.split('/');
let a = pathArray.pop().split(".")[0]
let b = 'index'
if (window.innerWidth >= 1200) {
   if (a == b) {
      document.getElementById('indexDropdown').classList = 'dropdown-menu show';
   }
} else {
   document.getElementById('indexDropdown').classList = 'dropdown-menu ';
}

///
document.addEventListener("DOMContentLoaded", function () {
   // make it as accordion for smaller screens
   if (window.innerWidth <= 1024) {
      // close all inner dropdowns when parent is closed
      document.querySelectorAll('.navbar .dropdown').forEach(function (everydropdown) {
         everydropdown.addEventListener('hidden.bs.dropdown', function () {
            // after dropdown is hidden, then find all submenus
            this.querySelectorAll('.submenu').forEach(function (everysubmenu) {
               // hide every submenu as well
               everysubmenu.style.display = 'none';
            });
         })
   });

document.querySelectorAll('.dropdown-menu a').forEach(function (element) {
   element.addEventListener('click', function (e) {
      let nextEl = this.nextElementSibling;
            if (nextEl && nextEl.classList.contains('submenu')) {
               // prevent opening link if link needs to open dropdown
               e.preventDefault();
               if (nextEl.style.display == 'block') {
                  nextEl.style.display = 'none';
               } else {
                  nextEl.style.display = 'block';
               }

            }
         });
      })
   }
   // end if innerWidth
});

