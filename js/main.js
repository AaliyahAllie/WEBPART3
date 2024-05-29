// cart
// Selecting the cart icon, cart element, and the close button for the cart
let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".cart");
let closeCart = document.querySelector("#close-cart");

// open cart
// When the cart icon is clicked, add the "active" class to the cart element, showing it
cartIcon.onclick = () => {
    cart.classList.add("active");
};

// close cart
// When the close button for the cart is clicked, remove the "active" class from the cart element, hiding it
closeCart.onclick = () => {
    cart.classList.remove("active");
};

// cart working
// Checking if the DOM is still loading. If it is, wait for it to finish loading before calling the 'ready' function. 
// Otherwise, call the 'ready' function immediately.
if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready);
} else {
    ready();
}

// making function
// Defining the 'ready' function, which will be called when the DOM is loaded
function ready() {
    // remove item from cart
    // Selecting all elements with the class 'cart-remove'
    var removeCartButtons = document.getElementsByClassName('cart-remove');
    console.log(removeCartButtons);
    // Looping through all the selected elements
    for (var i = 0; i < removeCartButtons.length; i++) {
        var button = removeCartButtons[i];
        // Adding a click event listener to each 'remove' button, calling the 'removeCartItem' function when clicked
        button.addEventListener('click', removeCartItem);
    }
}

// remove item from cart
// Defining the 'removeCartItem' function to remove an item from the cart when its corresponding 'remove' button is clicked
function removeCartItem(event) {
    // Selecting the specific button that was clicked
    var buttonClicked = event.target;
    // Removing the parent element of the clicked button, which is the item to be removed from the cart
    buttonClicked.parentElement.remove();
}
