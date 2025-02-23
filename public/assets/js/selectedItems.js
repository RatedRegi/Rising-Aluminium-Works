function validateCart() {
    const cartData = shoppingCart.listCart();
    $.ajax({
        url: '/validate-cart',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ cart: cartData }),
        success: function(response) {
            handleValidationResponse(response);
        },
        error: function(error) {
            console.error("Error validating cart:", error);
            alert("There was an issue validating your cart. Please try again.");
        }
    });
}
