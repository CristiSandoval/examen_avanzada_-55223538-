const productList = document.getElementById('productList');
const searchInput = document.getElementById('searchInput');
let allProducts = [];

fetch('https://fakestoreapi.com/products')
    .then(res => res.json())
    .then(data => {
        allProducts = data;
        renderProducts(allProducts);
    })
    .catch(err => {
        productList.innerHTML = "<p>Error al cargar productos 😢</p>";
        console.error(err);
    });

function renderProducts(products) {
    productList.innerHTML = '';

    if (products.length === 0) {
        productList.innerHTML = '<p>No hay productos que coincidan.</p>';
        return;
    }

    products.forEach(product => {
        const card = document.createElement('div');
        card.className = 'product-card';

        card.innerHTML = `
            <img src="${product.image}" alt="${product.title}">
            <div class="product-title">${product.title}</div>
            <div class="product-price">$${product.price}</div>
            <div class="product-category">${product.category}</div>
        `;

        productList.appendChild(card);
    });
}

searchInput.addEventListener('input', () => {
    const query = searchInput.value.toLowerCase().trim();
    const filtered = allProducts.filter(p =>
        p.category.toLowerCase().includes(query)
    );
    renderProducts(filtered);
});