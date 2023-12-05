 
 //support et authentification msgs 
  let errmsg = document.getElementById('errMessage');
  let confmsg = document.getElementById('confMessage');
  setTimeout(function() { errmsg.classList.add('hide-message');} , 3000);
  setTimeout(function() { confmsg.classList.add('hide-message');} , 3000);

  //login msgs
  let errlogin1 = document.getElementById('errMessage1');
  setTimeout(function() { errlogin1.classList.add('hide-message');} , 3000);
  let errlogin2 = document.getElementById('errMessage2');
  setTimeout(function() { errlogin2.classList.add('hide-message');} , 3000);

     //sign up msgs
     let signuperr = document.getElementById('signuperr');
     let signupconf = document.getElementById('signupconf');
     setTimeout(function() { signuperr.classList.add('hide-message');} , 3000);
     setTimeout(function() { signupconf.classList.add('hide-message');} , 3000);
 

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


