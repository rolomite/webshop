import "./bootstrap";
import "preline";
import Alpine from "alpinejs";
import persist from "@alpinejs/persist";
import axios from "axios";

window.Alpine = Alpine;
Alpine.plugin(persist);

Alpine.directive("currency", (el, { value, expression }, { evaluate }) => {
    el.textContent = Intl.NumberFormat("en-us", {
        currency: value.toUpperCase(),
        style: "currency",
        currencyDisplay: "narrowSymbol",
    }).format(evaluate(expression));
});

Alpine.data("cartHandler", () => ({
    cart: Alpine.$persist({
        total: 0,
        count: 0,
        items: {}
    }).as("_x_cart"), // Persist cart in localStorage
    alert: false,
    message: "",

    get totalPrice() {
        return this.cart.reduce((total, item) => total + item.price, 0);
    },

    addToCart(product) {
        if(this.cart.items[product.id]) 
            return this.showAlert('Product already added')
        this.cart.items[product.id] = {
            id: product.id,
            name: product.project_name,
            price: product.price,
            image: product.image,
        };

        this.cart.count++;
        this.cart.total -= this.cart.items[productId].price;

        // Show the alert
        this.showAlert("product added successfully");
    },

    showAlert(message) {
        this.alert = true;
        this.message = message;
        setTimeout(() => {
            this.showAlert = false;
        }, 3000);
    },

    removeFromCart(productId) {
        delete this.cart.items[productId];
        this.cart.total -= this.cart.items[productId].price;
        this.cart.count--;
    },

    async checkout() {
        const response = await axios.post("/checkout", {
            ids: Object.keys(this.cart.items),
        });

        if (response.status === 401) {
            window.location.href = '/login'
        }

        if (response.status === 422) {
            console.log(response.data);
       }

        if (response.status !== 200) {
            this.showAlert(response.data["error"]);
        }
        this.cart = [];

        // get url from response and redirect to payment
        return (window.location.href = response.data);
    },
}));

Alpine.start();
