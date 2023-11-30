// Add JavaScript functionality here, such as rotating discounts and dynamic product loading.

// Example rotating discounts
const featuredProducts = document.getElementById('featuredProducts');
const products = featuredProducts.querySelectorAll('.product');

let currentDiscountIndex = 0;

function rotateDiscounts() {
  products.forEach((product, index) => {
    // Apply discounts based on the current index
    const discountPercentage = (currentDiscountIndex + index) % 3 + 1;
    product.innerHTML += `<p>${discountPercentage}% OFF!</p>`;
  });

  // Move to the next set of discounts
  currentDiscountIndex = (currentDiscountIndex + 1) % 3;
}

// Call the function to set initial discounts
rotateDiscounts();

// You can add more functionality based on your specific requirements
