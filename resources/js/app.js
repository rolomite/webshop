import "./bootstrap";
import "preline";
import Alpine from "alpinejs";
import persist from "@alpinejs/persist";
import notify from "./alpine/plugins/notify.js";

window.Alpine = Alpine;
Alpine.plugin(persist);
Alpine.plugin(notify);
window.notify = Alpine.store('alert');

Alpine.store("cart", {
    items: Alpine.$persist({}),
    maxQuantityPerItem: 10,
    processing: false,

    get length(){ return Object.keys(this.items).length},
    get subtotal(){ return Object.values(this.items).reduce((a, b) => a + b.price * b.quantity, 0)},
    get total(){ return Object.values(this.items).reduce((a, b) => a + b.price * b.quantity, 0)},

    getItem(id){
      if(this.items[id]){
          return this.items[id];
      }
      return null;
    },

    addToCart(product, quantity = 1) {
        const {id, name, featured_image, price} = product;

        if(this.items[id]){
            this.items[id] = {...this.items[id], price, name, image: featured_image}
            return this.updateQuantity(id, quantity);
        }

        this.items[id] = {
            id,
            name,
            price,
            image: featured_image,
            quantity: quantity,
            get total(){return this.quantity * this.price}
        };
        window.notify.info(`${name} added to cart`);
    },

    updateQuantity(id, quantity){
        if(!this.items[id]){
            window.notify.error(`item not in cart`);
            return
        }

        let newQuantity = this.items[id].quantity + quantity;

        if(newQuantity <= 0){
            return this.removeFromCart(id)
        }

        if(newQuantity > this.maxQuantityPerItem){
            window.notify.error(`This item cannot be more that ${this.maxQuantityPerItem} in cart`);
            return
        }

        this.items[id].quantity = newQuantity
    },


    removeFromCart(id) {
        if(!this.items[id]){
            return
        }
        delete this.items[id];
        window.notify.info(`item removed from cart`);
    },

    clearCart() {
        this.items = {};
        window.notify.info(`Cart cleared`);
    },

    async checkout(url){
        try{
            this.processing = true;
            const response = await axios.post(url, {
                items: this.items,
            })

            this.clearCart()
            window.location.href = response.data.redirect_url;
        }catch (error){
            if(error.status === 401){
                window.notify.info("You arent logged in. redirecting to login", {duration: -1})
                setTimeout(()=>{window.location.href = '/login';}, 3000)
                return
            }

            if(error.status === 422){
                window.notify.error(error.response.data.message)
                return
            }

            window.notify.error(error.response.data.message);
        }finally {
            this.processing = false;
        }
    },
});
Alpine.store('helpers', {
    formatMoney(value){
        return Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'NGN',
        }).format(value);
    }
})

Alpine.start();
