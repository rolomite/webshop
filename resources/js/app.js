import "./bootstrap";
import "preline";
import Alpine from "alpinejs";
import persist from "@alpinejs/persist";

window.Alpine = Alpine;
Alpine.plugin(persist);

Alpine.data("cartHandler", () => ({
    cart: Alpine.$persist([]).as("_x_cart"), // Persist cart in localStorage

    get totalPrice() {
        return this.cart.reduce(
            (total, item) => total + item.price,
            0
        );
    },

    addToCart(product) {
        let existingProduct = this.cart.find((item) => item.id === product.id);
        if (existingProduct) {
            existingProduct.quantity++;
        } else {
            this.cart.push({
                id: product.id,
                name: product.project_name,
                price: product.price,
                image: product.image,
            });
        }
        // Show the alert
        this.showSuccessAlert();
    },

    showSuccessAlert() {
        this.showAlert = true;
        setTimeout(() => {
            this.showAlert = false;
        }, 3000); // Hide alert after 3 seconds
    },

    removeFromCart(productId) {
        this.cart = this.cart.filter((item) => item.id !== productId); // Remove item reactively
    },
    
    clearCart() {
        this.cart = [];
    },
}));

Alpine.start();
