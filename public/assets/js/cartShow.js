// Laravel CSRF token
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// Add to Cart
function addToCartClicked(event) {
    const button = event.target;
    const shopItem = button.closest('.shop-item');
    const title = shopItem.querySelector('.shop-item-title').innerText;
    const price = shopItem.querySelector('.shop-item-price').innerText;
    const imageSrc = shopItem.querySelector('.shop-item-image').src;

    // Send AJAX request to add item
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
        },
        body: JSON.stringify({ title, price, imageSrc }),
    })
        .then(response => response.json())
        .then(data => {
            updateCartUI(data.cart); // Update UI with new cart data
        });
}

// Update Cart Total
function updateCartUI(cart) {
    const cartItemsContainer = document.querySelector('.cart-items');
    cartItemsContainer.innerHTML = ''; // Clear existing items
    let total = 0;

    cart.forEach(item => {
        total += item.price * item.quantity;
        const cartRow = `
            <tr class="cart-row">
                <td class="cart-item cart-column">
                    <img class="cart-item-image" src="${item.imageSrc}" width="50" height="50">
                    <span class="cart-item-title">${item.title}</span>
                </td>
                <td class="cart-item cart-column">
                    <span class="cart-price cart-column">Rs ${item.price}</span>
                </td>
                <td class="cart-item cart-column">
                    <input class="cart-quantity-input" type="number" value="${item.quantity}" style="width: 50px" 
                        data-id="${item.id}" onchange="updateQuantity(event)">
                    <button class="btn btn-danger" type="button" data-id="${item.id}" onclick="removeCartItem(event)">Remove</button>
                </td>
            </tr>
        `;
        cartItemsContainer.innerHTML += cartRow;
    });

    document.querySelector('.cart-total-price').innerText = `Rs ${total.toFixed(2)}`;
}