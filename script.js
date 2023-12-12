
//support et authentification msgs 
let confmsg = document.getElementById('confMessage');
setTimeout(function () { errmsg.classList.add('hide-message'); }, 2000);


//add product msg

let addProductconf = document.getElementById('addproduct');
setTimeout(function () { addProductconf.classList.add('hide-message'); }, 2000);
//delete product msg

let deleteProductconf = document.getElementById('deleteproduct');
setTimeout(function () { addProductconf.classList.add('hide-message'); }, 2000);



//search bar 
function searchProducts() {
  var userInput = document.getElementById("searchInput").value.toLowerCase();
  var productCards = document.querySelectorAll('.product-card');
  var foundProduct = false;

  for (var i = 0; i < productCards.length; i++) {
    var productName = productCards[i].querySelector('h3').innerText.toLowerCase();

    if (productName.includes(userInput)) {
      productCards[i].style.display = 'block';
      foundProduct = true;
    } else {
      productCards[i].style.display = 'none';
    }
  }

  var sectionTitles = document.querySelectorAll('.title');
  for (var i = 0; i < sectionTitles.length; i++) {
    sectionTitles[i].style.display = foundProduct ? 'none' : 'block';
  }


  var noProductMessage = document.querySelector('.no-product-message');
  noProductMessage.style.display = foundProduct ? 'none' : 'block';
}


document.addEventListener("DOMContentLoaded", function () {
  const mobileMenuButton = document.querySelector(".mobile-menu-button");
  const navbar = document.querySelector(".navbar");

  mobileMenuButton.addEventListener("click", function () {
    navbar.classList.toggle("active");
  });

  window.addEventListener("click", function (event) {
    if (!event.target.matches('.mobile-menu-button')) {
      if (navbar.classList.contains('active')) {
        navbar.classList.remove('active');
      }
    }
  });
});


