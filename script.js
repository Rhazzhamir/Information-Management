
document.addEventListener('DOMContentLoaded', () => {
    // Modal Profile
    // const myModal = document.getElementById('myModal')
    // const myInput = document.getElementById('myInput')
    // myModal.addEventListener('shown.bs.modal', () => {
    // myInput.focus()
    // })

    const btnProfile = document.querySelector('#btnProfile');
    const profileNameDisplay = document.querySelector('#profileNameDisplay');

    btnProfile.addEventListener('click', () => {
        const firstName = document.querySelector('#firstName').value;
        profileNameDisplay.innerHTML = firstName;
    });


    function handleClicks(event) {
        const addToCartBtn = event.target.closest('.add-to-cart-btn');
        if (addToCartBtn) {
            const product = addToCartBtn.closest('.product');
            const id = product.getAttribute('data-product-id');
            const cartId = document.body.getAttribute('data-cart-id');
            const formData = new FormData();
            formData.append('product_id', id);
            formData.append('cart_id', cartId);
            formData.append('quantity', 1);
            fetch('./cart/add-cart.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                return response.text();
            })
            .then(data => {
                if (data) {
                    alert(data);
                }
            }).catch(e => alert(e));
        }
    }

    document.addEventListener('click', handleClicks);
}); 