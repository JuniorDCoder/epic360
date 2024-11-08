// src/stores/cartStore.js
import { ref } from 'vue';
import axios from 'axios';

const cartCount = ref(0);

const fetchCartCount = async () => {
    try {
        const response = await axios.get(route('cart.count'));
        cartCount.value = response.data.count;
    } catch (error) {
        console.error('Error fetching cart count:', error);
    }
};

const incrementCartCount = () => {
    cartCount.value += 1;
};

const decrementCartCount = (itemCount) => {
    cartCount.value -= 1;
}

export { cartCount, fetchCartCount, incrementCartCount, decrementCartCount };
