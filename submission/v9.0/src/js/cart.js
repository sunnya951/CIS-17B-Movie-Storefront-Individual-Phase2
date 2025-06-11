// cart.js

// Load existing cart or initialize new one
function getCart() {
    const cart = localStorage.getItem('cart');
    return cart ? JSON.parse(cart) : [];
}

function saveCart(cart) {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Add item to cart
function addToCart(movie) {
    const cart = getCart();

    // Check if item already exists
    const existing = cart.find(item => item.id === movie.id);
    if (existing) {
        existing.quantity += 1; // Increment quantity
    } else {
        movie.quantity = 1;
        cart.push(movie);
    }

    saveCart(cart);
    alert(`${movie.title} added to cart!`);
}

// Hook up event listeners
document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.add-to-cart');
    
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const movie = {
                id: button.dataset.id,
                title: button.dataset.title,
                price: parseFloat(button.dataset.price)
            };
            addToCart(movie);
        });
    });
});
