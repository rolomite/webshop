import './bootstrap';
import 'preline';
import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';

window.Alpine = Alpine;
Alpine.plugin(persist);

Alpine.data('cartHandler', () => ({
    cart: Alpine.$persist([]).as('_x_cart'), // Persist cart in localStorage


    get totalPrice() {
        return this.cart.reduce((total, item) => total + item.price * item.quantity, 0);
    },

    addToCart(product) {
        let existingProduct = this.cart.find(item => item.id === product.id);
        if (existingProduct) {
            existingProduct.quantity++;
        } else {
            this.cart.push({
                id: product.id,
                name: product.project_name,
                price: product.price,
                quantity: 1,
                image: product.image
            });
        }
    },

    removeFromCart(productId) {
        this.cart = this.cart.filter(item => item.id !== productId); // Remove item reactively
    },
}));



Alpine.start();
