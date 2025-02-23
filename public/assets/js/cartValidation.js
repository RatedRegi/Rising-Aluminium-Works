function handleValidationResponse(response) {
    let valid = true;

    response.forEach(item => {
        if (item.status !== 'valid') {
            valid = false;
            alert(`${item.message} (Product ID: ${item.id})`);
        }
    });

    if (valid) {
        alert("All items are available!");
        // Proceed to checkout or next step
    }
}
